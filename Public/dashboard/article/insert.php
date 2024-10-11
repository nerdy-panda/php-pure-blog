<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php" ; ?>
<?php

    try {
        $databaseConnection = mysqlConnector();
        $databaseConnection->beginTransaction();

        $title = $_POST["title"];
        $slug = $_POST["slug"];
        $summary = $_POST["summary"];
        $body = $_POST["body"];
        $authorId = $_SESSION["user"]["id"];
        $categoryId = null ;
        $tags = $_POST["tags"] ?? [];
        $thumbnail = $_FILES["thumbnail"];
        $thumbnailPath = null ;

        if(isset($_POST["category"]) &&  !isEmptyString($_POST["category"]))
            $categoryId = $_POST["category"] ;


        if($thumbnail['error']===0){
            $destination = THUMBNAIL_DESTINATION;
            $from = $thumbnail["tmp_name"];
            $fileName = $thumbnail["name"];
            $uploaded = thumbnailUpload($from,RANDOM_DIRECTORY_NAME_LENGTH,$fileName);
            $thumbnailPath = THUMBNAIL_URL_PREFIX."/".$uploaded;
        }

        $insertResult = articleAdd($databaseConnection,$title,$slug,$authorId,$categoryId,$summary,$body,$thumbnailPath);

        if (is_bool($insertResult))
            throw new Exception("fail to create a new article !!!");

        tagsAttachArticle($databaseConnection , $tags , $insertResult , $authorId );

        $databaseConnection->commit();
        session_push_success("ایجاد مقاله جدید موفقیت آمیز بود");
        session_push_success("مقاله <strong>$title</strong> با موفقیت در سیستم ثبت شد !!!");
        redirectToDashboardArticleAndExit();
    }catch (Throwable $exception){
        $databaseConnection->rollBack();
        if (!is_null($thumbnailPath))
            deleteThumbnail($thumbnailPath);
        session_push_error("خطا در ایجاد مقاله جدید");
        session_push_inputs_array($_POST);
        redirectToDashboardArticleCreateAndExit();
    }

