<?php 
/**
 * The template for displaying 404 pages (Not Found)
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
					<h1 class="entry-title"><?php _e('Oops! That page can&rsquo;t be found.', 'fotopress'); ?></h1>
					<p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'fotopress'); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .inner-content-->
			</div><!-- #content -->
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #container -->
<?php get_footer(); ?>