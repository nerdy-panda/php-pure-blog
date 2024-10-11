<?php
    $headerPartialData = [
        "favicon" => $favicon ,
        "title" => $title
    ];
    $headerComponentData = [
        "username" => $username ,
        "thumbnail" => $userThumbnail
    ];
?>
<?php partial("Header",$headerPartialData,$places); ?>
<?php component("Dashboard.Header" , $headerComponentData );?>
<main>
    <?php component("Dashboard.Aside"); ?>
    <div id="content">
        <?php component("AlertsPrinter");?>
        <div id="content-header">
            <h1>لیست تگ ها ( <?php echo $tagsCount ?> )</h1>
            <?php component("AddButton",["url"=> dashboardTagCreateUrl()]);?>
        </div>
        <?php if (hasNoRow($tagsCount)) : ?>
            <?php $message = "هیچ تگی در سیستم برای نمایش یافت نشد میتونید از <a href='".dashboardTagCreateUrl()."'> اینجا</a> یکی ایجاد کنید !!!"; ?>
            <?php component("InfoAlert",["message" => $message]);?>
        <?php elseif($currentPage > $pagesCount) :?>
            <?php component("WarningAlert",["message"=>"هیچ تگی در این صفحه برای نمایش وجود ندارد"]);?>
        <?php else : ?>
            <?php component("TagsTable",["tags"=>$tags , "currentPage"=> $currentPage , "userDefaultThumbnail"=> $userDefaultThumbnail ]);?>
        <?php endif;?>

        <?php if ($pagesCount>1 || (hasRow($tagsCount) && $currentPage > $pagesCount)) : ?>
            <?php $paginationsComponent = ["current" => $currentPage , "count"=> $pagesCount , "pageKey" => "page"]; ?>
            <?php component("Paginations",$paginationsComponent);?>
        <?php endif; ?>
    </div>
</main>

<?php component("Dashboard.Footer",["copyright"=>$copyright]);?>
<?php partial("Footer");?>
