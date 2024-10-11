<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php"; ?>
<?php 
    try{

        $databaseConnection = mysqlConnector();
        $databaseConnection->beginTransaction();
        $id = $_GET["id"];
        $isExists = articleExistsById($databaseConnection,$id);
        if(!$isExists)
            throw new NotFoundRow("not found article !!! ");

        $title = $_POST["title"];
        $slug = $_POST["slug"];
        $summary = $_POST["summary"];
        $body = $_POST["body"];
        $category = $_POST["category"];
        $tags = $_POST["tags"] ?? [] ;
        $authorId = $_SESSION["user"]['id'];
        $newThumbnail = $_FILES["thumbnail"];
        $hasNewThumbnail = $newThumbnail["error"] === UPLOAD_ERR_OK ;
        $thumbnail = articleGetThumbnail($databaseConnection,$id);
        $shouldDeleteThumbnail = isset($_POST["deleteThumbnail"]) && !$hasNewThumbnail ;

        if(isEmptyString($category))
            $category = null ;
        $slug = slugify($slug);


        if ($hasNewThumbnail){
            $newThumbnailPath = thumbnailUpload(
                $newThumbnail["tmp_name"],RANDOM_DIRECTORY_NAME_LENGTH , $newThumbnail["name"]
            );
            if (!is_null($thumbnail))
                deleteThumbnail($thumbnail);

            $thumbnail = THUMBNAIL_URL_PREFIX."/".$newThumbnailPath;
        }
        if ($shouldDeleteThumbnail){
            deleteThumbnail($thumbnail);
            $thumbnail = null;
        }


        $updated = articleUpdateById(
            $databaseConnection , $id , $title , $slug , $summary ,
            $body , $thumbnail , $category
        );

        if(!$updated)
            throw new Exception("update fail !!!");

        articleRefreshTags($databaseConnection,$id , $tags , $authorId );
        $databaseConnection->commit();
        session_push_success("مقاله با شناسه $id با موفقیت در سیستم به روزرسانی شد !!!");
        redirectToDashboardArticleAndExit();

    }catch(NotFoundRow $exception){
        session_push_error("هیچ مقاله ای در سیستم با شناسه $id یافت نشد !!!");
        redirectToDashboardArticleAndExit();
    }catch(Throwable $exception){
        $databaseConnection->rollBack();
        session_push_inputs_array($_POST);
        session_push_error("بروز رسانه مقاله با شناسه $id موفقیت آمیز نبود !!! ");
        redirectToDashboardArticleEditAndExit($id);
    }
    
    

?>