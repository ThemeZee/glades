<?php
/**
 * Featured Post Slider
 *
 */

// Get our Featured Content posts
$featured_posts = cardigan_get_featured_content();

// Check if there is Featured Content
if ( empty( $featured_posts ) and current_user_can( 'edit_theme_options' ) ) : ?>

	<p class="featured-content-empty-posts">
		<?php _e('There are no posts available to be displayed in the featured content section. To set up your featured posts, go to Appearance -> Customize -> Theme Options, and add a tag under Tag Name in the Featured Content section. The featured content section will then display all posts which are tagged with that keyword.', 'cardigan'); ?>
	</p>
	
<?php
	return;
endif;

// Limit the number of words in slideshow post excerpts
add_filter('excerpt_length', 'cardigan_featured_content_excerpt_length');

// Set loop count
$loop_count = 1;

?>
		
	<div id="featured-content" class="clearfix">

		<?php // Display Featured Content
		foreach ( $featured_posts as $post ) : setup_postdata( $post ); 
		
			// Display first featured post (big)
			if(isset($loop_count) and $loop_count == 1) : ?>
			
			<div class="featured-content-left">
	
				<div class="featured-post-wrap clearfix">
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
							<?php the_post_thumbnail('cardigan-featured-content-left'); ?>
						</a>
						
						<div class="post-content">

							<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
							<div class="postmeta clearfix"><?php cardigan_display_postmeta(); ?></div>
					
						</div>

					</article>
					
				</div>
				
			</div>
			
			<div class="featured-content-right clearfix">
			
		<?php // Display second featured post on the right side
			else: ?>
			
				<div class="featured-post-wrap clearfix">
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
							<?php the_post_thumbnail('cardigan-featured-content-right'); ?>
						</a>
						
						<div class="post-content">

							<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					
						</div>

					</article>
				
			</div>
				
		<?php	
			endif;
			
			// Increase Loop count
			$loop_count++;
			
		endforeach;
		?>
			</div><!-- end .featured-content-right -->
	
	</div><!-- end #featured-content -->

<?php

// Remove excerpt filter
remove_filter('excerpt_length', 'cardigan_featured_content_excerpt_length');

// Reset Postdata
wp_reset_postdata();

?>