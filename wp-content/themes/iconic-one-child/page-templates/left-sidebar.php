<?php
/**
 * Template Name: Left-Sidebar
 *
 * @package WordPress
 * @subpackage Brenau Intranet
 * @since Brenau Intranet 1.0
 */

get_header(); ?>



<div id="left-menu-container">


<div class="left-sidebar left-widget-area" role="complementary">
		<?php dynamic_sidebar( 'left-sidebar' ); ?>
	</div><!-- .left-sidebar -->

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="left-menu-template">
		<div role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
	
</div><!-- #main-content -->

<?php

get_footer();
