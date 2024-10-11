<?php require_once dirname(__DIR__).'/Include/bootstrap.php'; ?>
<?php  redirectToDashboardWhenLogin(); ?>
<?php
    $databaseConnection = mysqlConnector();
    $settings = loginPageSettings($databaseConnection);
    $settings['title'] = getPageTitle($databaseConnection,scriptName());
    view("Page.Login",$settings,loginPagePlaces());
