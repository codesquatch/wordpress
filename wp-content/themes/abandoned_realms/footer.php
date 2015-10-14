<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div><!-- .site-content -->

  <footer id="footer">
    <div id="footer-columns" class="col-md-12">
      <div class="col-md-4">
        <?php
            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column 1') ) : ?>
        <?php endif; ?>
      </div>
      <div class="col-md-4">
        <?php
            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column 2') ) : ?>
        <?php endif; ?>
      </div>
      <div class="col-md-4">
        <?php
            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column 3') ) : ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="row copyright">
      <div class="col-md-12">Abandoned Realms Copyright <?php _e(current_time('Y')); ?></div>
    </div>
  </footer>
</div>


<?php wp_footer(); ?>

</body>
</html>
