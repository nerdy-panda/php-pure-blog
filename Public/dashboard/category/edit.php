<?php require_once dirname(__DIR__,3).'/Include/dashboardBootstrap.php' ?>
<?php
    $databaseConnection = mysqlConnector();
    $id = $_REQUEST['id'];
    $category = categoryEditData($databaseConnection , $id );
    redirectToDashboardCategoryIfCategoryNotFound($category);

    $setting = dashboardSetting($databaseConnection);
    $scriptName = scriptName();
    $title = getPageTitle($databaseConnection , scriptName())." $category[name]";
    $data = [
        "favicon" => $setting["favicon"] ,
        "title" => $title ,
        "category" => $category ,
        "categoryId" => $id ,
        "thumbnail" => userThumbnailOrDefault($setting['user_default_thumbnail']) ,
        "username" => $_SESSION["user"]["name"] ,
        "copyright" => $setting['copyright'] ,

    ];
    view("Page.Dashboard.Category.Edit",$data,dashboardPlaces());
?>
