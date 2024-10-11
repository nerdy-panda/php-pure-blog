<?php
    $nameFieldData = [...categoryNameFieldData(),"value"=> session_get_input("name") ?? $category['name'] ];
    $slugFieldData = [...categorySlugFieldData(),"value"=>session_get_input("slug") ?? $category['slug']];
    $iconFieldData = [...categoryIconFieldData(),"value"=>session_get_input("icon") ?? $category['icon']];
?>
<?php partial("Header",["favicon"=>$favicon,"title"=>$title],$places);?>
<?php component("Dashboard.Header",["thumbnail"=>$thumbnail,"username"=>$username]);?>
<main>
    <?php component("Dashboard.Aside"); ?>
    <div id="content">
        <?php component("AlertsPrinter");?>
        <h1>ویرایش دسته بندی <?php echo $category['name'] ?></h1>
        <form action="<?php echo dashboardCategoryUpdateUrl($categoryId)?>" method="post" id="edit-category-form" class="dashboard-form category-form">
            <?php component("MaterialField" , $nameFieldData);?>
            <?php component("MaterialField" , $slugFieldData );?>
            <?php component("MaterialField" , $iconFieldData);?>
            <?php component("RegisterClearButtons");?>
        </form>
    </div>
</main>
<?php component("Footer",["copyright"=>$copyright]);?>
<?php partial("Footer") ?>
