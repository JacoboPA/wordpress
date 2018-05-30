<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(); ?></title>

    <!-- Definir viewport para dispositivos web móviles -->
    <meta name=" viewport
    " content="width=device-width, minimum-scale=1">

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap/bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/mdb.css"/>


    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css"/>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr-2.8.3.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/bootstrap.js"></script>

    <?php wp_head(); ?>
</head>
<body>


<div class=" wrapper">

    <header class="jumbotron animated fadeInDown">

        <nav class="navbar" id="barra">
            <a class="navbar-brand" href="<?php bloginfo('url') ?>"><h1 id="titulo"><?php bloginfo('name') ?></h1></a>

            <?php /* Primary navigation */
            wp_nav_menu(array(
                    'menu' => 'top_menu',
					'theme_location'=> 'primary',
                    'depth' => 2,
                    'container' => false,
                    'menu_class' => 'nav navbar-nav navbar-right ',
                    //Process nav menu using our custom nav walker
                    'walker' => new wp_bootstrap_navwalker())
            );
            ?>
        </nav>
    </header>
    <div class="container">

