<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php" ?>
<?php
    $databaseConnection = mysqlConnector();
    $title = getPageTitle($databaseConnection , scriptName());
    $setting = dashboardSetting($databaseConnection);
    $currentPage = current_page('page');
    $offset = getRowOffset($currentPage,SHOW_CATEGORY_COUNT);
    $categoriesCount = category_counts($databaseConnection,'id');
    $pageLength = divisionRoundUp($categoriesCount,SHOW_CATEGORY_COUNT);
    $categories = get_dashboard_categories($databaseConnection, $offset , SHOW_CATEGORY_COUNT );

    $data = [
        "favicon"=>$setting['favicon'] ,
        "title" => $title ,
        "thumbnail" => $_SESSION["user"]["thumbnail"] ?? $setting["user_default_thumbnail"] ,
        "userDefaultThumbnail" => $setting["user_default_thumbnail"] ,
        "username" => $_SESSION['user']["name"] ,
        "copyright" => $setting["copyright"] ,
        "categories" => $categories ,
        "categoryCounts" => $categoriesCount ,
        "currentPage" => $currentPage ,
        "pageLength" => $pageLength ,
        "categoryShowCount" => SHOW_CATEGORY_COUNT ,
    ];
    view("Page.Dashboard.Category.Index",$data , dashboardPlaces());

?>
