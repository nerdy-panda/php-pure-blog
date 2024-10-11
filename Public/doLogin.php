<?php require_once dirname(__DIR__).'/Include/bootstrap.php'; ?>
<?php redirectToDashboardWhenLogin(); ?>
<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['rememberMe']);
?>
<?php
    $databaseConnection = mysqlConnector();
    $user = user_findUserByUsername($databaseConnection,$username,['id','name','thumbnail','password']);
    if (is_null($user))
        failAuthenticationAndExit($username,$password,$remember);
    $checkPassword = password_verify($password,$user['password']);
    if (!$checkPassword)
        failAuthenticationAndExit($username , $password , $remember);
    $_SESSION['user']['id'] = $user['id'];
    $_SESSION['user']['name'] = $user['name'];
    $_SESSION['user']['thumbnail'] = $user['thumbnail'];
    redirectToDashboard();
