<?php require_once dirname(__DIR__,3).'/Include/dashboardBootstrap.php'; ?>
<?php
    $databaseConnection = mysqlConnector();
    $setting = dashboardArticleSetting($databaseConnection);

    $title = getPageTitle($databaseConnection , scriptName());

    $articlesCount = article_counts($databaseConnection,"id");
    $currentPage = current_page("page");
    $pagesCount = pageCount($articlesCount , SHOW_ARTICLE_COUNT);
    $offset = getRowOffset($currentPage,SHOW_ARTICLE_COUNT);
    $articles = getDashboardArticles($databaseConnection,SHOW_ARTICLE_COUNT , $offset );



    $data = [
        "favicon" => $setting["favicon"] ,
        "title" => $title ,
        "thumbnail" => userThumbnailOrDefault($setting['user_default_thumbnail']) ,
        "userDefaultThumbnail" => $setting['user_default_thumbnail'] ,
        "username" => $_SESSION['user']['name'] ,
        "copyright" => $setting['copyright'] ,
        "articles"=> $articles ,
        "articlesCount" => $articlesCount ,
        "articleDefaultThumbnail" => $setting["article_default_thumbnail"] ,
        "pagesCount" => $pagesCount ,
        "currentPage" => $currentPage ,
    ];
    view("Page.Dashboard.Article.Index",$data,dashboardPlaces());
?>
