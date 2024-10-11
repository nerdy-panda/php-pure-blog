<?php require_once dirname(__DIR__,3).'/Include/dashboardBootstrap.php';?>
<?php
    $databaseConnection = mysqlConnector();
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $slug = slugify($_REQUEST['slug']);
    $icon = $_REQUEST['icon'];

    $isExists = categoryIsExistsById($databaseConnection,$id);
    if (!$isExists){
        session_push_error("هیچ دسته بندی ای با شناسه $id پیدا نشد !!!");
        redirectToDashboardCategoryAndExit();
    }
    $updated = categoryUpdateById($databaseConnection,$id,$name,$slug,$icon);
    if (!$updated){
        session_push_inputs_array(["name"=>$name,"icon"=>$icon,"slug"=>$_REQUEST['slug']]);
        session_push_error("بروز رسانی دسته بندی با شناسه $id ناموفق بود مجددا تلاش کنید !!! ");
        redirectToDashboardEditCategoryAndExit($id);
    }
    session_push_success("بروز رسانی دسته بندی با شناسه $id موفقیت آمیز بود !!!");
    redirectToDashboardCategoryAndExit();