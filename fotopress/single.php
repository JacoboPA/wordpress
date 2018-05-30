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
			<div id="content" class="col-md-8 col-sm-8 col-xs-12">
				<div class="inner-content">
					<?php 
						if(have_posts()) : 
						while(have_posts()) : the_post();
					?>
						
					<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">

						<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
							<div class="post-thumbnail">
								<?php the_post_thumbnail( 'full' ); ?>
							</div>
						<?php } ?>

						<div class="post-meta clearfix">
							<span class="author-name"><i class="fa fa-user">&nbsp;</i><?php the_author_posts_link(); ?> </span>
							<?php if (has_category()) { ?><span class="category"><i class="fa fa-folder">&nbsp;</i><?php the_category(','); ?></span><?php } ?>
							<?php the_tags('<span class="tags"><i class="fa fa-tag"></i> ',',','</span>'); ?>
							<span class="date"><i class="fa fa-clock-o">&nbsp;</i><?php the_time( get_option( 'date_format' ) ); ?></span>
							<span class="comments"><i class="fa fa-comments">&nbsp;</i><?php comments_popup_link(__('No Comments ','fotopress'), __('1 Comment ','fotopress'), __('% Comments ','fotopress')) ; ?></span>
						</div>

						<div class="post-content clearfix">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'fotopress' ) ); ?>
							<?php
								wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fotopress' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
									'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'fotopress' ) . ' </span>%',
									'separator'   => '<span class="screen-reader-text">, </span>',
								) );
							?> 
						</div>
					</div>
					
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'fotopress' ),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>

					<?php
					// Previous/next post navigation.
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'fotopress' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'fotopress' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'fotopress' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'fotopress' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
					?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}						
					?> 
					<?php endwhile; else :  ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>
				</div><!-- .inner-content-->
			</div><!-- #content -->
			<?php get_sidebar( 'blog' ); ?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #container -->

<?php get_footer(); ?>