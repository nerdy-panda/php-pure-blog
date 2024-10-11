<?php if (isset($_SESSION['success'])) :?>
    <?php foreach ($_SESSION['success'] as $message):?>
        <?php component("SuccessAlert",['message'=>$message]);?>
    <?php endforeach; ?>
<?php endif; ?>
