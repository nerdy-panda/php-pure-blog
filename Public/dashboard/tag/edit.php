<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php" ?>
<?php
    $databaseConnection = mysqlConnector();
    $id = $_REQUEST['id'];
    $isExists = tagIsExistsById($databaseConnection , $id);
    if (!$isExists){
        session_push_error("هیچ تگی با شناسه $id در سیستم یافت نشد !!!");
        redirectToDashboardTagAndExit();
    }
    $baseSetting = dashboardBaseViewData($databaseConnection);
    $tag = dashboardTagEditData($databaseConnection,$id);

    $viewData = [
        "tag" => $tag ,
        "id" => $id ,
        ...$baseSetting ,
        "title" => $baseSetting['title'].$tag["name"]
    ];
    view("Page.Dashboard.Tag.Edit",$viewData,dashboardPlaces());