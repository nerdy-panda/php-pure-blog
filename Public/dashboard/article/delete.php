<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php" ; ?>
<?php
    try{
        $databaseConnection = mysqlConnector();
        $id = $_GET["id"];
        $exists = articleExistsById($databaseConnection,$id);
        if (!$exists)
            throw new NotFoundRow("article not found !!!");
        $thumbnail = articleGetThumbnail($databaseConnection,$id);
        $deleted = articleDeleteById($databaseConnection,$id);
        if (!$deleted)
            throw new Exception("error occurred when delete article !!!");
        if (!is_null($thumbnail))
            deleteThumbnail($thumbnail);
        session_push_success("حذف مقاله با شناسه $id موفقیت آمیز بود !!!!");
    }catch (NotFoundRow $exception){
        session_push_error("هیچ مقاله ای در سیستم با شناسه $id پیدا نشد !!!");
    }catch (Throwable $exception){
        session_push_error("خطایی در هنگام حذف مقاله با شناسه $id رخ داد !!! ");
    }finally {
        redirectToDashboardArticleAndExit();
    }
