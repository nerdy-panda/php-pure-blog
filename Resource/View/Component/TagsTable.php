<table class="flat-table">
    <thead>
        <tr>
            <th>*</th>
            <th>#</th>
            <th>نام</th>
            <th>آدرس</th>
            <th>تعداد مقاله ها</th>
            <th>ایجاد کننده</th>
            <th>تاریخ ایجاد</th>
            <th>تاریخ آخرین آپدیت</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tags as $index => $tag ) : ?>
            <?php $rowIndex = $index + 1 ; ?>
            <tr>
                <td><?php echo globalRowNumber($currentPage , SHOW_TAG_COUNT,$rowIndex)  ?></td>
                <td><?php echo $rowIndex ?></td>
                <td><?php echo $tag['name'] ?></td>
                <td><?php echo $tag['slug'] ?></td>
                <td><?php echo $tag['article_count'] ?></td>
                <td class="author-cell">
                    <?php if(is_null($tag["author_username"])) : ?>
                        <i class="fa-solid fa-close"></i>
                    <?php else : ?>
                        <a href="<?php echo userUrl($tag["author_username"])?>">
                            <?php $authorThumbnail = stringOrDefault($tag["author_thumbnail"] , $userDefaultThumbnail) ;?>
                            <img src="<?php echo asset($authorThumbnail)?>" alt="<?php echo $tag["author_name"];?>">
                            <?php echo $tag["author_name"]; ?>
                        </a>
                    <?php endif;?>
                </td>
                <td class="created-cell"><?php echo $tag['created_at'] ?></td>
                <td class="updated-cell">
                    <?php echo stringOrDefault($tag['updated_at'],"<i class='fa-solid fa-close'></i>") ?>
                </td>
                <td class="action-cell">
                    <?php component("ViewButton",["url"=>tagUrl($tag['slug'])]);?>
                    <?php component("EditButton",["url"=>dashboardTagEditUrl($tag['id'])]);?>
                    <?php component("DeleteButton",["url"=>dashboardTagDeleteUrl($tag['id'])]);?>
                </td>
            </tr>
        <?php endforeach;?>

    </tbody>
</table>