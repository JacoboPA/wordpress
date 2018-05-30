<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @subpackage Fotopress
 */
get_header();
?>
<div id="container">
	<div class="container">
		<div class="row">
			<div id="content" class="col-md-8 col-sm-8 col-xs-12">
				<div class="inner-content">
					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						endwhile;
					?>
				</div>
			</div><!-- #content -->
		
			<?php get_sidebar( 'content' ); ?>
				
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #container -->
<?php get_footer(); ?>