<?php
/**
 * Core functions.
 *
 * @package Blog_way
 */

if ( ! function_exists( 'blog_way_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function blog_way_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = blog_way_get_default_theme_options();

		$default_value = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;

	}

endif;

if ( ! function_exists( 'blog_way_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function blog_way_get_default_theme_options() {

		$defaults = array();

		//Header
		$defaults['site_identity'] 			= 'title-text';
		$defaults['sticky'] 				= 0;
		$defaults['overlay'] 				= 1;

		// colors
		$defaults['body_color'] 			= '#404040';
		$defaults['site_title_color'] 		= '#222222';
		$defaults['site_description_color'] = '#818181';
		$defaults['button_color']			= '#202020';
		$defaults['scrollup_color']			= '#ea9920';
		$defaults['header_bg_color'] 		= '#202020';
		$defaults['menu_color'] 			= '#ffffff';
		$defaults['menu_hover_color'] 		= '#afafaf';
		$defaults['headings_color'] 		= '#404040';
		$defaults['meta_color'] 		    = '#ea9920';
		$defaults['anchor_color'] 		    = '#ea9920';
		$defaults['footer_bg_color'] 		= '#202020';
		$defaults['footer_text_color'] 	    = '#787878';

		$defaults['reset_colors']           = false;

		// Blog
		$defaults['enable_sticky_sidebar']  = false;
		$defaults['list_type']  			= 'default';
		$defaults['global_layout']  		= 'right-sidebar';
		$defaults['excerpt_length'] 		= 60;
        $defaults['category_meta']          = 1;
        $defaults['author_meta']            = 1;
        $defaults['date_meta']              = 1;
        $defaults['archive_prefix']         = 0;
        $defaults['read_more']              = esc_html__('Continue Reading', 'blog-way');

        //single post
        $defaults['featured_img_meta']      = 1;
        $defaults['single_category_meta']   = 1;
        $defaults['single_author_meta']     = 1;
        $defaults['single_date_meta']       = 1;
        $defaults['single_tags_meta']       = 1;
        $defaults['show_post_nav']          = 1;
        $defaults['show_author_info']       = 1;
        $defaults['show_related_posts']     = 1;
        $defaults['related_posts_text']     = esc_html__('Related Posts', 'blog-way');
		

		// Footer.
		$defaults['copyright'] 				= esc_html__( 'Copyright &copy; All rights reserved.', 'blog-way' );

		//Scroll Up
		$defaults['enable_scrollup'] 		= 0;
                $defaults['seo_h1_title_set'] 		= false;
                $defaults['seo_h1_title'] 		= '';

		return $defaults;
	}

endif;

//=============================================================
// Get all options in array
//=============================================================
if ( ! function_exists( 'blog_way_get_options' ) ) :

    /**
     * Get all theme options in array.
     *
     * @since 1.0.0
     *
     * @return array Theme options.
     */
    function blog_way_get_options() {

        $value = array();

        $value = get_theme_mods();

        return $value;

    }

endif;

//=============================================================
// Get only color options in array
//=============================================================
if ( ! function_exists( 'blog_way_get_default_color_options' ) ) :

    /**
     * Get default color options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function blog_way_get_default_color_options() {

        $defaults = array();

        $defaults['background_color']       = 'ffffff';
        $defaults['body_color'] 			= '#404040';
		$defaults['site_title_color'] 		= '#222222';
		$defaults['site_description_color'] = '#818181';
		$defaults['button_color']			= '#202020';
		$defaults['scrollup_color']			= '#ea9920';
		$defaults['header_bg_color'] 		= '#202020';
		$defaults['menu_color'] 			= '#ffffff';
		$defaults['menu_hover_color'] 		= '#afafaf';
		$defaults['headings_color'] 		= '#404040';
		$defaults['meta_color'] 		    = '#ea9920';
		$defaults['anchor_color'] 		    = '#ea9920';
		$defaults['footer_bg_color'] 		= '#202020';
		$defaults['footer_text_color'] 	    = '#787878';

        $defaults['reset_colors']           = false;

        return $defaults;
    }

endif;

//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'blog_way_reset_colors' ) ) :

    function blog_way_reset_colors( $data ) {

            $reset_colors = blog_way_get_option( 'reset_colors' );

            if ( true == $reset_colors ) {

                $options = blog_way_get_options();

                $options['reset_colors'] 		= false;

                $color_settings = blog_way_get_default_color_options();

                if ( ! empty( $color_settings ) ) {

                    foreach ( $color_settings as $key => $val ) {

                        $options[ $key ] = $val;

                    }
                }

                update_option( 'theme_mods_blog-way', $options );

            }

    }

endif;

add_action( 'customize_save_after', 'blog_way_reset_colors' );
