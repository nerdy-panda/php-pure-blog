<?php
function user_findUserByUsername(PDO $databaseConnection,string $username , array $columns = ['*']):array|null {
    $columnsString = implode(",",$columns);
    $sql = "select $columnsString from `users` where `username` = :username";
    $statement = $databaseConnection->prepare($sql);
    $statement->bindValue(":username",$username);
    $executed = $statement->execute();
    $resultSet = $statement->fetch();
    if(!$resultSet)
        return null;
    return $resultSet;
}
function user_counts(PDO $databaseConnection,string $column):int {
    return entityCount($databaseConnection,"users",$column);
}