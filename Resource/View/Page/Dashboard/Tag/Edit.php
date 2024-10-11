<?php
    $headerPartialData = ["favicon"=>$favicon,"title"=>$title];
    $headerComponentData = ["thumbnail"=> $userThumbnail , "username"=> $username];
    $footerComponentData = ["copyright"=>$copyright];
    $nameFieldComponent = [
        "id" => "name" ,
        "name" => "name" ,
        "title" => "نام :" ,
        "icon" => "fa-solid fa-signature" ,
        "value" => stringOrDefault(session_get_input("name"),$tag["name"])  ,
    ];
    $slugFieldComponent = [
        "id" => "slug" ,
        "name" => "slug" ,
        "title" => "آدرس :" ,
        "icon" => "fa-solid fa-globe" ,
        "value"=> stringOrDefault(session_get_input("slug") , $tag["slug"])
    ];
?>
<?php partial("Header",$headerPartialData,$places);?>
<?php component("Dashboard.Header",$headerComponentData);?>
<main>
    <?php component("Dashboard.Aside");?>
    <div id="content">
        <?php component("AlertsPrinter");?>
        <div id="content-header">
            <h1> ویرایش تگ <?php echo $tag['name']?></h1>
        </div>
        <form action="<?php echo dashboardTagUpdateUrl($id)?>" method="post" id="tag-edit-form" class="dashboard-form tag-form">
            <?php component("MaterialField",$nameFieldComponent);?>
            <?php component("MaterialField",$slugFieldComponent);?>
            <?php component("UpdateClearButtons");?>
        </form>
    </div>
</main>
<?php component("Dashboard.Footer",$footerComponentData); ?>
<?php partial("Footer");?>
