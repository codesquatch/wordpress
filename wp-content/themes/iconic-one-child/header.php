<?php
/*
 * Header Section of Iconic One
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress - Themonic Framework
 * @subpackage Iconic_One
 * @since Iconic One 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon"  href="favicon.ico">

<script src="http://brenauitlabs.wpengine.com/wp-content/themes/iconic-one-child/js/classie.js"></script>
<script src="http://brenauitlabs.wpengine.com/wp-content/themes/iconic-one-child/js/gnmenu.js"></script>
<script src="http://brenauitlabs.wpengine.com/wp-content/themes/iconic-one/child/js/shifting-header.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
jQuery("document").ready(function($){
var nav = $('#topHeaderBar');
$(window).scroll(function () {
if ($(this).scrollTop() > 136) {
nav.addClass("sticky-top");
} else {
nav.removeClass("sticky-top");
}
});
 
});
</script>

<script>
$( document ).ready(function( $ ) {
$("a[rel=popover]")
    .popover({ html: 'true'})
    .click(function(e) { 
        e.preventDefault(); 
    });
});
$(document).ready(function (){
            $(".bgmp_view-on-map").click(function (){
                //$(this).animate(function(){
                    $('html, body').animate({
                        scrollTop: $("#primary").offset().top
                    }, 1250);
                //});
            });
      
});
</script>

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script async src="../iconic-one/js/html5.js" type="text/javascript"></script>
<!--[if lt IE 10]>
<script async src="../iconic-one/js/html5.js" type="text/javascript"></script>
<!--[if lt IE 11]>
<script async src="../iconic-one/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
 <div class="hiddenElement">
	<ul id="ql-menu" class="ql-menu-main">
		<li class="ql-trigger">
			<a class="openButton"><i class="fa fa-indent"></i></a>
				<nav class="ql-menu-wrapper">
					<div class="ql-scroller">
						<ul class="ql-menu">
						<li><a href="http://www.brenau.edu/about/offices-and-resources/tuition-fees-and-accounting-office/" class="ql-icon ql-icon-accounting">Accounting Office</a></li>
						<li><a href="http://www.brenau.edu/admissions" class="ql-icon ql-icon-admissions">Admissions</a></li>
						<li><a href="http://brenau.bncollege.com/webapp/wcs/stores/servlet/BNCBHomePage?storeId=56553&catalogId=10001&langId=-1" class="ql-icon ql-icon-bookstore">B&N Bookstore</a></li>
						<li><a href="https://campus.brenau.edu" class="ql-icon ql-icon-campusweb">CampusWEB</a></li>
						<li><a href="https://brenau.instructure.com"class="ql-icon ql-icon-canvas">Canvas</a></li>
						<li><a href="https://remote.brenau.edu/DirectorySearch/" class="ql-icon ql-icon-directory">Directory</a></li>
						<li><a href="https://mail.google.com" class="ql-icon ql-icon-email">Email</a></li>
						<li><a href="https://events.brenau.edu" class="ql-icon ql-icon-events">Events</a></li>
						<li><a href="http://www.brenau.edu/admissions/pay-for-school" class="ql-icon ql-icon-financialAid">Financial Aid</a></li>
						<li><a href="https://www.brenau.edu/giving/donate/" class="ql-icon ql-icon-give">Give</a></li>
						<li><a href="http://s3.parature.com/ics/support/default.asp?deptID=5307" class="ql-icon ql-icon-helpdesk">Helpdesk Support</a></li>
						<li><a href="https://update.brenau.edu" class="ql-icon ql-icon-update">Brenau Update</a></li>
						<li><a href="#" class="ql-icon ql-icon-student">Student News</a></li>
						
						  
						</ul>
					</div><!-- /gn-scroller -->
				</nav>
		</li>
	
	</ul>
</div><!-- /container -->
<script>
new gnMenu( document.getElementById( 'ql-menu' ) );
</script>


<div id="topHeaderBar" >
<ul>

<li id="campus"><a href="https://campus.brenau.edu" target="_blank" >CampusWEB</a></li>
<li id="canvas"><a href="https://brenau.instructure.com" target="_blank">Canvas</a></li>
<li id="google"><a href="https://mail.google.com" target="_blank">Email</a></li>
<li id="events"><a href="https://events.brenau.edu/mastercalendar" target="_blank">Events</a></li>
<li class="goldLink"><a href="https://www.brenau.edu/giving/donate/">Support Brenau</a></li>
<li><a href="<?php echo get_theme_mod( 'twitter_url', 'default_value' ); ?>" target="_blank" ><i class="fa fa-twitter fa-2x"></i></a></li>
<li><a href="<?php echo get_theme_mod( 'facebook_url', 'default_value' ); ?>" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></li> 
 

</ul>
</div>


	<header id="masthead" class="site-header" role="banner">
		<?php if ( get_theme_mod( 'themonic_logo' ) ) : ?>
		<div class="themonic-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'themonic_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
		</div>	
		
		<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>	
		
	<?php } ?>

		<?php else : ?>
		
	<?php if( get_theme_mod( 'iconic_one_social_activate' ) == '1') { ?>

		

	<?php } ?>	
		<?php endif; ?>


		<nav role="navigation">
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'themonic' ); ?>"><?php _e( 'Skip to content', 'themonic' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' , 'container_id' => 'navigation' , 'menu_class' => 'menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="main" class="wrapper">

