<?php
    $inputCategory = session_get_input("category");
    $inputTags = session_get_input("tags") ?? [];
    $headerPartialData = [
        "favicon" => $favicon ,
        "title" => $title ,
    ];
    $headerComponentData = [
        "thumbnail" => $userThumbnail ,
        "username" => $username
    ];
    $footerComponentData = ["copyright" => $copyright];
    $titleFieldData = [
        "name" => "title",
        "title" => "عنوان :",
        "icon" => "fa-solid fa-signature",
        "id" => "title" ,
        "value" => stringOrDefault(session_get_input('title'),"")
    ];
    $slugFieldData = [
        "name" => "slug" ,
        "title" => "آدرس :" ,
        "id" => "slug" ,
        "icon" => "fa-solid fa-globe" ,
        "value" => stringOrDefault(session_get_input("slug"),"")
    ];
    $thumbnailFieldData = [
        "rowId" => "thumbnail-field-row" ,
        "title"=>"انتخاب عکس" ,
        "id" => "thumbnail" ,
        "name" => "thumbnail" ,
        "icon" => "fa-solid fa-image"
    ];
    $summaryFieldData = [
        "title" => "خلاصه :" ,
        "id" => "summary" ,
        "name" => "summary" ,
        "icon" => "fa-solid fa-circle-info" ,
        "value" => stringOrDefault(session_get_input("summary") , "")
    ];
    $bodyFieldData = [
        "title" => "محتوا :" ,
        "id" => "body" ,
        "name" => "body" ,
        "icon" => "fa-solid fa-newspaper" ,
        "value" => stringOrDefault(session_get_input("body") , "")
    ];
    $categoryFieldData = [
        "id"=> "category" ,
        "name" => "category" ,
        "icon" => "fa-solid fa-shapes" ,
        "title" => "دسته بندی :" ,
        "items" => [
            [ "text"=>"بدون دسته بندی" , "value"=> "" ] ,
            ...categoriesToSelectItems($categories,$inputCategory)
        ]
    ];
    $tagsFieldData = [
        "id" => "tags" ,
        "name" => "tags[]" ,
        "icon" => "fa-solid fa-tags" ,
        "title" => "تگ ها :" ,
        "items" =>  tagsToSelectItems($tags,$inputTags),
    ];
?>
<?php partial("Header" , $headerPartialData , $places ); ?>
<?php component("Dashboard.Header" , $headerComponentData); ?>
<main>
    <?php component("Dashboard.Aside"); ?>
    <div id="content">
        <?php component("AlertsPrinter");?>
        <h1>
            <i class="fa-solid fa-plus"></i>
            ایجاد مقاله جدید
        </h1>
        <form method="post" action="<?php echo dashboardArticleInsertUrl()?>"
              id="article-create-form" class="article-form dashboard-form"
              enctype="multipart/form-data">

            <?php component("MaterialField", $titleFieldData);?>
            <?php component("MaterialField", $slugFieldData);?>
            <?php component("MaterialTextareaField", $summaryFieldData);?>
            <?php component("MaterialTextareaField" , $bodyFieldData);?>
            <?php component("MaterialSelectBox",$categoryFieldData);?>
            <?php component("MaterialMultipleSelectBox",$tagsFieldData);?>
            <?php component("MaterialFileField", $thumbnailFieldData);?>
            <?php component("RegisterClearButtons");?>
        </form>
    </div>

</main>
<?php component("Dashboard.Footer" , $footerComponentData); ?>
<?php partial("Footer");?>
