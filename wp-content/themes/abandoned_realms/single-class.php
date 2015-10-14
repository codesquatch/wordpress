<?php

/**
 * Template Name: Class Page Template
 */

?>

<?php get_header(); ?>

  <div id="primary" class="primary-content-area container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="row">
        <div class="col-md-6">
        <?php get_template_part('content-class', 'page'); ?>
        </div>
        <div class="col-md-6">

        </div>

      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="race-classes">
            <h3>Available Races</h3>
          	<?php $races = get_posts(array('post_type' => 'race'));
            	foreach ($races as $race) {
              	if (get_metadata('post', $post->ID, strtolower($race->post_title) . '_checkbox', TRUE) == 'on'): ?>
                  <a class="race-link" href="<?php echo get_permalink($race->ID); ?>"><?php echo $race->post_title; ?></a>
                <?php endif;
            	}
          	?>
        </div>
      </div>

      <div class="row">
        <?php if (get_field('class_tips')) : ?>
          <div class="col-md-12">
            <h2>Tips</h2>
            <?php echo get_field('class_tips'); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endwhile; else: ?>

    <?php endif; ?>
  </div>

<?php get_footer(); ?>