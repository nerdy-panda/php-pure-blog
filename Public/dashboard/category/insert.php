<?php require_once dirname(__DIR__,3).'/Include/dashboardBootstrap.php' ; ?>
<?php $databaseConnection = mysqlConnector();?>
<?php
    $userId = $_SESSION['user']['id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $icon = $_POST['icon'];
    if (isEmptyString($slug))
        $slug = $name ;
    $slug = slugify($slug);

    try {
        $add = addCategory($databaseConnection, $name , $slug , $userId , $icon );
        if (!$add)
            throw new Exception("fail to add category !!!");
        $message = " دسته بندی با نام $name  با موفقیت در دیتابیس ثبت شد !!! ";
        session_push_success($message);
        redirectToDashboardCategoryAndExit();
    }catch (Throwable $exception){
        $message = " ایجاد دسته بندی $name ناموفق بود !!! ";
        session_push_inputs_array($_POST);
        session_push_error($message);
        redirectToBackAndExit();
    }
?>
