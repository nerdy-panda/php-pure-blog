<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags start -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='keywords' content='your, tags'>
    <meta name='description' content='150 words'>
    <meta name='subject' content='your website'>
    <meta name='copyright' content='company name'>
    <meta name='language' content='ES'>
    <meta name='robots' content='index,follow'>
    <meta name='author' content='name, email@hotmail.com'>
    <meta name='designer' content=''>
    <meta name='reply-to' content='email@hotmail.com'>
    <meta name='owner' content=''>
    <meta name='revisit-after' content='7 days'>
    <!-- meta tags start -->
    <title><?php echo $title ?></title>
    <!-- styles -->
    <?php print_favicon($favicon);?>
    <?php insert_place($places,'styles'); ?>
    <!-- styles -->

    <!-- javaScript -->
    <?php insert_place($places,'headerScripts'); ?>
    <!-- javaScript -->
</head>
<body>