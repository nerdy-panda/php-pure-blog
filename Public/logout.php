<?php require_once dirname(__DIR__).'/Include/bootstrap.php'; ?>
<?php
    redirectToLoginWhenLogout();
    logout();
    redirectToHomeAndExit();
?>
