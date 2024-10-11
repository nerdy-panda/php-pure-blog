<?php
function get_oldest_setting(PDO $databaseConnection , array $columns ):array{
    $columns = implode(",",$columns);
    $sql = "select $columns from `settings` ORDER BY `created_at` DESC limit 1;";
    $statement = $databaseConnection->query($sql);
    return $statement->fetch();
}
function get_index_setting(PDO $databaseConnection):array {
    return get_oldest_setting(
        $databaseConnection,
        [
            'favicon','logo','h1','h2','hero_image',
            'copyright','show_category_count','show_article_count' ,
            'article_default_thumbnail' , 'user_default_thumbnail' ,
        ]
    );
}
function loginPageSettings(PDO $databaseConnection):array
{
    $columns = [
        'favicon' , 'logo'
    ];
    return get_oldest_setting($databaseConnection,$columns);
}
function dashboardSetting(PDO $databaseConnection , ?array $columns = null ):array {
    $settingColumns = ['favicon','user_default_thumbnail','copyright'];
    if (is_array($columns))
        $settingColumns = array_unique(array_merge($settingColumns,$columns));
    return get_oldest_setting($databaseConnection , $settingColumns);
}
function dashboardArticleSetting(PDO $databaseConnection):array {
    return dashboardSetting($databaseConnection,['article_default_thumbnail']);
}