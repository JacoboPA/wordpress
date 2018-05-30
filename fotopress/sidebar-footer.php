<?php
/**
 * The Footer Sidebar
 *
 * @subpackage Sample
 */
 
if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
	<div id="footer-sidebar" class="footer-sidebar widget-area clearfix" role="complementary">
		<?php dynamic_sidebar( 'footer-sidebar' ); ?>
	</div><!-- #sidebar -->
<?php endif; ?>