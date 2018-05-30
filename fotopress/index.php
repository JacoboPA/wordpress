<?php 
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header(); ?>

<div id="container">
	<div class="container">
		<div class="row">
			<div id="content" class="col-md-8 col-sm-8 col-xs-12 archive-wrap">
				<div class="inner-content">
					<div class="entry-listing">
						<?php 
							if(have_posts()) : 
							while(have_posts()) : the_post();
							get_template_part( 'template-parts/content', get_post_format() );
							endwhile; 

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'fotopress' ),
								'next_text'          => __( 'Next page', 'fotopress' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fotopress' ) . ' </span>',
							));	
						?> 
						<?php else :  ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
					</div>
				</div><!-- .inner-content-->
			</div><!-- #content -->
		
			<?php get_sidebar( 'blog' ); ?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #container -->

<?php get_footer(); ?>