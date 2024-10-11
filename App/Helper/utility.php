<?php
function mysqlConnector():PDO
{
    $dsn = "mysql:host=".DATABASE_HOST.";";
    if (!is_null(DATABASE_NAME))
        $dsn.="dbname=".DATABASE_NAME.";";
    $dsn.="port=".DATABASE_PORT.";charset=".DATABASE_CHARSET.";";
    return new PDO($dsn,DATABASE_USERNAME,DATABASE_PASSWORD,DATABASE_OPTIONS);
}
function getRowOffset(int $currentPage , int $limit):int{
    return ($currentPage-1)*$limit;
}

function finish():void
{
    session_clear_inputs_if_exists();
    session_clear_error_if_exists();
    session_clear_success_if_exists();
}

function globalRowNumber(int $currentPage , int $showCount , int $rowNumber):int {
    return ((($currentPage - 1) * $showCount ) + $rowNumber);
}
function userThumbnailOrDefault(string $default):string {
    return $_SESSION['user']['thumbnail'] ?? $default ;
}