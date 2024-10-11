<aside id="page-aside">
    <div id="brand">
        <a href="">
            <img src="<?php echo asset("img/logo-admin.png")?>" alt="">
        </a>
    </div>
    <nav id="aside-nav">
        <ul>
            <li>
                <a href="<?php echo dashboardUrl()?>">
                    <i class="fa-solid fa-gauge-high"></i>
                    داشبورد
                </a>
            </li>
            <li class="sub-menu">
                <a href="">
                    <i class="fa-solid fa-newspaper"></i>
                    مقاله ها
                </a>
                <ul>
                    <li>
                        <a href="<?php echo dashboardArticleUrl()?>">
                            <i class="fa-solid fa-list-squares"></i>
                            لیست
                        </a>
                        <a href="<?php echo dashboardArticleCreateUrl()?>">
                            <i class="fa-solid fa-plus"></i>
                            ایجاد
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="">
                    <i class="fa-solid fa-shapes"></i>
                    دسته بندی ها
                </a>
                <ul>
                    <li>
                        <a href="<?php echo dashboardUrl()?>/category">
                            <i class="fa-solid fa-list"></i>
                            لیست
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo dashboardUrl()?>/category/create.php">
                            <i class="fa-solid fa-plus"></i>
                            افزودن
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="">
                    <i class="fa-solid fa-tags"></i>
                    تگ ها
                </a>
                <ul>
                    <li>
                        <a href="<?php echo dashboardTagUrl()?>">
                            <i class="fa-solid fa-list-dots"></i>
                            لیست
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo dashboardTagCreateUrl()?>">
                            <i class="fa-solid fa-plus"></i>
                            افزودن
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</aside>