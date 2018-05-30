<?php
/**
 * The Content Sidebar
 *
 * @subpackage Fotopress
 */

if ( ! is_active_sidebar( 'page-sidebar' ) ) {
	return;
}
?>
<div id="sidebar" class="col-md-4 col-sm-4 col-xs-12 widget-area" role="complementary">
	<div class="inner-sidebar">
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
	</div>
</div><!-- #sidebar -->
