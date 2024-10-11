<?php
    $countersData = [
        "articlesCount" => $articlesCount ,
        "usersCount" => $usersCount ,
        "commentsCount" => $commentsCount ,
        "categoriesCount" => $categoriesCount ,
    ];
?>
<?php partial("Header",['favicon'=>$favicon,'title'=>$title],$places); ?>

<?php component(
    "Dashboard.Header",
    ["thumbnail" => $userThumbnail, "username" => $username]);
?>
    <main>
        <?php component("Dashboard.Aside");?>
        
        <section id="content">

            <?php component("Dashboard.Counters",$countersData);?>
        </section>
    </main>

<?php component("Dashboard.Footer",['copyright'=> $copyright ]);?>

<?php partial("Footer"); ?>