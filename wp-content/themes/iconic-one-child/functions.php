<?php

/**
 *Custom Functions.php to add special widgets, customized searchbar, and other alterations
 *Author: Brenau University IT Department
*/


/**************************************************/
/**  		LET THE GAMES BEGIN 		 **/
/**************************************************/

/**************************************************/
/**  Add Left-Sidebar for Career Services & HR  **/
/**************************************************/


function leftsidebar_widgets_init() {

	register_sidebar( array(
		'name'          => __('Left Sidebar', 'themonic' ),
		'id'            => 'left-sidebar',
		'description'   => __( 'This is for templates with left sidebar enabled', 'themonic'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	)  );
}
add_action( 'widgets_init', 'leftsidebar_widgets_init' );

function my_search_form( $form ) {
    $form = 
    '<div id="expandableSearch"><form id="expandableSearch" role="search" method="get"  action="' . home_url( '/' ) . '" ><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
<input id="search" placeholder="Search.." type="search" value="' . get_search_query() . '" name="s" id="s" />    
    </form></div>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );


add_action( 'wp_enqueue_scripts', 'load_jquery_ui' );
function load_jquery_ui() {
	wp_enqueue_style('jquery-style','http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css');
}




/*
 * Enqueueing scripts and styles for front-end of the Intranet.
 */ 
function intranet_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );



	/*
	 * Loads Themonic's main stylesheet and the custom stylesheet.
	 */
	wp_enqueue_style( 'themonic-style', get_stylesheet_uri() );

       /*Load Jquery script for menu */

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'themonic-ie', get_template_directory_uri() . '/css/ie.css', array( 'themonic-style' ), '20130305' );
	$wp_styles->add_data( 'themonic-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'intranet_scripts_styles' );

/**************************************************/
/**  Add Phone Field for Job Board	         **/
/**************************************************/

add_filter( 'submit_job_form_fields', 'frontend_add_salary_field' );

function frontend_add_salary_field( $fields ) {
  $fields['job']['job_phone'] = array(
    'label' => __( 'Phone Number', 'job_manager' ),
    'type' => 'text',
    'required' => true,
    'placeholder' => '',
    'priority' => 7
  );
  return $fields;
}

add_action( 'job_manager_update_job_data', 'frontend_add_salary_field_save', 10, 2 );

function frontend_add_salary_field_save( $job_id, $values ) {
  update_post_meta( $job_id, '_job_phone', $values['job']['job_phone'] );
}


add_filter( 'job_manager_job_listing_data_fields', 'admin_add_salary_field' );

function admin_add_salary_field( $fields ) {
  $fields['_job_salary'] = array(
    'label' => __( 'Phone', 'job_manager' ),
    'type' => 'text',
    'placeholder' => '',
    'description' => ''
  );
  return $fields;
}

add_action( 'single_job_listing_meta_end', 'display_job_salary_data' );

function display_job_salary_data() {
  global $post;

  $phone = get_post_meta( $post->ID, '_job_salary', true );

  if ( $phone ) {
    echo '<li>' . __( 'Contact Number:' ) . ' ' . $phone . '</li>';
  }
}


