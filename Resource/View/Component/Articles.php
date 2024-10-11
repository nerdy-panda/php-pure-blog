<section id="articles">
    <div class="container" id="articles-container">
        <?php foreach ($articles as $article): ?>
            <?php component("Article",[...$article,'articleDefaultThumbnail'=>$articleDefaultThumbnail , 'userDefaultThumbnail'=> $userDefaultThumbnail]);?>
        <?php endforeach;?>
    </div>
</section>