<!DOCTYPE html>
<html>
<head>
    <?php 
        $home = get_template_directory_uri();
        $homeUrl = home_url(); 
    ?>

    <!-- Required meta tags - Bootstrap CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title><?php set_title() ?></title>

    <!-- estilos -->
    <link rel="stylesheet" href="<?= $home; ?>/style.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/normalize.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/comum.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/header.css">
    <link rel="stylesheet" href="<?= $home; ?>/assets/css/footer.css">
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
<body class="container">

<header class="header">
    <a class="header_logo m-2" href="<?= $homeUrl ?>">
        <img class="img-fluid d-block mx-auto" src="<?= $home; ?>/assets/img/logo-nova-exame.svg" />
    </a>
    <nav class="header_nav p-3 navbar-light bg-light my-2">
        <?php wp_nav_menu( array('theme-location' => 'header-menu', 'menu_class' => 'header_nav__menu') ); ?>
    </nav>
</header>




