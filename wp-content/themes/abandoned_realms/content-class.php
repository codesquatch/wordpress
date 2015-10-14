<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Abandoned_Realms
 * @since 2015
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="row">
    <div class="col-md-6">
    	<header class="entry-header">
    		<?php
    			if ( is_single() ) :
    				the_title( '<h1 class="entry-title">The ', '</h1>' );
    			else :
    				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">The ', esc_url( get_permalink() ) ), '</a></h2>' );
    			endif;
    		?>
    	</header><!-- .entry-header -->
    	<?php $image = get_field('class_image');
        if (isset($image['url'])): ?>
        <img src="<?php echo $image['url']; ?>"/>
      <?php endif; ?>
      <div class="connect-text">
        <a href="http://webclient.abandonedrealms.com"><?php echo get_field('connect_text'); ?></a>
      </div>
    </div>
  </div>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'abandoned_realms' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'abandoned_realms' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'abandoned_realms' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
			?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'abandoned_realms' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
