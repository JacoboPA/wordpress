<?php
/**
 * The Header for our theme
 *
 * @subpackage Fotopress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

	<?php
	// header custom logo 
	$custom_logo_id     = get_theme_mod( 'custom_logo' );
	$custom_logo_src    = wp_get_attachment_image_src( $custom_logo_id , 'full' );
      
	// header image/banner content
	$banner_display     = get_theme_mod('banner_display');
	$banner_title       = get_theme_mod('banner_title');
	$banner_stitle      = get_theme_mod('banner_stitle');
	$banner_description = get_theme_mod('banner_description');
	$banner_more_url    = get_theme_mod('banner_more_url');
	?>
	<!-- #Header Section Starts -->
	<header id="header">
		<!-- .header-wrapper -->
		<div class="header-wrapper">
			<div class="header-nav">
				<div class="container">
					<div class="row">
						<!-- #logo -->
						<div id="logo" class="col-md-3 col-sm-4 col-xs-10">
							<div id="site-title">
								<?php
									if($custom_logo_src[0]){ 
										?><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" ><img class="logo custom-logo" src="<?php echo esc_url($custom_logo_src[0]); ?>" alt="<?php bloginfo('name'); ?>" /></a><?php 
									} 
									else{ 
									?>
									<!-- #site-description -->
									<div id="site-title" class="site-title">
										<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name') ?>" ><?php bloginfo('name'); ?></a> 
										<div id="site-description" class="site-description"><?php bloginfo( 'description' ); ?></div>
									</div>
									<?php 
									} 
								?>
							</div>
						</div>
						<!-- #logo -->
						
						<!-- #main-navigation-->
						<?php 
							if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'Header' ) ) {
								wp_nav_menu(array( 'container_class' => 'main-navigation col-md-9 col-sm-8 col-xs-2', 'container_id' => 'main-navigation', 'menu_id' => 'main-nav','menu_class' => 'menu clearfix','theme_location' => 'Header' )); 
							} else {
							?>
							<nav id="main-navigation" class="main-navigation col-md-9 col-sm-8 col-xs-2">
								<ul id="main-nav" class="menu clearfix">
									<?php wp_list_pages('title_li=&depth=0'); ?>
								</ul>
							</nav>
							<?php 
							}
						?>
						<!-- #main-navigation -->
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .header-wrapper -->
		</div><!-- .header-wrapper -->
		
		<!-- .header-banner for "template-home-page.php" -->
		<?php if(is_page() || is_single()){ ?>
			<?php if(is_page_template( 'page-templates/template-home-page.php' ) && $banner_display == 'on'){ ?>
				<div class="header-banner">
					<div class="section-overlay"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="hero-content text-center">
									<?php if(!empty($banner_title) || !empty($banner_stitle)){ ?><h1><?php echo esc_attr($banner_title); ?><span><?php echo esc_attr($banner_stitle); ?></span></h1><?php } ?>
									<?php if(!empty($banner_description)){ ?><div class="intro"><?php echo wpautop(esc_attr($banner_description)); ?></div><?php } ?>
									<?php if(!empty($banner_more_url)){ ?><a href="<?php echo esc_url($banner_more_url); ?>" class="btn"><?php _e('Learn more','fotopress'); ?></a><?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } else { ?>
				<div class="header-banner">
					<div class="inner-banner">
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php
										// Start the Loop.
										while ( have_posts() ) : the_post(); 
											// Include the page content template.
										?>
										<div class="page-title"> <?php echo get_the_title(); ?></div>
										<?php
										endwhile;
									?>
								</div>
								<div class="bread-section col-md-6 col-sm-6 col-xs-12">
									<a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php _e('Home','fotopress');?></a>
									<span class="breadcrumbs-separator"> / </span>
									<span><?php echo get_the_title(); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php }
		} else {?>
			<div class="header-banner">
				<div class="inner-banner">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<?php
									if ( is_category() ) {
										?>	
										<div class="page-title"><?php printf( __('Category Archives : %s', 'fotopress' ),single_cat_title( '', false )); ?></div> <?php
									}else
									if ( is_tag() ) {
									?>	
									<div class="page-title"><?php printf( __( 'Tag Archives : %s', 'fotopress' ), single_tag_title( '', false )); ?></div> <?php
									}else
									if ( is_author() ) {
										?>
										<div class="page-title"><?php printf( __( 'Author Archives : %s', 'fotopress' ),get_the_author());?></div> <?php
									}else if ( is_archive() ) {
									?>	
										<div class="page-title"> <?php
										if ( is_day() ) :
											printf( __( 'Daily Archives : %s', 'fotopress' ),get_the_date() );
										elseif ( is_month() ) :
											printf( __( 'Monthly Archives : %s', 'fotopress' ),get_the_date( _x( 'F Y', 'monthly archives date format', 'fotopress' ) ));
										elseif ( is_year() ) :
											printf( __( 'Yearly Archives : %s', 'fotopress' ), get_the_date( _x( 'Y', 'yearly archives date format', 'fotopress' ) ) );
										else :
											_e( 'Archives', 'fotopress' );
										endif;
									?>
									</div> 
									<?php	 
									}
									else if ( is_search() ) {
									?>
										<div class="page-title"><?php printf( __( 'Search Results for : %s', 'fotopress' ), get_search_query()); ?></div> <?php
									}else if ( is_404() ) {
									?>
										<div class="page-title"><?php _e('Error 404!','fotopress'); ?></div> <?php
									}else{ ?>
										<div class="page-title"><?php _e('BLOG','fotopress'); ?></div> <?php
									}
								?>
							</div>
							<div class="bread-section col-md-6 col-sm-6 col-xs-12">
								<?php
									if ( is_category() ) {
										?>	
										<a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php _e('Home','fotopress');?></a>
										<span class="breadcrumbs-separator"> / </span>
										<span><?php single_cat_title( __( ' ', 'fotopress' ) ); ?></span> <?php
									}else
									if ( is_tag() ) {
									?>	
									<a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php _e('Home','fotopress');?></a>
									<span class="breadcrumbs-separator"> / </span>
									<span><?php single_tag_title( __( ' ', 'fotopress' ) ); ?></span> <?php
									}else
									if ( is_author() ) {
										?><a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php _e('Home','fotopress');?></a>
										<span class="breadcrumbs-separator"> / </span>
										<span><?php printf( __( ' %s', 'fotopress' ),get_the_author());?></span> <?php
									}else if ( is_archive() ) {
									?>	
										<a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php _e('Home','fotopress');?></a>
										<span class="breadcrumbs-separator"> / </span>
										<span> <?php
										if ( is_day() ) :
											printf( __( ' %s', 'fotopress' ),get_the_date() );
										elseif ( is_month() ) :
											printf( __( ' %s', 'fotopress' ),get_the_date( _x( 'F Y', 'monthly archives date format', 'fotopress' ) ));
										elseif ( is_year() ) :
											printf( __( ' %s', 'fotopress' ), get_the_date( _x( 'Y', 'yearly archives date format', 'fotopress' ) ) );
										else :
											_e( 'Archives', 'fotopress' );
										endif;
									?> </span> <?php	 
									}else if ( is_search() ) {
									?>
										<a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php _e('Home','fotopress');?></a>
										<span class="breadcrumbs-separator"> / </span>
										<span><?php printf( __( ' %s', 'fotopress' ),get_search_query());?></span> <?php
									}else if ( is_404() ) {
									?>
										<a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php _e('Home','fotopress');?></a>
										<span class="breadcrumbs-separator"> / </span>
										<span><?php _e('Error 404!','fotopress'); ?></span> <?php
									}else{ ?>
										<a href="<?php echo esc_url(home_url()); ?>" rel="nofollow"><?php _e('Home','fotopress');?></a>
										<span class="breadcrumbs-separator"> / </span>
										<span><?php _e('BLOG','fotopress');?></span>
									<?php 
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</header>
	<!-- #Header Section Ends -->