<header id="page-header">
    <div class="container" id="page-header-container">
        <div id="brand">
            <div id="brand-logo-container">
                <a href="">
                    <img src="<?php print_asset($logo)?>" alt="brand-logo" id="brand-image">
                </a>
            </div>
            <div id="brand-titles">
                <h1 id="brand-title">
                    <a href="<?php print_url();?>">
                        <?php echo $h1 ?>
                    </a>
                </h1>
                <h2 id="brand-describe">
                    <a href="<?php print_url();?>">
                        <?php echo $h2 ?>
                    </a>
                </h2>
            </div>
        </div>
        <?php if (!empty($categories)) : ?>
            <?php component("CategoryNav",['categories'=>$categories]);?>
        <?php endif; ?>
        <nav id="user-actions">
            <ul>
                <?php if (isLogout()): ?>
                    <li>
                        <a href="<?php echo url().'/login.php'?>">ورود</a>
                    </li>
                    <li>
                        <a href="<?php echo url() . '/register.php' ?>">ثبت نام</a>
                    </li>
                <?php else : ?>
                    <li id="user-link">
                        <a href="<?php echo dashboardUrl() ?>">
                            <?php $userThumbnail = $_SESSION['user']['thumbnail'] ?? $userDefaultThumbnail ; ?>
                            <img src="<?php echo asset($userThumbnail)?>" alt="">
                            <span>داشبورد</span>
                        </a>
                    </li>
                <?php endif;?>
            </ul>
        </nav>
    </div>
</header>