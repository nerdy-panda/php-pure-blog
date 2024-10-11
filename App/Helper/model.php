<?php
function entityCount(PDO $databaseConnection , string $entity , string $column):int {
    $sql = "select count($column) as 'count' from $entity " ;
    $statement = $databaseConnection->query($sql);
    $resultSet = $statement->fetch();
    return $resultSet['count'];
}
function hasRow(int $count):bool {
    return $count>0;
}
function hasNoRow(int $count):bool{
    return !hasRow($count);
}
function rowIsExists(PDO $databaseConnection , string $primaryKey , string $entity , string $column , string $value ):bool {
    $sql = "select count(:primaryKey) as 'is_exists' from `$entity` where `$column` = :value ";
    $statement = $databaseConnection->prepare($sql);
    $statement->bindValue(":primaryKey",$primaryKey);
    $statement->bindValue(":value",$value);
    $executed = $statement->execute();
    $resultSet = $statement->fetch();
    return $resultSet['is_exists'];
}