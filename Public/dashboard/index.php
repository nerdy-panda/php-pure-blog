<?php require_once dirname(__DIR__,2).'/Include/dashboardBootstrap.php'; ?>
<?php
    $databaseConnection = mysqlConnector();
    $setting = dashboardSetting($databaseConnection);
    $data = [
        "title" => getPageTitle($databaseConnection,scriptName()),
        "favicon" => $setting['favicon'] ,
        "copyright" => $setting['copyright'] ,
        "userThumbnail" => $_SESSION['user']['thumbnail'] ?? $setting['user_default_thumbnail'] ,
        "username"=> $_SESSION["user"]["name"] ,
        "usersCount" => user_counts($databaseConnection , "id") ,
        "articlesCount" => article_counts($databaseConnection , "id") ,
        "categoriesCount" => category_counts($databaseConnection , "id") ,
        "commentsCount" => comment_counts($databaseConnection , "id")
    ];

    view('Page.Dashboard.Index',$data,dashboardPlaces());

?>
