<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php"; ?>
<?php
    try{
        $databaseConnection = mysqlConnector();
        $id = $_GET['id'];
        $name = $_POST["name"];
        $slug = slugify($_POST["slug"]);
        $isExists = tagIsExistsById($databaseConnection,$id);
        if (!$isExists){
            session_push_error("متاسفانه هیچ تگی با شناسه $id در سیستم برای بروز رسانی یافت نشد !!!");
            redirectToDashboardTagAndExit();
        }
        $updated = tagUpdateById($databaseConnection, $id , $name , $slug );
        if (!$updated)
            throw new Exception("fail to update tag");
        session_push_success("بروز رسانی تگ با شناسه $id موفقیت آمیز بود !!!");
        redirectToDashboardTagAndExit();
    }catch (Throwable $exception){
        session_push_inputs_array($_POST);
        session_push_error("خطا در بروزرسانی تگ با شناسه $id");
        redirectToDashboardTagEditAndExit($id);
    }

