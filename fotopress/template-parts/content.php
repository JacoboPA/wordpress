<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">

	<?php if(is_sticky($post->ID)) { _e("<h3 class='sticky-post'>featured</h3>",'fotopress'); }  ?>

	<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>" class="thumb-anchor">
			<?php
				the_post_thumbnail('full');
			?>
		</a>
	</div>
	<?php } ?>

	<h1 class="post-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h1>

	<div class="post-meta clearfix">
		<span class="author-name"><i class="fa fa-user">&nbsp;</i><?php the_author_posts_link(); ?> </span>
		<?php if(has_category()){ ?><span class="category"><i class="fa fa-folder">&nbsp;</i><?php the_category(','); ?></span><?php } ?>
		<span class="date"><i class="fa fa-clock-o">&nbsp;</i><?php the_time( get_option( 'date_format' ) ); ?></span>
		<span class="comments"><i class="fa fa-comments">&nbsp;</i><?php comments_popup_link(__('No Comments ','fotopress'), __('1 Comment ','fotopress'), __('% Comments ','fotopress')) ; ?></span>
	</div>

	<div class="post-excerpt clearfix">
		<?php the_excerpt(); ?>   
	</div>
	
	<div class="post-read-more clearfix"><a href="<?php the_permalink(); ?>"><?php _e('Read More','fotopress');?></a></div>		
</div>
<!-- post -->