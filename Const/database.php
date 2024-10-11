<?php
const DATABASE_HOST ="localhost";
const DATABASE_NAME = "bico_php_pure_blog";
const DATABASE_PORT = 3306 ;

const DATABASE_CHARSET = "utf8mb4";
const DATABASE_USERNAME = "root";
const DATABASE_PASSWORD = "root";
const DATABASE_OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
    PDO::ATTR_PERSISTENT => true ,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];