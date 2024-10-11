<?php partial("Header",["favicon" => $favicon , "title" => $title ],$places);?>
<?php component("Dashboard.Header",["thumbnail"=>$thumbnail,"username"=>$username]);?>
<main>
    <?php component("Dashboard.Aside");?>
    <div id="content">
        <?php component("AlertsPrinter");?>
        <h1>افزودن دسته بندی جدید</h1>
        <form action="<?php echo dashboardUrl()?>/category/insert.php" method="post" id="create-category-form" class="dashboard-form category-form">
            <?php component("MaterialField",categoryNameFieldData());?>
            <?php component("MaterialField",categorySlugFieldData());?>
            <?php component("MaterialField",categoryIconFieldData());?>
            <?php component("RegisterClearButtons");?>
        </form>

    </div>
</main>
<?php component("Dashboard.Footer",['copyright'=>$copyright]);?>
<?php partial("Footer");?>
