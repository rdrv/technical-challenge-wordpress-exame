<!DOCTYPE html>
<html>
<head>
    <?php 
        $home = get_template_directory_uri();
        $homeUrl = home_url(); 
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php set_title() ?></title>
    <!-- estilos -->
    <link rel="stylesheet" href="<?= $home; ?>/style.css">
    <?php
        if($csss) {
            foreach ($csss as $css) {
    ?>
            <link rel="stylesheet" href="<?= $home; ?>/assets/css/<?= $css; ?>.css">
    <?php
            }
        }
    ?>
    <?php wp_head(); ?>
</head>
<body>

<header>
<a href="<?= $homeUrl ?>">Home</a>
<?php 

$args = array(
    'theme-location' => 'header-menu'
);

wp_nav_menu( $args );

?>
</header>