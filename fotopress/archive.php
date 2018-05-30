<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Fotopress already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage Fotopress
 */
get_header(); ?>

<div id="container">
	<div class="container">
		<div class="row">
			<div id="content" class="col-md-8 col-sm-8 col-xs-12 archive-wrap">
				<div class="inner-content">
					<?php
						the_archive_title( '<h1 class="entry-title">', '</h1>' );
					?>

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