<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Search Form Template
 *
 *
 * @file           searchform.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/iconic-one-child/searchform.php
 * @link           http://codex.wordpress.org/Function_Reference/get_search_form
 * @since          available since Release 1.0
 */
?>
<div id="sb-search" class="sb-search">

<form method="get" action="<?php echo home_url(); ?>/">
<label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
<input id="search" class="sb-search-input" placeholder="Search.." type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" class="sb-search-submit" value="" />
	<span class="sb-icon-search"></span>
</form>
</div>