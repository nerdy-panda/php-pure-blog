<?php
function getPageTitle(PDO $databaseConnection , string $scriptName):string {
    $sql = "select  concat(`settings`.`title` , \" | \" , `page_titles`.`title`) as 'title'  from `page_titles`
            inner join `settings`
            where `script_name` = \"$scriptName\"
            limit 1";
    $statement = $databaseConnection->query($sql);
    $resultSet = $statement->fetch();
    if (!$resultSet)
        return "";
    return $resultSet['title'];
}