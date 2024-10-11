<article class="article-item">
    <header class="article-header">
        <?php $thumbnail = $thumbnail ?? $articleDefaultThumbnail ?>

        <img src="<?php echo asset($thumbnail) ?>" alt="wordpress" class="article-thumbnail">
    </header>
    <section class="article-body">
        <h2 class="article-title">
            <?php echo $title?>
        </h2>
        <p class="article-summary">
            <?php echo $summary; ?> ...
        </p>
    </section>
    <footer class="article-footer">
        <div class="article-info">
            <?php $authorProfileUrl = url()."/user.php?user=$author_id"; ?>
            <div class="article-author">
                <a href="<?php echo $authorProfileUrl?>">
                    <?php $author_thumbnail = $author_thumbnail ?? $userDefaultThumbnail ;?>
                    <img src="<?php echo $author_thumbnail?>" alt="profile" class="author-thumbnail">
                </a>
                <h6>
                    <a href="<?php echo $authorProfileUrl?>">
                        <?php echo $author_name;?>
                    </a>
                </h6>
            </div>
            <div class="article-view-count">
                <i class="fa-regular fa-eye"></i>
                <?php echo $view_count ?>
            </div>
            <div class="article-like-count">
                <i class="fa-regular fa-heart"></i>
                <?php echo $like_count?>
            </div>
        </div>
        <a href="<?php echo url().'/article.php?slug='.$slug?>" class="article-read-more-button">
            <i class="fa-solid fa-circle-plus"></i>
            ادامه مطلب
        </a>
    </footer>
</article>
