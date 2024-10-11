<?php
    $hasPrev = $current > 1 ;
    $hasNext = $current < $count ;
?>
<div id="paginations">
    <div id="paginations-container" class="container">
        <ul>
            <li id="prev-pagination">
                <?php if($hasPrev): ?>
                    <a href="?<?php echo $pageKey."=".($current-1)?>"><i class="fa-solid fa-angles-left"></i></a>
                <?php else: ?>
                    <a><i class="fa-solid fa-angles-left"></i></a>
                <?php endif; ?>
            </li>
            <?php for($counter = 1 ; $counter<=$count;$counter++) : ?>
                <?php $isActive = $current === $counter ; ?>
                <li>
                    <?php if ($isActive) : ?>
                        <a href="?<?php echo $pageKey.'='.$counter?>" class="active"><?php echo $counter?></a>
                    <?php else : ?>
                        <a href="?<?php echo $pageKey.'='.$counter?>"><?php echo $counter?></a>
                    <?php endif;?>

                </li>
            <?php endfor; ?>

            <?php if ($hasNext) : ?>
                <li id="next-pagination">
                    <a href="?<?php echo $pageKey.'='.($current+1)?>"><i class="fa-solid fa-angles-right"></i></a>
                </li>
            <?php else : ?>
                <li id="next-pagination">
                    <a><i class="fa-solid fa-angles-right"></i></a>
                </li>
            <?php endif; ?>

        </ul>
    </div>
</div>