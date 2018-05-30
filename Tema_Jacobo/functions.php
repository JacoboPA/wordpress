<?php
/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
if ( ! function_exists( 'wpt_setup' ) ):
    function wpt_setup() {
        register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );

    } endif;




function register_my_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Header Menu' ),
            'second' => __( 'Extra Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );


//  Main Sidebar
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'before_widget' => '<hr>',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));




//Habilitar thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, 150, true);



// Permitir comentarios encadenados
function enable_threaded_comments()
{
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('get_header', 'enable_threaded_comments');





 function wpt_register_js()
{
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');
}

add_action('init', 'wpt_register_js');
function wpt_register_css()
{
    wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap.min');
    wp_register_style('mdb.css', get_template_directory_uri() . '/css/mdb.css');
    wp_enqueue_style('mdb');
}

add_action('wp_enqueue_scripts', 'wpt_register_css');

 // Register custom navigation walker
require_once('class-wp-bootstrap-navwalker.php');

