<?php
function get_index_articles(PDO $databaseConnection , int $limit , int $offset):array
{
    $sql = "select
    `title` , `slug` , articles.`thumbnail` , `summary` , `view_count` ,
    `like_count` , `users`.`username` as 'author_id' , `users`.`name` as 'author_name' , `users`.`thumbnail` as 'author_thumbnail'
     from articles
     inner join `users` on articles.`user_id` = `users`. `id`  
     order by coalesce(`articles`.`updated_at`,`articles`.`created_at`) desc
     limit $offset,$limit";
    $statement = $databaseConnection->query($sql);
    return $statement->fetchAll();
}
function article_counts(PDO $databaseConnection , string $column):int {
    return entityCount($databaseConnection, "articles",$column);
}
function getDashboardArticles(PDO $databaseConnection , int $limit , int $offset ):array
{
    $query = "
    select
        articles.`id`,`title`, `articles`.`slug` as 'slug' , articles.`thumbnail` as 'thumbnail',
        `like_count` , `view_count` , `comment_count` , `tag_count` , `users`.`name` as `author` ,
        `users`.`thumbnail` as 'author_thumbnail' ,  `categories`.`name` as 'category_name' ,
        `categories`.`slug` as 'category_slug' , articles.`created_at`, articles.`updated_at`
    from articles
    inner join `users` on articles.`user_id` = `users`.`id`
    left join `categories` on `articles`.`category_id` = `categories`.`id`
    order by coalesce(articles.`updated_at` , articles.`created_at`) desc
    limit :offset , :limit ;
    ";
    $statement = $databaseConnection->prepare($query);
    $statement->bindValue(":limit",$limit,PDO::PARAM_INT);
    $statement->bindValue(":offset",$offset,PDO::PARAM_INT);
    $executed = $statement->execute();
    return $statement->fetchAll();
}
function articleAdd(
    PDO $databaseConnection , string $title , string $slug , int $authorId , ?int $categoryId
    ,?string $summary , ?string $body , ?string $thumbnail
):false|int {

    $query = "
                insert into `articles`(`title`,`slug`, `thumbnail` , `user_id`, `category_id` , `summary` , `body`) 
                value ( :title , :slug , :thumbnail , :authorId , :category , :summary , :body );
    ";
    $statement = $databaseConnection->prepare($query);
    $binds = [
        "title" => $title , "slug" => $slug , "thumbnail" => $thumbnail , "authorId" => $authorId ,
        "category" => $categoryId , "summary" => $summary , "body" => $body
    ];
    $executed = $statement->execute($binds);
    $rowCount = $statement->rowCount() ;
    if (!$rowCount)
        return false;
    return $databaseConnection->lastInsertId();
}
function dashboardArticleEditData(PDO $databaseConnection , int $id):array|false {
    $query = "select `title` , `slug` , `summary` , `body` , `thumbnail` ,`category_id` from `articles` where `id` = :id limit 1";
    $statement = $databaseConnection->prepare($query);
    $executed = $statement->execute([ "id" => $id ]);
    $rowCount = $statement->rowCount() ;
    if (!$rowCount)
        return false ;
    return $statement->fetch();
}
function articleTagIds(PDO $databaseConnection , int $id ):array {
    $query = "select `tag_id` FROM `article_tags` WHERE `article_id` = :articleId";
    $statement = $databaseConnection->prepare($query);
    $binds = ["articleId"=> $id ];
    $executed = $statement->execute($binds);
    return $statement->fetchAll();
}
function articleExistsById(PDO $databaseConnection , int $id):bool {
    return rowIsExists($databaseConnection,"id","articles","id",$id);
}
function articleUpdateById(
    PDO $databaseConnection , int $id , string $title , string $slug , ?string $summary , 
    ?string $body , ?string $thumbnail , ?int $categoryId ,
):bool {
    $query = "update `articles` set `title` = :title , `slug` = :slug , `summary` = :summary ,
              `body` = :body , `thumbnail` = :thumbnail ,
              `category_id` = :categoryId , `updated_at` = NOW() 
               where `id` = :id ;";
    $statement = $databaseConnection->prepare($query);
    $statement->bindValue("title",$title);
    $statement->bindValue("slug",$slug);
    $statement->bindValue("summary",$summary);
    $statement->bindValue("body",$body);
    $statement->bindValue("thumbnail",$thumbnail);
    $statement->bindValue("categoryId" , $categoryId);
    $statement->bindValue("id" , $id );
    $executed = $statement->execute();
    return $statement->rowCount();
}
function articleDropTags(PDO $databaseConnection , int $id):void {
    $query = "delete from `article_tags` where `article_id` = :articleId ;";
    $statement = $databaseConnection->prepare($query);
    $executed = $statement->execute([ "articleId" => $id ]);
}
function articleRefreshTags(PDO $databaseConnection , int $id , array $tags , ?int $userId  ):void {
    articleDropTags($databaseConnection , $id );
    tagsAttachArticle($databaseConnection,$tags,$id,$userId);
}
function articleGetThumbnail(PDO $databaseConnection , int $id):null|string|false {
    $query = "select `thumbnail` from `articles` where `id`=:id;";
    $statement = $databaseConnection->prepare($query);
    $executed = $statement->execute(["id"=>$id]);
    if (!$statement->rowCount())
        return false;
    return $statement->fetch()["thumbnail"];
}
function articleDeleteById(PDO $databaseConnection , int $id ):bool {
    $query = "delete from `articles` where `id` = :id";
    $statement = $databaseConnection->prepare($query);
    $executed = $statement->execute(["id"=>$id]);
    return $statement->rowCount();
}