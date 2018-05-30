<?php
/**
 * Fotopress Customizer functionality
 *
 * @subpackage Fotopress
 * @since Fotopress 1.0
 */

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Fotopress 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function fotopress_customizer_script() {
	wp_enqueue_script('fotopress-customizer-script', get_template_directory_uri() .'/includes/js/customizer-scripts.js', array("jquery","jquery-ui-draggable"),'', true  );
	wp_enqueue_style('fotopress-customizer-style', get_template_directory_uri() .'/includes/css/customizer-style.css');	
	wp_enqueue_style('font-awesome', get_template_directory_uri() . "/css/font-awesome.css", '', '4.7.0');
}
add_action('customize_controls_enqueue_scripts', 'fotopress_customizer_script');

function fotopress_customize_register( $wp_customize ) 
{
	$image_dirpath = get_template_directory_uri() . '/images/';

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
	//-----------------------------------------------------------------
	// FOTOPRESS : CUSTOMIZER PANELS ----------------------------------
	//-----------------------------------------------------------------

	$wp_customize->add_panel( 'general_options', array(
		'title' 	=> __( 'General Options','fotopress'),
		'priority' 	=> 11,
	));
	
	$wp_customize->add_panel( 'home_temp_options', array(
		'title' 	=> __( 'Home Template Options','fotopress'),
		'priority' 	=> 11,
	));
		

	//-----------------------------------------------------------------
	// FOTOPRESS : COLOR SCHEME SECTION ---------------------------------
	//-----------------------------------------------------------------
	
	// Create "Color Scheme" section in customizer 
	$wp_customize->add_section(
		'fotopress_color_scheme_section',
		array(
			'title'       => __('Color Setting','fotopress'),
			'description' => __('Please choose color setting for your site.','fotopress'),
			'panel' 	  => 'general_options',
		)
	);
	
	// Set "Color Scheme" option color default value
	$wp_customize->add_setting(
		'color_scheme',
		array(
			'default' => '#156e8e',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	// Add "Color Scheme" color picker Control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,'color_scheme',
			array(
				'label'    => __('Site Color Scheme','fotopress'),
				'section'  => 'fotopress_color_scheme_section',
			)
		)
	);
	
	//-----------------------------------------------------------------
	// FOTOPRESS : HEADER SETTINGS SECTION ----------------------------
	//-----------------------------------------------------------------
	
	// Create "HEDAER SETTINGS" section in customizer 
	$wp_customize->add_section(
		'fotopress_header_section',
		array(
			'title'       => __('Header Settings','fotopress'),
			'panel' 	  => 'general_options',
		)
	);
	
	// Mobile Menu Activation Width
	$wp_customize->add_setting( 
		'mob_menu_active', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'mob_menu_active', 
		array(
			'label'       => __('Mobile Menu Activate Width','fotopress'),
			'description' => __('Layout width (without unit) after which mobile menu will get activated (default : 1024)','fotopress'),
			'section'     => 'fotopress_header_section',
		)
	);
	
	//-----------------------------------------------------------------
	// FOTOPRESS : FOOTER SECTION -------------------------------------
	//-----------------------------------------------------------------
	
	// Create "Footer" section in customizer 
	$wp_customize->add_section(
		'fotopress_footer_section',
		array(
			'title'       => __('Footer Settings','fotopress'),
			'description' => __('Add information about footer copyright.','fotopress'),
			'panel' 	  => 'general_options',
		)
	);
	
	// Footer Copyright
	$wp_customize->add_setting( 
		'fotopress_copyright', 
		array(
			'default'        => '',
			'sanitize_callback' => 'fotopress_sanitize_textarea',
		)
	);
	
	$wp_customize->add_control( 
		'fotopress_copyright', 
		array(
			'label'       => __('Footer Copyright Text','fotopress'),
			'type'        => 'textarea',
			'section'     => 'fotopress_footer_section',
		)
	);	
	
	//-----------------------------------------------------------------
	// FOTOPRESS : HEADER IMAGE CONTENT SECTION -----------------------
	//-----------------------------------------------------------------
	
	// Create "Home Image Content" section in customizer 
	$wp_customize->add_section(
		'fotopress_header_image_content_section',
		array(
			'title'       => __('Header Image Content','fotopress'),
			'description' => __('Please add content for home header image section.','fotopress'),
			'panel' 	  => 'home_temp_options'
		)
	);
	
	// Header Banner (Enable/Disable)
	$wp_customize->add_setting( 
		'banner_display', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'fotopress_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'banner_display', 
		array(
			'label'       => __('Header Image Banner (On/Off)','fotopress'),
			'description' => __('Enable/disable header image banner.','fotopress'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'fotopress' ),
				'off'=> __('Off', 'fotopress' ),
			),
			'section'     => 'fotopress_header_image_content_section'
		)
	);

	// Banner Title
	$wp_customize->add_setting( 
		'banner_title', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'banner_title', 
		array(
			'label'       => __('Header Image Title','fotopress'),
			'section'     => 'fotopress_header_image_content_section',
		)
	);
	
	// Banner Second Title
	$wp_customize->add_setting( 
		'banner_stitle', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'banner_stitle', 
		array(
			'label'       => __('Header Image Second Title','fotopress'),
			'section'     => 'fotopress_header_image_content_section',
		)
	);
	
	// Banner Description
	$wp_customize->add_setting( 
		'banner_description', 
		array(
			'default'        => '',
			'sanitize_callback' => 'fotopress_sanitize_textarea',
		)
	);
	
	$wp_customize->add_control( 
		'banner_description', 
		array(
			'label'       => __('Header Image Description','fotopress'),
			'type'        => 'textarea',
			'section'     => 'fotopress_header_image_content_section',
		)
	);	
	
	// Learn More URL
	$wp_customize->add_setting( 
		'banner_more_url', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control( 
		'banner_more_url', 
		array(
			'label'       => __('Learn More Button URL','fotopress'),
			'section'     => 'fotopress_header_image_content_section',
		)
	);	
	
	//-----------------------------------------------------------------
	// FOTOPRESS : HOME SERVICES CONTENT SECTION ------------------------
	//-----------------------------------------------------------------
	
	// Create "Home Services" section in customizer 
	$wp_customize->add_section(
		'fotopress_home_services_section',
		array(
			'title'       => __('Home Services Section','fotopress'),
			'description' => __('Please add content for home service items.','fotopress'),
			'panel' 	  => 'home_temp_options'
		)
	);
	
	// Services Section (Enable/Disable)
	$wp_customize->add_setting( 
		'services_display', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'fotopress_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'services_display', 
		array(
			'label'       => __('Services Section (On/Off)','fotopress'),
			'description' => __('Enable/disable services section.','fotopress'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'fotopress' ),
				'off'=> __('Off', 'fotopress' ),
			),
			'section'     => 'fotopress_home_services_section'
		)
	);

	// Section Title
	$wp_customize->add_setting( 
		'home_service_title', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_service_title', 
		array(
			'label'       => __('Services Section Title','fotopress'),
			'section'     => 'fotopress_home_services_section',
		)
	);
	
	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting(
		'featured_page_icon'.$count,
			array(
				'default'			=> fotopress_featured_icon_defaults($count),
				'transport'         => 'postMessage',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control(
			new Fotopress_Icon_Choices(
			$wp_customize,
			'featured_page_icon'.$count,
				array(
					'settings'		=> 'featured_page_icon'.$count,
					'section'		=> 'fotopress_home_services_section',
					'type'			=> 'select',
					'label'			=> sprintf( __('Select Service Icon %d ', 'fotopress'), $count ),
				)
			)
		);

		$wp_customize->add_setting( 'service-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'service-page-' . $count, array(
			'label'    => sprintf( __('Select Service Page %d ', 'fotopress'), $count ),
			'section'  => 'fotopress_home_services_section',
			'type'     => 'dropdown-pages'
		) );
	}
	
	//-----------------------------------------------------------------
	// FOTOPRESS : HOME DESIGN SECTION --------------------------------
	//-----------------------------------------------------------------
	
	// Create "Home Design" section in customizer 
	$wp_customize->add_section(
		'fotopress_home_design_section',
		array(
			'title'       => __('Home Design Section','fotopress'),
			'panel' 	  => 'home_temp_options'
		)
	);
	
	// Design Section (Enable/Disable)
	$wp_customize->add_setting( 
		'design_display', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'fotopress_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'design_display', 
		array(
			'label'       => __('Design Section (On/Off)','fotopress'),
			'description' => __('Enable/disable Design section.','fotopress'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'fotopress' ),
				'off'=> __('Off', 'fotopress' ),
			),
			'section'     => 'fotopress_home_design_section'
		)
	);
	
	// Design Section
	$wp_customize->add_setting( 'desing-page', array(
		'default'           => '',
		'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( 'desing-page', array(
		'label'    => __( 'Select Desing Page', 'fotopress' ),
		'section'  => 'fotopress_home_design_section',
		'type'     => 'dropdown-pages'
	) ); 
	
	// Add button label
	$wp_customize->add_setting( 
		'home_design_btnlbl', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_design_btnlbl', 
		array(
			'label'       => __('Button Label','fotopress'),
			'section'     => 'fotopress_home_design_section',
		)
	);
	
	// Add button URL
	$wp_customize->add_setting( 
		'home_design_btnurl', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_design_btnurl', 
		array(
			'label'       => __('Button URL','fotopress'),
			'section'     => 'fotopress_home_design_section',
		)
	);
	

	//-----------------------------------------------------------------
	// FOTOPRESS : HOME PROJECTS SECTION ------------------------------
	//-----------------------------------------------------------------
	
	// Create "Home Projects" section in customizer 
	$wp_customize->add_section(
		'fotopress_home_projects_section',
		array(
			'title'       => __('Home Projects Section','fotopress'),
			'panel' 	  => 'home_temp_options'
		)
	);
	
	// Projects Section (Enable/Disable)
	$wp_customize->add_setting( 
		'projects_display', 
		array(
			'default'        => 'on',
			'sanitize_callback' => 'fotopress_sanitize_on_off',
		)
	);
	$wp_customize->add_control(
		'projects_display', 
		array(
			'label'       => __('Projects Section (On/Off)','fotopress'),
			'description' => __('Enable/disable projects section.','fotopress'),
			'type'        => 'select',
			'choices'     => array(
				'on' => __('On', 'fotopress' ),
				'off'=> __('Off', 'fotopress' ),
			),
			'section'     => 'fotopress_home_projects_section'
		)
	);

	// Projects Section Title
	$wp_customize->add_setting( 
		'home_project_title', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_project_title', 
		array(
			'label'       => __('Projects Section Title','fotopress'),
			'section'     => 'fotopress_home_projects_section',
		)
	);
		
	for ( $count = 1; $count <= 3; $count++ ) 
	{
		$wp_customize->add_setting( 'project-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'project-page-' . $count, array(
			'label'    => sprintf( __('Select Project Page %d ', 'fotopress'), $count ),
			'section'  => 'fotopress_home_projects_section',
			'type'     => 'dropdown-pages'
		) );
		
	}
	
	// Add button label
	$wp_customize->add_setting( 
		'home_project_btnlbl', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_project_btnlbl', 
		array(
			'label'       => __('Button Label','fotopress'),
			'section'     => 'fotopress_home_projects_section',
		)
	);
	
	// Add button URL
	$wp_customize->add_setting( 
		'home_project_btnurl', 
		array(
			'default'        => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'home_project_btnurl', 
		array(
			'label'       => __('Button URL','fotopress'),
			'section'     => 'fotopress_home_projects_section',
		)
	);
}
add_action( 'customize_register', 'fotopress_customize_register', 11 );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Fotopress 1.0
 */
