<?php
/**
* The template for displaying the footer.
* Contains footer content and the closing of the
*/
$fotopress_copyright = get_theme_mod('fotopress_copyright','&copy; 2017 Fotopress WordPress Theme');
?>

<!-- #Footer Section Starts -->
<footer id="footer">
	<div class="container">
		<div class="row">
			<?php get_sidebar( 'footer' ); ?>	
		</div>
	</div>
	<div class="footer-siteinfo">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12 copyright_txt"><?php echo esc_attr($fotopress_copyright); ?></div>
				<div class="col-md-6 col-sm-6 col-xs-12 copyright_txt text-right"><?php _e('Fotopress by','fotopress'); ?><a href="<?php echo esc_url( __( 'http://desirepress.com', 'fotopress' ) ); ?>" target="_blank">&nbsp;&nbsp;<?php _e('DesirePress','fotopress'); ?></a></div>
			</div>
		</div>
	</div>
</footer>
<!-- #Footer Section Ends -->
<?php wp_footer(); ?>
</body>
</html>