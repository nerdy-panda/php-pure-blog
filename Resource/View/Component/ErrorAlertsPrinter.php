<?php if (isset($_SESSION['errors'])) : ?>
    <?php foreach ($_SESSION['errors'] as $message ) : ?>
        <?php component("ErrorAlert",['message'=>$message]);?>
    <?php endforeach;?>
<?php endif; ?>
