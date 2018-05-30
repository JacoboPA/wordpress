<?php
/**
 * Template Name: Home Page Template
 *
 * @subpackage Fotopress
 * @since Fotopress 1.0
 */
get_header(); 
$image_dirpath = get_template_directory_uri() . '/images/'; 

// Theme Customizer "Home Template Options > Home Services" options
$services_display    = get_theme_mod('services_display');
$home_service_title  = get_theme_mod('home_service_title');

// Theme Customizer "Home Template Options > Home Desing" options
$design_display      = get_theme_mod('design_display');
$home_design_btnlbl  = get_theme_mod('home_design_btnlbl');	
$home_design_btnurl  = get_theme_mod('home_design_btnurl');	

// Theme Customizer "Home Template Options > Home Projects" options
$projects_display    = get_theme_mod('projects_display');
$home_project_title  = get_theme_mod('home_project_title');
$home_project_btnlbl = get_theme_mod('home_project_btnlbl');
$home_project_btnurl = get_theme_mod('home_project_btnurl');
?>

<!-- home page editor start-->
<?php 
while ( have_posts() ) : the_post();
?>
<div id="home-content">
	<div class="container">
		<div class="row">
			<!-- page content start -->
			<div class="content col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
				<div class="page-title"> <?php the_title(); ?></div>
				<div class="dots">&bull;</div>
				<div class="page-content"><?php echo the_content(); ?></div>
			</div><!-- #content -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #container -->	
<!-- home page editor end-->
<?php
endwhile; 
?>

<!-- home page service section start-->	
<?php if(!empty($services_display) && $services_display == 'on'){ ?>
	<div id="services" class="services section-padding text-center">
		<div class="container">
			<?php if(!empty($home_service_title)){ ?>
				<div class="row">
					<div class="col-lg-12">
						<h3 class="section-title"><?php echo esc_attr($home_service_title); ?></h3>
						<div class="dots">&bull;</div>
					</div>
				</div>
			<?php } ?>
			
			<div class="row services-wrapper">
				<?php
					$service_pages = array();
					
					for( $service_count = 1; $service_count <= 3; $service_count++ ) {
						 $mod = get_theme_mod( 'service-page-' . $service_count );
						if ( 'page-none-selected' != $mod ) {
							$service_pages[] = $mod;
						}
					}
					
						$service_args = array(
							'post_type' => 'page',
							'post__in' => $service_pages,
							'orderby' => 'post__in',
							'posts_per_page' => 3
						);
						
						$service_query = new WP_Query( $service_args );
				
						$service_count = 1;
						
					if ( $service_query->have_posts() ) {	
						while ( $service_query->have_posts() ) : $service_query->the_post();
						// fetch font icon
						$font_icon = get_theme_mod( 'featured_page_icon' . $service_count );
						?>
						<div class="col-md-4 service-item featured-post<?php echo $service_count; ?>">
							<?php if($font_icon != 'fa fa-not-a-real-icon'){ ?><a href="<?php the_permalink(); ?>"><span class="ficon"><i class="<?php echo $font_icon ; ?>"></i></span></a><?php } ?>									
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<div class="service-text"><?php the_excerpt(); ?></div>
						</div>
						<?php
						$service_count++;
						endwhile;
						wp_reset_postdata();
						
					} else {
						if ( current_user_can( 'customize' ) ) { ?>
							<div class="message">
								<p><?php _e( 'There are no services available to display.', 'fotopress' ); ?></p>
								<p><?php printf(
									__( 'These services can be set in the <a href="%s">customizer</a>.', 'fotopress' ),
									esc_url(admin_url( 'customize.php?autofocus[section]=fotopress_home_services_section' ))
								); ?>
								</p>
							</div>
						<?php 
						}
					}
				?>
			</div><!-- .row.services-wrapper ends -->
		</div><!-- .contianer -->
	</div><!-- .services -->
<?php } ?>
<!-- home page service section end-->		
	
