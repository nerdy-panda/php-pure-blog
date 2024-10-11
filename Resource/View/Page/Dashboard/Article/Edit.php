<?php
    $formAction = dashboardArticleUpdateUrl($articleId);
    $sessionInputCategory = session_get_input("category");
    $sessionInputTags = session_get_input("tags");
    $articleThumbnail = $article['thumbnail'];
    $articleHasThumbnail = !is_null($articleThumbnail) && !isEmptyString($articleThumbnail)  ;
    if(isset($_SESSION["inputs"]) && !isset($_SESSION["inputs"]["tags"]))
        $sessionInputTags = [];
    $headerPartialData = [
        "favicon" => $favicon ,
        "title" => $title ,
    ] ;
    $headerComponentData = [
        "thumbnail" => $thumbnail ,
        "username" => $username
    ];
    $titleFieldData = [
        "name" => "title" ,
        "id" => "title" ,
        "title" => "عنوان :" ,
        "icon" => "fa-solid fa-signature" ,
        "value" => session_get_input("title") ?? $article["title"]
    ];
    $slugFieldData = [
        "id" => "slug" ,
        "name" => "slug" ,
        "title" => "آدرس :" ,
        "icon" => "fa-solid fa-globe" ,
        "value" => $_SESSION["inputs"]["slug"] ?? $article["slug"] ,
    ];
    $summaryFieldData = [
        "id" => "summary" ,
        "name" => "summary" ,
        "icon" => "fa-solid fa-info-circle" ,
        "title" => "خلاصه :" ,
        "value" => session_get_input("summary") ?? $article["summary"],
    ];
    $bodyFieldData = [
        "id" => "body" ,
        "name" => "body" ,
        "icon" => "fa-solid fa-newspaper" ,
        "title" => "محتوا :" ,
        "value" => session_get_input("body") ?? $article["body"]
    ];
    $categorySelectBoxData = [
        "id" => "category" , 
        "name" => "category" ,
        "title" => "دسته بندی :" ,  
        "icon" => "fa-solid fa-shapes" ,
        "items" => [
            ["text"=> "انتخاب دسته بندی" , "value" => ""] ,
            ...categoriesToSelectItems($categories , $sessionInputCategory ?? $article["category_id"])
        ]
    ];
    $tagsSelectBoxData = [
            "name" => "tags[]" ,
            "id" => "tags" , 
            "title" => "تگ ها :" ,
            "icon" => "fa-solid fa-tags"  , 
            "items" => tagsToSelectItems($tags,$sessionInputTags ?? $articleTagIds) ,
    ];
    $fileFieldData = [
        "title" => (($articleHasThumbnail) ? "انتخاب عکس جدید":"انتخاب عکس") ,
        "icon" => "fa-solid fa-image" ,
        "name" => "thumbnail" ,
        "id" => "thumbnail" ,
        "rowId" => "thumbnail-field-row"
    ];
?>
<?php partial("Header" , $headerPartialData , $places); ?>
<?php component("Dashboard.Header" , $headerComponentData); ?>
<main>
    <?php component("Dashboard.Aside");?>
    <div id="content">
        <?php component("AlertsPrinter"); ?>
        <h1>ویرایش مقاله <?php echo $article["title"]?></h1>

        <form action="<?php echo $formAction ?>" method="post" class="article-form dashboard-form" enctype="multipart/form-data">
            <?php component("MaterialField" , $titleFieldData );?>
            <?php component("MaterialField" , $slugFieldData );?>
            <?php component("MaterialTextareaField" , $summaryFieldData);?>
            <?php component("MaterialTextareaField" , $bodyFieldData);?>
            <?php component("MaterialSelectBox" , $categorySelectBoxData ); ?>
            <?php component("MaterialMultipleSelectBox" , $tagsSelectBoxData ); ?>
            <?php if($articleHasThumbnail) : ?>
                <?php component("ThumbnailPreview" , ["thumbnail"=>$articleThumbnail]); ?>
                <?php $deleteThumbnailData = [
                    "text" => "حذف عکس" , "id" => "deleteThumbnail" , "name" => "deleteThumbnail" ,
                    "checked" => ((is_null(session_get_input("deleteThumbnail"))) ? null : true )
                ] ;
                ?>
                <?php component("MaterialCheckboxField30",$deleteThumbnailData);?>
            <?php endif; ?>

            <?php component("MaterialFileField", $fileFieldData )?>

            <?php component("RegisterClearButtons");?>
        </form>
    </div>
</main>
<?php component("Dashboard.Footer" , ["copyright" => $copyright]);?>
<?php partial("Footer"); ?>