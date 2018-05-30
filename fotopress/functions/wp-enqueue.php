<?php
#-----------------------------------------------------------------#
#------------ FOTOPRESS : WP-ENQUEUE STYLES & SCRIPTS ------------#
#-----------------------------------------------------------------#

#-----------------------------------------------------------------#
# FRONT SCRIPT : REGISTER/ENQUEUE JS
#-----------------------------------------------------------------#

if( !function_exists('fotopress_front_enqueue_scripts') ){
    add_action('wp_enqueue_scripts', 'fotopress_front_enqueue_scripts');
	
	function fotopress_front_enqueue_scripts() 
	{	
		// Enqueue 
		wp_enqueue_script('hoverIntent');
		wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), '1.3', TRUE);
		wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.7.4', TRUE);
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );	
		}
	
		// Customizer Options
		$mob_menu_active  = get_theme_mod('mob_menu_active');
		$mob_menu_active  = (!empty($mob_menu_active)) ? esc_attr($mob_menu_active) : '1024';
		
		wp_enqueue_script('fotopress-customjs', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', TRUE);

		// Localize the script with Customizer data
		$translation_array = array(
			'activewidth' => $mob_menu_active
		);
		wp_localize_script( 'fotopress-customjs', 'fotopress_object', $translation_array );

		// Enqueued script with localized data.
		wp_enqueue_script( 'fotopress-customjs' );
	}
}

#-----------------------------------------------------------------#
# FRONT STYLES : REGISTER/ENQUEUE CSS
#-----------------------------------------------------------------#

if( !function_exists('fotopress_front_enqueue_styles') ){
	add_action('wp_enqueue_scripts', 'fotopress_front_enqueue_styles');
	
	function fotopress_front_enqueue_styles() {	
		// Enqueue 
		wp_enqueue_style('fotopress-google-varelafont','//fonts.googleapis.com/css?family=Varela+Round','', '1.0.0');
		wp_enqueue_style('font-awesome', get_template_directory_uri() . "/css/font-awesome.css", '', '4.2.0');
		wp_enqueue_style('fotopress-style', get_stylesheet_uri());
		wp_enqueue_style('bootstrap', get_template_directory_uri() . "/css/bootstrap.css", '', '3.3.5');
	}
}

#-----------------------------------------------------------------#
# APPEND REQUIRED INFO IN SITE HEAD SECTION
#-----------------------------------------------------------------#
function fotopress_head_info() 
{
	if(!is_admin()) 
	{
		include_once(get_template_directory().'/includes/fotopress-custom-css.php');
	}
}
add_action('wp_head', 'fotopress_head_info');
?>