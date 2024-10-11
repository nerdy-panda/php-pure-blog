<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php"; ?>
<?php
    try {
        $databaseConnection = mysqlConnector();
        $id = $_REQUEST['id'];
        $deleted = categoryDeleteById($databaseConnection , $id);
        if (!$deleted)
            throw new Exception("fail to delete category !!! ");
        session_push_success("حذف دسته بندی موفقیت آمیز بود");
    }catch (Throwable $exception){
        session_push_error("حذف دسته بندی موفقیت آمیز نبود لطفا مجددا تلاش فرمایید !!!");
    }
    redirectToDashboardCategoryAndExit();



