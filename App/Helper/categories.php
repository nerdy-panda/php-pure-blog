<?php
function get_header_nav_categories(PDO $databaseConnection , ?int $limit):array {
    $sql = "select `name` , `slug` from `categories`";
    if (is_int($limit))
        $sql.=" limit ".$limit;
    $statement = $databaseConnection->query($sql);
    return $statement->fetchAll();
}
function addCategory(PDO $databaseConnection,string $name , string $slug , int $userId , ?string $icon = null ):bool {
    $sql = "insert into `categories`(`name`,`slug`,`user_id` ,`icon`) values (:name,:slug ,:userId,:icon)";
    $statement = $databaseConnection->prepare($sql);
    $statement->bindValue(":name",$name);
    $statement->bindValue(":slug",$slug);
    $statement->bindValue(":userId",$userId);
    $statement->bindValue(":icon",$icon);
    return $statement->execute();
}
function category_counts(PDO $databaseConnection , string $column):int {
    return entityCount($databaseConnection , "categories" , "id");
}
function get_dashboard_categories(PDO $databaseConnection , int $offset ,int $limit ):array {
    $sql = "
        select
       `categories`.`id` , `categories`.`name` , `categories`.`slug` , `categories`.`articles_count` ,
       `users`.`name` as 'author_name' , `users`.`thumbnail` as 'author_thumbnail' ,
       `categories`.`created_at` , `categories`.`updated_at`
        from `categories`
        inner join `users` on `categories`.`user_id` = `users`.`id`
        order by COALESCE(`categories`.`updated_at`,`categories`.`created_at`) desc    
        limit :offset , :limit
        
    ";

    $statement = $databaseConnection->prepare($sql);
    $statement->bindValue(":offset",$offset,PDO::PARAM_INT);
    $statement->bindValue(":limit",$limit,PDO::PARAM_INT);
    $executed = $statement->execute();
    return $statement->fetchAll();
}

function categoryDeleteById(PDO $databaseConnection , int $id):bool {
    $sql = "delete from `categories` where `id` = :id";
    $statement = $databaseConnection->prepare($sql);
    $statement->bindValue(":id",$id);
    $execute = $statement->execute();
    return $statement->rowCount();
}
function categoryEditData(PDO $databaseConnection,int $id): ?array
{
    $sql = "select `name`,`slug`,`icon` from `categories` where `id` = :id limit 1";
    $statement = $databaseConnection->prepare($sql);
    $statement->bindValue(":id",$id);
    $executed = $statement->execute();
    if ($statement->rowCount()===1)
        return $statement->fetch();
    return null;
}
function categoryIsExistsById(PDO $databaseConnection , int $id):bool{
    return rowIsExists($databaseConnection,"id","categories","id",$id);
}
function categoryUpdateById(PDO $databaseConnection , int $id ,string $name , string $slug , string $icon):bool{
    $sql = "update `categories` set `name`=:name , `slug`=:slug , `icon`=:icon , `updated_at` = :updatedAt where `id`=:id ";
    $statement = $databaseConnection->prepare($sql);
    $binds = ["id"=>$id,":name"=>$name,":slug"=>$slug,":icon"=>$icon, "updatedAt"=> currentDateTime()];
    $executed = $statement->execute($binds);
    return $statement->rowCount();
}
function dashboardArticleCategoryList(PDO $databaseConnection):array {
    $query = "select `id` , `name`  from `categories` order by coalesce(`updated_at` ,`created_at`) desc;";
    $statement = $databaseConnection->query($query);
    return $statement->fetchAll();
}