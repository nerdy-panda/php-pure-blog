<?php require_once dirname(__DIR__,3).'/Include/dashboardBootstrap.php'; ?>
<?php
    $databaseConnector = mysqlConnector();
    $title = getPageTitle($databaseConnector , scriptName());
    $setting = dashboardSetting($databaseConnector);
    $viewData = [
        "favicon" => $setting['favicon'] ,
        "title" => $title ,
        "thumbnail" => $_SESSION["user"]["thumbnail"] ?? $setting["user_default_thumbnail"] ,
        "username" => $_SESSION["user"]["name"] ,
        "copyright"=> $setting["copyright"]
    ];
    view("Page.Dashboard.Category.Create",$viewData,dashboardPlaces());

?>
