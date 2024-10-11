<?php partial('Header',[
        'title'=> $title , 'favicon' => $setting['favicon']
],$places);

?>

<?php component("Header", ['logo' => $setting['logo'], 'h1' => $setting['h1'], 'h2' => $setting['h2'], 'categories' => $categories , 'userDefaultThumbnail' => $setting['user_default_thumbnail']]); ?>

<main>
    <?php component("Hero", ['heroImage' => $setting['hero_image']]); ?>

    <?php if (!empty($articles) && $articleShowCount > 0 && $articlesCount > 0) : ?>
        <?php component("Articles", ['articles' => $articles, 'articleDefaultThumbnail' => $setting['article_default_thumbnail'], 'userDefaultThumbnail' => $setting['user_default_thumbnail']]); ?>
    <?php elseif ($articleShowCount === 0 || $articlesCount === 0) : ?>
        <div class="container">
            <div class="alert alert-info">
                هیچ مقاله ای برای نمایش وجود ندارد !!!
            </div>
        </div>
    <?php elseif ($currentArticlePage > $articlePageCount) : ?>
        <div class="container">
            <div class="alert alert-info">
                هیچ مقاله ای برای نمایش در این صفحه وجود ندارد !!!
            </div>
        </div>
    <?php endif; ?>

    <?php if ($articlePageCount > 0) : ?>
        <?php
        component("Paginations", ['count' => $articlePageCount, 'current' => $currentArticlePage, 'pageKey' => 'page']);
        ?>
    <?php endif; ?>
</main>
<?php component("Footer", ['copyright' => $setting['copyright']]) ?>

<?php partial('Footer');?>