<!-- home page design section start-->
<?php if(!empty($design_display) && $design_display == 'on'){ ?>
	<div id="design">
		<?php 
		$desing_page = array();
		$mod = get_theme_mod( 'desing-page');
		if ( 'page-none-selected' != $mod ) {
			$desing_page[] = $mod;
		}
			
		$desing_args = array(
			'post_type' => 'page',
			'post__in' => $desing_page,
			'orderby' => 'post__in'
		);
		$desing_query = new WP_Query( $desing_args );
		
		if ( $desing_query->have_posts() ) {	
			while ( $desing_query->have_posts() ) : $desing_query->the_post();
			?>
			<?php if ( has_post_thumbnail() ) { // check if the page has a featured image assigned to it. ?>
				<div class="design-img col-md-6 col-sm-6 col-xs-12">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('fotopress_large_thumbnail'); ?>
					</a>
				</div>
			<?php } ?>
			<div class="container">
				<div class="row">
					<div class="design-desc col-md-5 col-md-offset-1 col-sm-6 col-xs-12">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="design-text"><?php the_excerpt(); ?></div>
						<?php if(!empty($home_design_btnurl) && !empty($home_design_btnlbl)){ ?><a href="<?php echo esc_url($home_design_btnurl); ?>" class="btn"><?php echo esc_attr($home_design_btnlbl); ?></a><?php } ?>
					</div>
				</div>
			</div>	
			<?php
			endwhile;
			wp_reset_postdata();
		} 
		else 
		{
			if ( current_user_can( 'customize' ) ) { ?>
				<div class="message text-center">
					<p><?php _e( 'There are no design section available to display.', 'fotopress' ); ?></p>
					<p><?php printf(
						__( 'This design section can be set in the <a href="%s">customizer</a>.', 'fotopress' ),
						admin_url( 'customize.php?autofocus[section]=fotopress_home_design_section' )
					); ?>
					</p>
				</div>
			<?php 
			}
		}
	?>	
	</div>
<?php } ?>	
<!-- home page design section end-->
	
<!-- home page project section start-->	
<?php if(!empty($projects_display) && $projects_display == 'on'){ ?>
	<div id="projects" class="projects section-padding text-center">
		<div class="container">
			<?php if(!empty($home_project_title)){ ?>
				<div class="row">
					<div class="col-lg-12">
						<h3 class="section-title"><?php echo esc_attr($home_project_title); ?></h3>
						<div class="dots">&bull;</div>
					</div>
				</div>
			<?php } ?>
			
			<div class="row">
				<?php
					$project_pages = array();
					
					for ( $project_count = 1; $project_count <= 3; $project_count++ ) {
						 $mod = get_theme_mod( 'project-page-' . $project_count );
						if ( 'page-none-selected' != $mod ) {
							$project_pages[] = $mod;
						}
					}
									
					$project_args = array(
						'post_type' => 'page',
						'post__in' => $project_pages,
						'orderby' => 'post__in',
						'posts_per_page' => 3
					);
										
					$project_query = new WP_Query( $project_args );
					
					if ( $project_query->have_posts() ) {
						$project_count = 1;
						while ( $project_query->have_posts() ) : $project_query->the_post();
						?>
						<div class="col-md-4 project-item">
							<?php if ( has_post_thumbnail() ) { // check if the page has a featured image assigned to it. ?>
								<a href="<?php the_permalink(); ?>" class="project-image">
									<?php
										the_post_thumbnail('fotopress_medium_thumbnail');
									?>
								</a>
							<?php } ?>
							<div class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							<div class="project-desc"><?php the_excerpt(); ?></div>
						</div>
						<?php
						$project_count++;
						endwhile;
						wp_reset_postdata();
					} 
					else 
					{ 
						if ( current_user_can( 'customize' ) ) { ?>
							<div class="message">
								<p><?php _e( 'There are no project available to display.', 'fotopress' ); ?></p>
								<p><?php printf(
									__( 'These project can be set in the <a href="%s">customizer</a>.', 'fotopress' ),
									admin_url( 'customize.php?autofocus[section]=fotopress_home_project_section' )
								); ?>
								</p>
							</div>
						<?php 
						}
					}
				?>
			</div><!-- .row.services-wrapper ends -->
			<?php if(!empty($home_project_btnurl) && !empty($home_project_btnlbl)){ ?>
				<div class="row"><a href="<?php echo esc_url($home_project_btnurl); ?>" class="btn"><?php echo esc_attr($home_project_btnlbl); ?></a></div>
			<?php } ?>
		</div><!-- .contianer -->
	</div><!-- .projects section ends -->
<?php } ?>
<!-- home page project section end-->	
	
<?php get_footer(); ?>