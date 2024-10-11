<?php
    $isNoCategoryExist = hasNoRow($categoryCounts);
?>
<?php partial("Header",["favicon"=>$favicon,"title"=>$title],$places);?>
<?php component("Dashboard.Header",["thumbnail"=>$thumbnail,"username"=>$username]);?>
<main>
    <?php component("Dashboard.Aside");?>
    <div id="content">
        <?php component("AlertsPrinter");?>
        <div id="content-header">
            <h1>
                لیست دسته بندی ها
                ( <?php echo $categoryCounts?> عدد )
            </h1>
            <?php component("AddButton",["url"=> dashboardCreateCategoryUrl()]);?>
        </div>

        <?php if($isNoCategoryExist): ?>
            <?php
                $message = 'هیچ دسته بندی در سیستم برای نمایش یافت نشد
                    میتونید یکی
                    <a href="'.dashboardCreateCategoryUrl().'">ایجاد</a>
                    کنید';
                component("InfoAlert",['message'=>$message]);
            ?>
        <?php elseif($currentPage>$pageLength): ?>
            <?php component("WarningAlert",["message"=>"هیچ دسته بندی ای برای نمایش در این صفحه وجود ندارد !!!"]); ?>
        <?php else :?>
            <table class="flat-table">
                <thead>
                    <tr>
                        <th>*</th>
                        <th>#</th>
                        <th>نام</th>
                        <th>آدرس</th>
                        <th>توسط</th>
                        <th>تعداد مقاله ها</th>
                        <th>تاریخ ساخت</th>
                        <th>تاریخ آخرین آپدیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $key=>$category):?>
                        <?php $rowNumber = $key + 1 ; ?>
                        <tr>
                            <td><?php echo globalRowNumber($currentPage,$categoryShowCount,$rowNumber)?></td>
                            <td><?php echo $rowNumber?></td>
                            <td><?php echo $category['name'] ?></td>
                            <td>
                                <a href="<?php echo categoryUrl($category['slug'])?>">
                                    <?php echo $category['slug'] ?>
                                </a>
                            </td>
                            <td class="author-cell">
                                <a href="">
                                    <?php $author_thumbnail = $category['author_thumbnail'] ?? $userDefaultThumbnail ; ?>
                                    <img src="<?php echo asset($author_thumbnail)?>" alt="<?php echo $category['author_name']?>">
                                    <span>
                                        <?php echo $category['author_name'];?>
                                    </span>
                                </a>
                            </td>
                            <td><?php echo $category['articles_count']?></td>
                            <td dir="ltr"><?php echo $category['created_at']?></td>
                            <td dir="ltr"><?php echo $category['updated_at']?></td>
                            <td class="action-cell">
                                <?php component("EditButton",['url'=> dashboardEditCategoryUrl($category['id']) ]);?>
                                <?php component("DeleteButton",['url'=> dashboardDeleteCategoryUrl($category['id']) ]);?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        <?php endif; ?>

        <?php if ($pageLength>1 || ($currentPage > $pageLength && $categoryCounts>0)) : ?>
            <?php component("Paginations",["current"=> $currentPage ,"count"=> $pageLength , "pageKey"=>"page"]);?>
        <?php endif;?>


    </div>
</main>
<?php component("Dashboard.Footer", ["copyright"=> $copyright]  ); ?>
<?php partial("Footer");?>
