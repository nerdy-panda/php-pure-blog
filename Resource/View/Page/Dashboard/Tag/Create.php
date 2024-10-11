<?php
    $headerPartialData = [
        "favicon" => $favicon ,
        "title" => $title
    ];
    $headerComponentData = [
        "username" => $username ,
        "thumbnail" => $userThumbnail ,
    ];
    $footerComponentData = [
        "copyright" => $copyright ,
    ];
    $nameFieldData = [
        "name"=>"name",
        "id"=>"name",
        "title"=>"نام :",
        "icon"=>"fa-solid fa-signature" ,
        "value" => stringOrDefault(session_get_input("name"),"")
    ];
    $slugFieldData = [
        "name"=>"slug",
        "id"=>"slug",
        "title"=>"آدرس :",
        "icon"=> "fa-solid fa-globe" ,
        "value" => stringOrDefault(session_get_input("slug"),"")
    ];
?>
<?php partial("Header" , $headerPartialData , $places );?>
<?php component("Dashboard.Header",$headerComponentData); ?>
<main>
    <?php component("Dashboard.Aside");?>
    <section id="content">
        <?php component("AlertsPrinter");?>
        <h1>ایجاد تگ جدید</h1>
        <form action="<?php echo dashboardTagInsertUrl()?>" method="post" class="dashboard-form tag-form">
            <?php component("MaterialField",$nameFieldData);?>
            <?php component("MaterialField" , $slugFieldData ); ?>
            <?php component("RegisterClearButtons");?>
        </form>
    </section>
</main>
<?php component("Dashboard.Footer",$footerComponentData);?>
<?php partial("Footer");?>
