<?php
/**
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Blog_Way
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses blog_way_header_style()
 */
function blog_way_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'blog_way_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1920,
		'height'                 => 410,
		'flex-height'            => true,
		'header-text'   		 => false,
	) ) );
}
add_action( 'after_setup_theme', 'blog_way_custom_header_setup' );