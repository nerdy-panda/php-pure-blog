<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php"; ?>
<?php
    try{
        $databaseConnection = mysqlConnector();
        $id = $_GET["id"];
        $isExists = tagIsExistsById($databaseConnection,$id);
        if (!$isExists)
            throw new NotFoundRow("not found tag in system");
        $deleted = tagDeleteById($databaseConnection,$id);
        if (!$deleted)
            throw new Exception("fail to delete tag !!!");
        session_push_success("تگ با شناسه $id با موفقیت از سیستم پاک شد !!! ");
    }catch(NotFoundRow $exception){
        session_push_error("هیچ تگی با شناسه $id در سیستم پیدا نشد !!!");
    }catch(Throwable $exception){
        session_push_error("خطا در حذف تگ با شناسه $id");
    }finally {
        redirectToDashboardTagAndExit();
    }
