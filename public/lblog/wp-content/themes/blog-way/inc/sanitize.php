<?php
/**
 * Sanitization functions.
 *
 * @package Blog_Way
 */

//=============================================================
// Select/radio santitization
//=============================================================
if ( ! function_exists( 'blog_way_sanitize_select' ) ) :

	function blog_way_sanitize_select( $input, $setting ) {
	  
		// Ensure input is clean.
		$input = sanitize_text_field( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;

//=============================================================
// Checkbox santitization
//=============================================================
if ( ! function_exists( 'blog_way_sanitize_checkbox' ) ) :

	function blog_way_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}

endif;

//=============================================================
// Positive santitization
//=============================================================
if ( ! function_exists( 'blog_way_sanitize_positive_integer' ) ) :

	/**
	 * Sanitize positive integer.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $input Number to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int Sanitized number; otherwise, the setting default.
	 */
	function blog_way_sanitize_positive_integer( $input, $setting ) {

		$input = absint( $input );

		// If the input is an absolute integer, return it.
		// otherwise, return the default.
		return ( $input ? $input : $setting->default );

	}

endif;

//=============================================================
// Check if related post is active
//=============================================================
if ( ! function_exists( 'blog_way_is_relative_posts_active' ) ) :

	/**
	 * Check if show related posts is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function blog_way_is_relative_posts_active( $control ) {

		if ( true == $control->manager->get_setting( 'show_related_posts' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;