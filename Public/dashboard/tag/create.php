<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php"; ?>
<?php
    $databaseConnection = mysqlConnector();
    $setting = dashboardBaseViewData($databaseConnection);

    $viewData = [
        ...$setting
    ];
    view("Page.Dashboard.Tag.Create",$viewData,dashboardPlaces());
?>