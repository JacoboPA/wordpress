<?php
/**
 * The template for displaying a "No posts found" message.
 */
?>
<div class="post-notfound">
	<h1 class="notfound-title"><?php _e('Nothing Found','fotopress'); ?></h1>
</div>
<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'fotopress' ), esc_url(admin_url( 'post-new.php' )) ); ?></p>
	<?php elseif ( is_search() ) : ?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'fotopress' ); ?></p>
		<br><?php get_search_form(); ?>
	<?php else : ?>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fotopress' ); ?></p>
		<br><?php get_search_form(); ?>
	<?php endif; ?>
</div>
<!-- page-content -->