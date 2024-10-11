<?php
function getDashboardTags(PDO $databaseConnection , int $limit , int $offset):array {
    $query = "
                select 
                        `tags`.`id` , `tags`.`name` , `tags`.`slug` ,`tags`.`article_count` ,
                        `users`.`username` as 'author_username' , `users`.`name` as 'author_name',
                        `users`.`thumbnail` as `author_thumbnail` , `tags`.`created_at` ,
                        `tags`.`updated_at`
                from `tags`
                left join `users` on `tags`.`user_id` = `users`.`id`
                order by coalesce(`tags`.`updated_at`,`tags`.`created_at`) desc
                limit :offset , :limit
            ";
    $statement = $databaseConnection->prepare($query);
    $statement->bindValue(":limit",$limit,PDO::PARAM_INT);
    $statement->bindValue(":offset",$offset,PDO::PARAM_INT);
    $executed = $statement->execute();
    return $statement->fetchAll();
}
function getTagsCount(PDO $databaseConnection):int
{
    return entityCount($databaseConnection,"tags","id");
}
function tagIsExistsById(PDO $databaseConnection , int $id):bool
{
    return rowIsExists($databaseConnection,"id","tags","id",$id);
}
function dashboardTagEditData(PDO $databaseConnection , int $id):array {
    $query = "select `name` , `slug` from `tags` where `id` = :id limit 1";
    $statement = $databaseConnection->prepare($query);
    $statement->bindValue(":id",$id);
    $executed = $statement->execute();
    return $statement->fetch();
}
function tagUpdateById(PDO $databaseConnection , int $id , string $name , string $slug ):bool {
    $query = "update `tags` set `name` = :name , `slug` = :slug , `updated_at` = :updatedAt where `id` = :id ";
    $statement = $databaseConnection->prepare($query);
    $binds = [ "name" => $name , "slug" => $slug ,"updatedAt" => currentDateTime() , "id" => $id ];
    $executed = $statement->execute($binds);
    return $statement->rowCount();
}
function tagAdd(PDO $databaseConnection , string $name , string $slug , int $userId ):bool {

    $query = "insert into `tags`(`name`,`slug`,`user_id`) value (:name,:slug,:userId) ";
    $statement = $databaseConnection->prepare($query);
    $binds = ["name" => $name , "slug" => $slug , "userId" => $userId];
    $executed = $statement->execute($binds);
    return $statement->rowCount();
}
function tagDeleteById(PDO $databaseConnection , int $id):bool {

    $query = "delete from `tags` where `id` = :id ";
    $statement = $databaseConnection->prepare($query);
    $executed = $statement->execute(["id"=>$id]);
    return $statement->rowCount();
}
function dashboardArticleCreateTags(PDO $databaseConnection):array {
    $query = "select `id` , `name` from `tags` order by coalesce(`updated_at` , `created_at`) desc ;";
    $statement = $databaseConnection->query($query);
    $executed = $statement->execute();
    return $statement->fetchAll();
}
function tagAttachArticle(PDO $databaseConnection , int $tagId , int $articleId , ?int $userId):bool
{
    $query = "insert into `article_tags` value (null,:tagId,:articleId,:userId);";
    $statement = $databaseConnection->prepare($query);
    $binds = [ "tagId" => $tagId , "articleId" => $articleId , "userId" => $userId ];
    $executed = $statement->execute($binds);
    return $statement->rowCount();
}
function tagsAttachArticle(PDO $databaseConnection , array $tagsId  , int $articleId , ?int $userId ):void {
    $tagId = null ;
    $query = "insert into `article_tags` value (null , :tagId , :articleId , :userId);";
    $statement = $databaseConnection->prepare($query);
    $statement->bindParam("tagId",$tagId);
    $statement->bindValue("articleId" , $articleId);
    $statement->bindValue("userId",$userId);
    foreach ($tagsId as $tagId){
        $executed = $statement->execute();
        $rowCount = $statement->rowCount();
        if (!$rowCount)
            throw new Exception("fail to attach tag $tagId to article $articleId ");
    }
}
