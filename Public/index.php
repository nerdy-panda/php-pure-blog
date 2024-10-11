<?php require_once dirname(__DIR__).'/Include/bootstrap.php'; ?>
<?php
    $databaseConnection = mysqlConnector();
    $title = getPageTitle($databaseConnection,scriptName());
    $settings = get_index_setting($databaseConnection);
    $categories = get_header_nav_categories($databaseConnection , $settings['show_category_count']);
    $articlesCount = article_counts($databaseConnection , "id");
    $articleShowCount = $settings['show_article_count'];
    $articlePageCount = divisionRoundUp($articlesCount,$articleShowCount);
    $currentArticlePage = current_page('page');
    $articles = get_index_articles($databaseConnection,$articleShowCount,getRowOffset($currentArticlePage,$articleShowCount));

    $data = [
        'setting'=> $settings , 'title'=> $title , 'categories'=> $categories , 'articles'=>$articles ,
        'articlePageCount' => $articlePageCount , 'currentArticlePage' => $currentArticlePage ,
        'articleShowCount' => $articleShowCount , 'articlesCount'=>$articlesCount
    ];

    view('Page.Index',$data,indexPagePlaces());