function fotopress_customize_preview_js() {
	wp_enqueue_script('fotopress_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '1.0.0', true );
}
add_action('customize_preview_init', 'fotopress_customize_preview_js');
 
// Santize a Textarea Field
function fotopress_sanitize_textarea( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

// Sanitize On-Off Field
function fotopress_sanitize_on_off( $input ) {
	if ( $input == 'on' ) {
        return 'on';
    } else {
        return 'off';
    }
}

if( class_exists('WP_Customize_Control') ):	
class Fotopress_Icon_Choices extends WP_Customize_Control{
	public $type = 'icon';
	public function render_content(){
	?>
	<label>
		<?php if ( !empty( $this->label ) ){ ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php } // add label if needed. ?>

		<div class="selected-icon">
			<i class="<?php echo esc_attr($this->value()); ?>"></i>
			<span><i class="fa fa-angle-down"></i></span>
		</div>

		<ul class="icon-list clearfix">
			<?php
			$fontawesome_array = fotopress_fontawesome_array();
			foreach ($fontawesome_array as $fontawesome_array_single) {
					$icon_class = $this->value() == $fontawesome_array_single ? 'icon-active' : '';
						if ($fontawesome_array_single == 'not-a-real-icon') {
							$zero_icon = 'NONE';
						} else {
							$zero_icon = $fontawesome_array_single;
						}
					echo '<li class='.esc_html($icon_class).'><i class="fa fa-'.esc_html($fontawesome_array_single).'"></i>'.esc_html($zero_icon).'</li>';
				}
			?>
		</ul>
		<input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
	</label>
	<?php
	}
}
endif;