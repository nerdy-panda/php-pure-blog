
<table class="flat-table">
    <thead>
        <tr>
            <th>*</th>
            <th>#</th>
            <th>عنوان</th>
            <th>عکس</th>
            <th>دسته بندی</th>
            <th>نویسنده</th>
            <th>تاریخ ایجاد</th>
            <th>تاریخ بروزرسانی</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $key => $article) : ?>
            <?php $rowNumber = $key + 1;?>
            <tr>
                <td><?php echo globalRowNumber($currentPage , SHOW_ARTICLE_COUNT , $rowNumber) ?></td>
                <td><?php echo $rowNumber ?></td>
                <td><?php echo $article["title"]; ?></td>
                <td class="thumbnail-cell">
                    <?php $imageUrl = stringOrDefault($article["thumbnail"] , $articleDefaultThumbnail); ?>
                    <?php $imageUrl = asset($imageUrl); ?>
                    <img src="<?php echo $imageUrl?>" alt="<?php echo $article["id"] ?>">
                </td>
                <td>
                    <?php if (is_null($article['category_name'])) : ?>
                        <i class="fa-solid fa-close"></i>
                    <?php else : ?>
                        <a href="<?php echo categoryUrl($article['category_slug'])?>">
                            <?php echo $article['category_name']; ?>
                        </a>
                    <?php endif;?>
                </td>
                <td class="author-cell">
                    <?php $authorThumbnail = stringOrDefault($article['author_thumbnail'],$userDefaultThumbnail);  ?>
                    <?php $authorThumbnail = asset($authorThumbnail); ?>
                    <a>
                        <img src="<?php echo $authorThumbnail?>" alt="<?php echo $article["author"];?>">
                        <span>
                            <?php echo $article["author"];?>
                        </span>
                    </a>
                </td>

                <td class="created-cell"><?php echo $article["created_at"]?></td>
                <td class="updated-cell">
                    <?php echo $article["updated_at"] ?? "<i class='fa fa-close'></i>"?>
                </td>
                <td class="action-cell">
                    <?php component("ViewButton",["url"=> ArticleUrl($article['slug']) ]);?>
                    <?php component("EditButton" , ["url"=> dashboardArticleEditUrl($article["id"])]);?>
                    <?php component("DeleteButton", [ "url" => dashboardArticleDeleteUrl($article["id"]) ]);?>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>