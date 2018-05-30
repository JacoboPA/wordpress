<?php
/**
 * Fotopress functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
#-----------------------------------------------------------------#
# INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
#-----------------------------------------------------------------#
include_once(get_template_directory() . '/functions/init.php');
include_once(get_template_directory() . '/includes/customizer.php');

#-----------------------------------------------------------------#
# REGISTER SIDEBARS
#-----------------------------------------------------------------#
function fotopress_register_sidebar() 
{
	register_sidebar(array(
		'name'          => __( 'Blog Sidebar', 'fotopress' ),
		'id'            => 'blog-sidebar',
		'description'   => __( 'Add widgets here to appear in your blog sidebar.', 'fotopress' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => __( 'Page Sidebar', 'fotopress' ),
		'id'            => 'page-sidebar',
		'description'   => __( 'Add widgets here to appear in your page sidebar.', 'fotopress' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	register_sidebar(array(
		'name'          => 'Footer Sidebar',
		'id'            => 'footer-sidebar',
		'description'   => __( 'Add widgets here to appear in footer sidebar.', 'fotopress' ),
		'before_widget' => '<li id="%1$s" class="col-md-3 col-sm-6 col-xs-12 widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));	
}
add_action( 'widgets_init', 'fotopress_register_sidebar' );


#-----------------------------------------------------------------#
# THEME CONFIGURATION
#-----------------------------------------------------------------#
function fotopress_theme_config() {
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	
	// Load text domain
	load_theme_textdomain('fotopress');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	
	// Setup the WordPress custom logo feature.
	add_theme_support( 'custom-logo', array(
	   'width'       => 170,
	   'height'      => 40,
	   'flex-width' => true,
	));
	
	// Setup the WordPress core custom header feature.
	add_theme_support( 'custom-header' );
	
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'fotopress_large_thumbnail',794,528,true );  // fotopress_large_thumbnail size
	add_image_size( 'fotopress_medium_thumbnail',360,222,true ); // fotopress_medium_thumbnail size
	
	// this theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'fotopress' ),
	));
}
add_action( 'after_setup_theme', 'fotopress_theme_config' ); 

#-----------------------------------------------------------------#
# FROM HERE YOU CAN ADD YOUR OWN FUNCTIONS
#-----------------------------------------------------------------#