<nav id="category-nav">
    <ul>
        <?php foreach ($categories as $category) : ?>
            <li><a href="<?php echo url().'/category.php?slug='.$category['slug']?>"><?php echo $category['name']?></a></li>
        <?php endforeach;?>
    </ul>
</nav>
