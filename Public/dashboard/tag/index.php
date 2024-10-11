<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php" ?>
<?php
    $databaseConnection = mysqlConnector();
    $baseViewData = dashboardBaseViewData($databaseConnection);

    $tagsCount = getTagsCount($databaseConnection);
    $pagesCount = pageCount($tagsCount,SHOW_TAG_COUNT);
    $currentPage = current_page("page");
    $offset = getRowOffset($currentPage,SHOW_TAG_COUNT);
    $tags = getDashboardTags($databaseConnection,SHOW_TAG_COUNT , $offset );

    $viewData = [
        "tagsCount" => $tagsCount ,
        "tags" => $tags ,
        "currentPage" => $currentPage ,
        "pagesCount" => $pagesCount ,
        ...$baseViewData ,
    ];
    view("Page.Dashboard.Tag.Index", $viewData , dashboardPlaces());
