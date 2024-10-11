<?php
    $articleData = [
        "icon" => "fa-regular fa-newspaper" ,
        "count" => $articlesCount ,
        "name" => "مقاله"
    ];
    $userData = [
        "icon" => "fa-solid fa-users" ,
        "count" => $usersCount ,
        "name" => "کاربر"
    ];
    $commentData = [
        "icon" => "fa-solid fa-message" ,
        "count" => $commentsCount ,
        "name" => "نظر"
    ];
    $categoryData = [
        "icon" => "fa-solid fa-list-dots" ,
        "count" => $categoriesCount ,
        "name" => "دسته بندی"
    ];
?>
<div id="counters" >
    <?php component("Dashboard.Counter",$userData);?>
    <?php component("Dashboard.Counter",$articleData);?>
    <?php component("Dashboard.Counter",$categoryData);?>
    <?php component("Dashboard.Counter",$commentData);?>

</div>