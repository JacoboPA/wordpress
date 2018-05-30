<?php 
/**
 * Template Name: Full Width Page
 *
 * @subpackage Fotopress
 * @since Fotopress 1.0
 */
get_header(); 
?>
<div id="container">
	<div class="container">
		<div class="row">
			<div id="content" class="col-md-12">
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
				</div><!-- .inner-content -->
			</div><!-- #content -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #container -->
<?php get_footer(); ?>