<?php
/**
 * Functions for active_callback.
 *
 * @package Blog Way
 */

if ( ! function_exists( 'blog_way_is_seo_h1_title_active' ) ) :

	/**
	 * Check if SEO Title is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blog_way_is_seo_h1_title_active( $control ) {

		if ( true == $control->manager->get_setting( 'seo_h1_title_set' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;