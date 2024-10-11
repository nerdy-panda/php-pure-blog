<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php"; ?>
<?php
    try{
        $databaseConnection = mysqlConnector();
        $name = $_POST["name"];
        $slug = $_POST["slug"];
        $userId = $_SESSION['user']['id'];
        $inserted = tagAdd($databaseConnection,$name,$slug,$userId);
        if (!$inserted)
            throw new Exception("insert fail !!!");
        session_push_success("ایجاد تگ موفقیت آمیز بود");
    }catch (Throwable $exception){
        session_push_error("خطا در ایجاد تگ جدید !!!");
        session_push_inputs_array($_POST);
        redirectToTagCreateAndExit();
    }finally {
        redirectToDashboardTagAndExit();
    }
?>
