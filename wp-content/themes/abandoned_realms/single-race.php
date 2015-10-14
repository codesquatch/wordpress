<?php

/**
 * Template Name: Race Page Template
 */

?>

<?php get_header(); ?>

  <div id="primary" class="primary-content-area container">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="row content-top">
        <div class="col-md-8">
        	<header class="entry-header">
        		<?php
        			if ( is_single() ) :
        				the_title( '<h1 class="entry-title">The ', '</h1>' );
        			else :
        				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">The ', esc_url( get_permalink() ) ), '</a></h2>' );
        			endif;
        		?>
        	</header><!-- .entry-header -->
        	<div class="race-stats">
            <!--   Print out stats for the race -->
          	<h3>Stats</h3>
          	Strength: <?php echo get_field('strength'); ?>
          	Intelligence: <?php echo get_field('intelligence'); ?>
          	Wisdom: <?php echo get_field('wisdom'); ?>
          	Dexterity: <?php echo get_field('dexterity'); ?>
          	Constitution: <?php echo get_field('constitution'); ?>
        	</div>
          <!--   Loop through our classes and print them out as a link -->
          <div class="race-classes">
            <h3>Available Classes</h3>
          	<?php $classes = get_posts(array('post_type' => 'class'));
            	foreach ($classes as $class) {
              	if (get_metadata('post', $post->ID, strtolower($class->post_title) . '_checkbox', TRUE) == 'on'): ?>
                  <a class="race-link" href="<?php echo get_permalink($class->ID); ?>"><?php echo $class->post_title; ?></a>
                <?php endif;
            	}
          	?>

          </div>
        </div>
        <div class="col-md-4 race-profile">
              	<div class="race-image">
                	<?php $image = get_field('class_image');
                    if (isset($image['url'])): ?>
                    <img src="<?php echo $image['url']; ?>"/>
                  <?php endif; ?>
              	</div>
              	<div class="connect-text">
                  <a href="http://webclient.abandonedrealms.com"><?php echo get_field('connect_text'); ?></a>
              	</div>
        </div>

      </div>

      <div class="row content-bottom">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#background" aria-controls="background" role="tab" data-toggle="tab">Background</a></li>
          <?php if (isset(get_field('class_tips'))) : ?>
            <li role="presentation"><a href="#tips" aria-controls="tips" role="tab" data-toggle="tab">Tips</a></li>
          <?php endif; ?>
          <?php if (!empty(get_field('racial_legacies'))): ?>
          <li role="presentation"><a href="#racial-legacies" aria-controls="racial-legacies" role="tab" data-toggle="tab">Racial Legacies</a></li>
          <?php endif; ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="background"><?php get_template_part('content-race', 'page'); ?></div>
          <?php if (isset(get_field('class_tips'))) : ?>
            <div role="tabpanel" class="tab-pane" id="tips"><?php echo get_field('class_tips'); ?></div>
          <?php endif; ?>
          <?php if (isset(get_field('racial_legacies'))): ?>
            <div role="tabpanel" class="tab-pane" id="racial-legacies"><?php echo get_field('racial_legacies'); ?></div>
          <?php endif; ?>
        </div>
      </div>

    <?php endwhile; else: ?>

    <?php endif; ?>
  </div>
<?php get_footer(); ?>