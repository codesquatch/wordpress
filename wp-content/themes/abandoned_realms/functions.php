<?php

function abandonedrealms_widgets_init() {
	register_sidebar(
	  array(
  		'name'  => __( 'Sidebar', 'abandonedrealms' ),
  		'id'  => 'sidebar-1',
  		'description'  => __( 'Add widgets here to appear in your sidebar.', 'abandonedrealms' ),
  		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  		'after_widget'  => '</aside>',
  		'before_title'  => '<h2 class="widget-title">',
  		'after_title'   => '</h2>',
    )
  );
  register_sidebar(
    array(
      'name' => __('Footer Column 1', 'abandonedrealms'),
      'id' => 'footer-column-1',
      'description' => __( 'Add widgets to appear in Left Footer', 'abandonedrealms'),
      'before_widget' => '<div id="%1$s" class="footer-column first-footer">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="footer-widget-title>',
      'after_title' => '</h3>',
    )
  );
  register_sidebar(
    array(
      'name' => __('Footer Column 2', 'abandonedrealms'),
      'id' => 'footer-column-2',
      'description' => __( 'Add widgets to appear in Middle Footer', 'abandonedrealms'),
      'before_widget' => '<div id="%1$s" class="footer-column second-footer">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="footer-widget-title>',
      'after_title' => '</h3>',
    )
  );
  register_sidebar(
    array(
      'name' => __('Footer Column 3', 'abandonedrealms'),
      'id' => 'footer-column-3',
      'description' => __( 'Add widgets to appear in Right Footer', 'abandonedrealms'),
      'before_widget' => '<div id="%1$s" class="footer-column third-footer">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="footer-widget-title>',
      'after_title' => '</h3>',
    )
  );
}

add_action( 'widgets_init', 'abandonedrealms_widgets_init' );

function enqueue_scripts() {
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bootstrap/dist/js/bootstrap.min.js', array('jquery'));
  wp_enqueue_script('local-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
  wp_enqueue_script('jquery');
  wp_enqueue_script('hoverIntent');
}
add_action ('wp_enqueue_scripts', 'enqueue_scripts');

function enqueue_stylesheet() {
    wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'enqueue_stylesheet');

// Custom function to view formatted array content
function dvm($content) {
  $output = print '<pre id="dvm">';
  $output .= print_r($content);
  $output .= print '</pre>';

  return $output;
}

function ar_register_nav_menus() {
  register_nav_menus(
    array (
      'main-menu' => __( 'Main Menu' ),
      'dashboard-menu' => __( 'Dashboard Menu'),
    )
  );
}

add_action( 'init', 'ar_register_nav_menus');

/*
function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");
	            submit_button();
	        ?>
	    </form>
		</div>
	<?php
}

function theme_submenu_settings_page() {
 ?>
  <form method="post" action="options.php">
    <?php
      settings_field('test-section');
      do_settings_action('secondary-options');
      submit_button();
    ?>
  </form>

  <?php
}

function add_theme_menu_item()
{
	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", '
dashicons-shield', 61.5);

 add_submenu_page( 'theme-panel', 'Options', 'Options', 'manage_options', 'bottom-level-slug', 'theme_submenu_settings_page');
}

add_action("admin_menu", "add_theme_menu_item");

function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_text_field() {
  ?>
    <input type="checkbox" id="checkbox" value="<?php echo get_option('text_field'); ?>"/>
    <?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");

	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
  add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");

  register_setting('test-section', 'text_field');
  register_setting("section", "twitter_url");
  register_setting("section", "facebook_url");
}

add_action("admin_init", "display_theme_panel_fields");
*/

/**
 * Adds the Races meta box to the Class screen
 */
function ar_add_meta_box() {
//   $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
  $post_type = get_post_type(get_the_ID());
//   Only display if it is a Class page so we can check which Races it can be
  add_meta_box(
      'race-box',
      __( 'Available Races' ), // meta box title, like "Page Attributes"
      'race_meta_box_callback', // callback function, spits out the content
      'class',// post type or page. We'll add this to pages only
      'side', // context (where on the screen
      'low' // priority, where should this go in the context?
  );
}

/**
 * Adds the Classes meta box to the Race screen
 */
function ar_class_meta_box() {

  add_meta_box(
    'class-box',
    __('Available Classes'),
    'class_meta_box_callback',
    'race',
    'side',
    'low'
  );
}

/**
 * Callback function for our meta box.  Echos out the content
 */
function class_meta_box_callback( $post ) {

  // Add a nonce field so we can check for it later.
	wp_nonce_field( 'class_save_meta_box_data', 'class_meta_box_nonce' );
	$classes = get_posts(array('post_type' => 'class'));
    foreach($classes as $class) {

      $page_title = strtolower($class->post_title);

      $value = get_post_meta($post->ID, $page_title . '_checkbox', true);

      if ($value == 'on') {
        echo "<label for=\"" . $page_title .  "_checkbox\">" . "<input " . " type=\"checkbox\" checked=\"checked\" name=\"" . $page_title .  "_checkbox\">" .
        $class->post_title . "</label><br>";
      }
      else {
         echo "<label for=\"" . $page_title .  "_checkbox\">" . "<input " . " type=\"checkbox\" name=\"" . $page_title .  "_checkbox\">" .
        $class->post_title . "</label><br>";
      }

    ?>

    <?php

    }
}

add_action( 'add_meta_boxes', 'ar_add_meta_box' );

/**
 * Callback function for our meta box.  Echos out the content
 */
function race_meta_box_callback( $post ) {

  // Add a nonce field so we can check for it later.
	wp_nonce_field( 'class_save_meta_box_data', 'class_meta_box_nonce' );
	$races = get_posts(array('post_type' => 'class'));

  foreach($races as $race) {

    $page_title = strtolower($race->post_title);

    $value = get_post_meta($post->ID, $page_title . '_checkbox', true);

    if ($value == 'on') {
      echo "<label for=\"" . $page_title .  "_checkbox\">" . "<input " . " type=\"checkbox\" checked=\"checked\" name=\"" . $page_title .  "_checkbox\">" .
      $race->post_title . "</label><br>";
    }
    else {
       echo "<label for=\"" . $page_title .  "_checkbox\">" . "<input " . " type=\"checkbox\" name=\"" . $page_title .  "_checkbox\">" .
      $race->post_title . "</label><br>";
    }

  ?>

  <?php

  }
}

add_action( 'add_meta_boxes', 'ar_class_meta_box' );


/**
 * When the post is saved, saves our custom race data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function race_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['race_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['race_meta_box_nonce'], 'race_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
/*
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
*/


	/* OK, it's safe for us to save the data now. */

  // Load all of the children of our Race pages so we can loop through them
	$races = get_posts(array('post_type' => 'race'));

  foreach ($races as $race) {
    $page_title = strtolower($race->post_title);
    // Get the value for our checkbox
    $value = get_post_meta($post_id, $page_title . '_checkbox', true);

    // If the $_POST is set to on, then our checkbox is checked
    if ($_POST[$page_title . '_checkbox'] == 'on') {
      // If $value is set to 'on', then we remove the old database entry and set the new one
      if ($value == 'on') {
        delete_post_meta($post_id, $page_title . '_checkbox', 'on');
      }
      add_post_meta($post_id, $page_title . '_checkbox', $_POST[$page_title . '_checkbox']);
    }
  }

}
add_action( 'save_post', 'race_save_meta_box_data');

