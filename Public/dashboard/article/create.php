<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php"; ?>
<?php

    $databaseConnection = mysqlConnector() ;
    $setting = dashboardSetting($databaseConnection);
    $title = getPageTitle($databaseConnection , scriptName());
    $categories = dashboardArticleCategoryList($databaseConnection);
    $tags = dashboardArticleCreateTags($databaseConnection);

    $viewData = [
        "favicon" => $setting['favicon'] ,
        "copyright" => $setting["copyright"] ,
        "userThumbnail" => userThumbnailOrDefault($_SESSION['user']['thumbnail'],$setting["user_default_thumbnail"]) ,
        "title" => $title ,
        "username" => $_SESSION['user']['name'] ,
        "categories" => $categories ,
        "tags" => $tags
    ];
    view("Page.Dashboard.Article.Create" , $viewData ,dashboardArticleCreatePlaces());
?>
