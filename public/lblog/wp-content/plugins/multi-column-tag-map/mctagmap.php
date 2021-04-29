<?php
/*
Plugin Name: Multi-column Tag Map
Plugin URI: https://wordpress.org/plugins/multi-column-tag-map/
Description: Multi-column Tag Map displays a columnized and alphabetical (English) listing of all tags used in your site similar to the index pages of a book.
Version: 17.0.14
Author: Alan Jackson
Author URI: http://mctagmap.tugbucket.net
*/


/*  Copyright 2009-2015  Alan Jackson (alan[at]tugbucket.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// **************************
//
// Long code removed completely as of version 10.0.1 - it was deprecated as of version 4.0
//
// **************************

// the JS and CSS

	/*
    if (get_template_directory() === get_stylesheet_directory()) {
		echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH);
    } else {
		echo parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH);
    }
	*/

/* load the PHP*/
function sc_mcTagMap($atts, $content = null) {
	$mctagmapCSSpath = $_SERVER['DOCUMENT_ROOT'].parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH);
	if(file_exists($mctagmapCSSpath.'/multi-column-tag-map/mctagmap_functions.php')){
		include($mctagmapCSSpath.'/multi-column-tag-map/mctagmap_functions.php');
	} else {
		include('mctagmap_functions.php');
	}
	static $mctmcounter = 0;
	/* echo ++$mctmcounter; */
	++$mctmcounter;
	return str_replace('-mctmcounter-',$mctmcounter.'-',$list);
}
add_shortcode("mctagmap", "sc_mcTagMap");
// end shortcode

/* admin page */
add_action( 'admin_menu', 'sc_mcTagMap_menu' );
function sc_mcTagMap_menu() {
    add_options_page( 'MC Tag Map', 'MC Tag Map', 'manage_options', 'mctm-options', 'sc_mcTagMap_plugin_options' );
}
function sc_mcTagMap_plugin_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    include dirname(__FILE__)."/mctagmap-options.php";
} 




function mctagmap_donate($links, $file) {
$plugin = plugin_basename(__FILE__);
// create link
if ($file == $plugin) {
return array_merge( $links, array( sprintf( '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GX8RH7F2LR74J" target="_blank">Donate to mctagmap development</a>', $plugin, __('Donate') ) ));
}
return $links;
}
add_filter( 'plugin_row_meta', 'mctagmap_donate', 10, 2 );




/* show the excerpt outside of the loop */
function mctm_get_the_excerpt_here($post_id){
  	global $wpdb;
 	$query = "SELECT post_excerpt FROM $wpdb->posts WHERE ID = $post_id LIMIT 1";
 	$result = $wpdb->get_results($query, ARRAY_A);
  	return $result[0]['post_excerpt'];
}


/* Page Excerpt by: Jeremy Massel */
//add_action( 'edit_page_form', 'mctm_pe_add_box');
add_action('init', 'mctm_pe_init');

function mctm_pe_init() {
	if(function_exists("add_post_type_support")){ //support 3.1 and greater
		add_post_type_support( 'page', 'excerpt' );
	}
}
function mctm_pe_page_excerpt_meta_box($post) {
?>
<label class="hidden" for="excerpt"><?php _e('Excerpt') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
<p><?php _e('Excerpts are optional hand-crafted summaries of your content. You can <a href="http://codex.wordpress.org/Template_Tags/the_excerpt" target="_blank">use them in your template</a>'); ?></p>
<?php
}

function mctm_pe_add_box()
{
	if(!function_exists("add_post_type_support")) //legacy
	{		add_meta_box('postexcerpt', __('Page Excerpt'), 'mctm_pe_page_excerpt_meta_box', 'page', 'advanced', 'core');
	}
}
/* END - Page Excerpt by: Jeremy Massel */

// overwrite single_tag_title()
add_filter('single_tag_title', 'mctagmap_single_tag_title', 1, 2);
function mctagmap_single_tag_title($prefix = '', $display = false) {
	global $wp_query;
	if ( !is_tag() )
		return;

	$tag = $wp_query->get_queried_object();

	if ( ! $tag )
		return;

	$my_tag_name = str_replace('|', '', $tag->name);
	if ( !empty($my_tag_name) ) {
		if ( $display)
			echo $prefix . $my_tag_name;
		else
			return $my_tag_name;
	}
}

// overwrite single_tag_title()
add_filter('the_tags', 'mctagmap_the_tags');
function mctagmap_the_tags($mctagmapTheTags) {
    return str_replace('|', '', $mctagmapTheTags);
}
?>