<?php require_once dirname(__DIR__,3)."/Include/dashboardBootstrap.php"; ?>
<?php
    try{
        $databaseConnection = mysqlConnector() ;
        $id = $_GET["id"];
        $article = dashboardArticleEditData($databaseConnection , $id );
        if (!$article)
            throw new NotFoundRow("not found article with id $id");
        $baseViewData = dashboardBaseViewData($databaseConnection);
        $categories = dashboardArticleCategoryList($databaseConnection);
        $tags = dashboardArticleCreateTags($databaseConnection);
        $articleTagsIds = articleTagIds($databaseConnection,$id);
        $articleTagsIds = articleTagIdsToArray($articleTagsIds);
        $viewData = [
            "article" => $article ,
            "articleId" => $id , 
            "categories" => $categories ,
            "tags" => $tags ,
            "articleTagIds" => $articleTagsIds ,
            "thumbnail" => userThumbnailOrDefault($baseViewData["userDefaultThumbnail"]) ,
            ...$baseViewData ,
            "title" => $baseViewData["title"] . " " . $article["title"]
        ];
        view("Page.Dashboard.Article.Edit",$viewData,dashboardArticleCreatePlaces());
    }catch (NotFoundRow $exception){
        session_push_error("هیچ مقاله ای با شناسه $id در سیستم پیدا نشد !!!‌");
        redirectToDashboardArticleAndExit();
    }catch(Throwable $exception){
        session_push_error("در هنگام واکشی مقاله با شناسه $id خطایی رخ داد !!!");
        redirectToDashboardArticleAndExit();
    }


