<?php
/**
 * Load files.
 *
 * @package Blog_Way
 */

// Load default values.
require_once trailingslashit( get_template_directory() ) . '/inc/defaults.php';

// Custom template tags for this theme.
require_once trailingslashit( get_template_directory() ) . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require_once trailingslashit( get_template_directory() ) . '/inc/extras.php';

// Implement the Custom Header feature.
require_once trailingslashit( get_template_directory() ) . '/inc/custom-header.php';

// Load Jetpack compatibility file.
require_once trailingslashit( get_template_directory() ) . '/inc/jetpack.php';

// Customizer additions.
require_once trailingslashit( get_template_directory() ) . '/inc/customizer.php';

// Load hooks.
require_once trailingslashit( get_template_directory() ) . '/inc/hooks.php';

// Load widgets.
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/widgets.php';

// Load dynamic css.
require_once trailingslashit( get_template_directory() ) . '/inc/dynamic.php';

if ( is_admin() ) {
	// Load about.
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';
	
}