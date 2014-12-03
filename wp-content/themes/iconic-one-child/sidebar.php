<?php
/**
 * The sidebar containing the main widget area.
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */
?>

	<?php if ( is_active_sidebar( 'themonic-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'themonic-sidebar' ); ?>
		</div><!-- #secondary -->
	<?php else : ?>	
	 		<div id="secondary" class="widget-area" role="complementary">
			
			<div class="widget widget_recent_entries">
				<p class="widget-title"><?php _e( 'Recent Posts', 'themonic' ); ?></p>
				<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
			</div>
			
	<?php endif; ?>