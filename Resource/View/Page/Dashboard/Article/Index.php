<?php
    $headerPartial = ["favicon"=>$favicon,"title"=>$title];
    $headerComponent = ["thumbnail"=>$thumbnail , "username"=> $username] ;
    $footerComponent = ["copyright"=> $copyright];
    $articlesTableComponent = [
        "articles"=>$articles ,
        "articleDefaultThumbnail"=> $articleDefaultThumbnail ,
        "userDefaultThumbnail"=> $userDefaultThumbnail ,
        "currentPage" => $currentPage
    ];
    $paginationComponent = ["current" => $currentPage , "count"=>$pagesCount , "pageKey" => "page"];
?>
<?php partial("Header",$headerPartial,$places); ?>
<?php component("Dashboard.Header",$headerComponent)?>
<main >
    <?php component("Dashboard.Aside");?>
    <div id="content">
        <?php component("AlertsPrinter"); ?>
        <div id="content-header">
            <h1>
                لیست مقاله ها
                (<?php echo $articlesCount?>)
            </h1>
            <?php component("AddButton",["url"=>dashboardArticleCreateUrl()]);?>
        </div>

        <?php if (hasNoRow($articlesCount)) : ?>
            <?php $createArticleUrl = dashboardArticleCreateUrl();?>
            <?php $message = "  هیچ مقاله ای در سیستم برای نمایش پیدا نشد میتونید از <a href='$createArticleUrl'>اینجا </a> یکی ایجاد کنید !!!"; ?>
            <?php component("InfoAlert",["message"=>$message]);?>
        <?php elseif($currentPage > $pagesCount): ?>
            <?php component("PurpleAlert" , ["message"=>"هیچ مقاله ای در این صفحه وجود ندارد"]);?>
        <?php else : ?>
            <?php component("ArticlesTable",$articlesTableComponent);?>
        <?php endif;?>

        <?php if ($pagesCount > 1) : ?>
            <?php component("Paginations",$paginationComponent);?>
        <?php endif;?>



    </div>
</main>
<?php component("Dashboard.Footer",$footerComponent);?>
<?php partial("Footer");?>

