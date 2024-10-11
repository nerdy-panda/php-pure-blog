<header id="page-header">
    <nav id="category-nav">
        <ul>
            <li id="user-link">
                <a>
                    <img src="<?php echo asset($thumbnail) ?>" alt="">
                    خوش آمدی
                    <?php echo $username; ?>
                </a>
            </li>
        </ul>
    </nav>
    <nav id="user-actions">
        <ul>
            <li><a href="<?php echo baseUrl();?>">مشاهده سایت</a></li>
            <li>
                <a href="<?php echo baseUrl()?>/logout.php">
                    خروج
                </a>
            </li>
        </ul>
    </nav>
</header>