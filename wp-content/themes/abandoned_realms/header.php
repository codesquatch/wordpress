<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Abandoned_Realms
 */

global $current_user; ?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
	<script src="http://abandonedrealms.com/forum/templates/subSilver/votingScript.js">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Render our menu here so that we can manipulate the body of the page without affecting the navbar -->
  <nav class="main-menu" id="main-menu-toggle">
    <a href="#" id="menu-close" class="fa fa-times"></a>
    <?php
      wp_nav_menu( array(
        'menu' => 'main-menu',
        'container' => 'nav',
      ) );
    ?>
  </nav>

  <div id="page">
  	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'abandonedrealms' ); ?></a>
  <div id="header">
    <div>
      <div class="col-md-12 clearfix">
        <nav class="navbar navbar-inverse" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu-collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php print get_site_url(); ?>">Abandoned Realms</a>
          </div>
          <div class="collapse navbar-collapse" id="main-menu-collapse">

            <div class="navbar-nav navbar-right">
              <!-- Menu -->
<!--               <button id="menu-toggle" class=" btn btn-success"><i class="fa fa-bars"></i><span class="text"> Menu</span></button> -->

              <!-- Start Vote dropdown menu -->
              <nav id="vote-menu">
                <button button type="button" class="btn btn-default dropdown-toggle" aria-label="Search" id="voteDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bullhorn" aria-hidden="true" aria-label="Bullhorn Icon"></i>Vote</button>
                <ul class="dropdown-menu" aria-labelledby="voteDropdownMenu">
                  <?php foreach(wp_get_nav_menu_items('vote-menu') as $menu_item): ?>
                  <li>
                    <?php if ($menu_item->title == 'Top Mud Sites'): ?>
                    <a href="<?php echo $menu_item->url ?>" target=_blank><?php echo $menu_item->title; ?> <span class="badge"><script language="text/javascript"> displayRank("TMS"); </script></span></a>
                    <span class="gensmall"><SCRIPT LANGUAGE="JavaScript"> displayLastVoted("TMS"); </SCRIPT></span>
                    <?php else: ?>
                    <a href="<?php echo $menu_item->url ?>" target=_blank><?php echo $menu_item->title; ?> <span class="badge"><script language="javascript"> displayRank("TMC"); </script></span></a>
                    <?php endif; ?>
                    </li>
                   <?php endforeach; ?>
                </ul>
              </nav>
              <!-- End Vote dropdown menu -->
              <nav class="dashboard-menu">
                <div class="dropdown">
                  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php if ( is_user_logged_in() ): ?>
                      Welcome Back, <?php echo $current_user->display_name; ?>
                    <?php else: ?>
                      Login Dashboard
                      <?php endif; ?>
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                      <?php
                          if ( is_user_logged_in() ) {
                               wp_nav_menu( array( 'menu' => 'dashboard-menu' ) );
                          }
                          else {
                            if (!is_admin()) {
                              wp_login_form(
                                array(
                                  'echo' => true,
                                  'redirect' => site_url('/wp-admin'),
                                )
                              );
                            } else {
                              wp_login_form(
                                array(
                                  'echo' => true,
                                  'redirect' => site_url('/dashboard'),
                                )
                              );
                            }
                          }
                      ?>
                    </ul>
                  </div>
              </nav>
            <a class="btn btn-red" href="http://webclient.abandonedrealms.com">Slay Now!</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
      <div>
    <div class="col-md-12">
      <nav class="secondary-navbar navbar-inverse">
        <?php
          wp_nav_menu( array(
            'menu' => 'main-menu',
            'container' => 'nav',
          ) );
        ?>
        <!--  Search Dropdown -->
          <div class="search dropdown">
            <button type="button" class="btn btn-default dropdown-toggle" aria-label="Search" id="searchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-search" aria-hidden="true" aria-label="Search Icon"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="searchDropdown" aria-expanded="false">
              <?php get_search_form(); ?>
            </ul>
          </div>
      </nav>
    </div>
  </div>
  </div>

	<div id="content" class="site-content">
