<?php
    global $page;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo get_page_title(); ?></title>
<!--    <link rel="shortcut icon" href="app/img/numer_dk_favicon.ico"/>-->

    <?php wp_head(); ?>
</head>
<body>

<?php
    Component::get_component('Header', null);
?>