function class_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['class_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['class_meta_box_nonce'], 'class_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
/*
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
*/


	/* OK, it's safe for us to save the data now. */

  // Load all of the children of our Race pages so we can loop through them
	$classes = get_posts(array('post_type' => 'class'));

  foreach ($classes as $class) {
    $page_title = strtolower($class->post_title);
    // Get the value for our checkbox
    $value = get_post_meta($post_id, $page_title . '_checkbox', true);

    // If the $_POST is set to on, then our checkbox is checked
    if ($_POST[$page_title . '_checkbox'] == 'on') {
      // If $value is set to 'on', then we remove the old database entry and set the new one
      if ($value == 'on') {
        delete_post_meta($post_id, $page_title . '_checkbox', 'on');
      }
      add_post_meta($post_id, $page_title . '_checkbox', $_POST[$page_title . '_checkbox']);
    }
  }

}
add_action( 'save_post', 'class_save_meta_box_data');

function create_post_type() {
  register_post_type( 'race',
    array(
      'labels' => array(
        'name' => __( 'Races' ),
        'singular_name' => __( 'Race' ),
				'add_new' => __( 'Add a new Race' ),
				'add_new_item' => __( 'Add Race' ),
				'edit_item' => __( 'Edit Race' ),
				'new_item' => __( 'Add a new Race' ),
				'view_item' => __( 'View Race' ),
				'search_items' => __( 'Search Race' ),
				'not_found' => __( 'No races found' ),
				'not_found_in_trash' => __( 'No races found in the graveyard' )
      ),
      'public' => true,
      'has_archive' => true,
      'capability_type' => 'page',
      'supports' => array(
        'title',
        'editor',
        'page-attributes',
      ),
      'menu_icon' => 'dashicons-universal-access-alt',
  		'register_meta_box_cb' => 'ar_add_meta_box',
    )
  );
  register_post_type('class',
    array(
     'labels' => array(
       'name' => __( 'Classes' ),
       'singular_name' => __( 'Class' ),
				'add_new' => __( 'Add a new Class' ),
				'add_new_item' => __( 'Add New Class' ),
				'edit_item' => __( 'Edit Class' ),
				'new_item' => __( 'Add New Class' ),
				'view_item' => __( 'View Class' ),
				'search_items' => __( 'Search Class' ),
				'not_found' => __( 'No classes found' ),
				'not_found_in_trash' => __( 'No classes found in the graveyard' )
     ),
     'public' => true,
     'has_archive' => true,
     'capability_type' => 'page',
     'menu_icon' => 'dashicons-shield',
     'supports' => array( 'title', 'editor'),
		 'register_meta_box_cb' => 'ar_add_meta_box',
    )
  );
}
add_action( 'init', 'create_post_type' );
