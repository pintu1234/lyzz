<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blog_Way
 */

//=============================================================
// Function to change default excerpt
//=============================================================
if ( ! function_exists( 'blog_way_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function blog_way_implement_excerpt_length( $length ) {

		$excerpt_length = blog_way_get_option( 'excerpt_length' );
		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}
		return $length;

	}
endif;

if ( ! function_exists( 'blog_way_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function blog_way_content_more_link( $more_link, $more_link_text ) {

		$read_more_text = blog_way_get_option( 'read_more' );
		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, $read_more_text, $more_link );
		}
		return $more_link;

	}

endif;

if ( ! function_exists( 'blog_way_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function blog_way_implement_read_more( $more ) {

		$output = $more;

		$read_more_text = blog_way_get_option( 'read_more' );

		if ( ! empty( $read_more_text ) ) {

			$output = '&hellip;<p><a href="' . esc_url( get_permalink() ) . '" class="btn-continue">' . esc_html( $read_more_text ) . '<span class="arrow-continue">&rarr;</span></a></p>';

		}

		return $output;

	}
endif;

if ( ! function_exists( 'blog_way_hook_read_more_filters' ) ) :

	/**
	 * Hook read more and excerpt length filters.
	 *
	 * @since 1.0.0
	 */
	function blog_way_hook_read_more_filters() {
		
		add_filter( 'excerpt_length', 'blog_way_implement_excerpt_length', 999 );
		add_filter( 'the_content_more_link', 'blog_way_content_more_link', 10, 2 );
		add_filter( 'excerpt_more', 'blog_way_implement_read_more' );

	}
endif;
add_action( 'wp', 'blog_way_hook_read_more_filters' );

//=============================================================
// Menu Fallback function
//=============================================================

if ( !function_exists('blog_way_menu_fallback') ) :

function blog_way_menu_fallback(){

	echo '<ul id="menu-main-menu" class="menu">';
		echo '<li class="menu-item"><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'blog-way' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 5,
		) );
		echo '</ul>';
	
}

endif;

//=============================================================
// Alter body class function
//=============================================================

function blog_way_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	$sticky = blog_way_get_option( 'sticky' ); 

	if( 1 != $sticky ){
		$classes[] = 'sticky-top';
	}

	// Add class for sticky sidebar.
	$sticky_sidebar = blog_way_get_option( 'enable_sticky_sidebar' );

	if( 1 == $sticky_sidebar ){

		$classes[] = 'global-sticky-sidebar';

	}
   	
	return $classes;
}

add_filter( 'body_class', 'blog_way_body_classes' );

//=============================================================
// Pingback function
//=============================================================
function blog_way_pingback_header() {

	if ( is_singular() && pings_open() ) {

		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';

	}
	
}

add_action( 'wp_head', 'blog_way_pingback_header' );

if ( ! function_exists( 'blog_way_footer_goto_top' ) ) :

	/**
	 * Add Go to top.
	 *
	 * @since 1.0.0
	 */
	function blog_way_footer_goto_top() {

		$enable_scrollup = blog_way_get_option( 'enable_scrollup' ); 

		if( 1 != $enable_scrollup ){

			echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up"></i></a>';

		}
	}
endif;
add_action( 'wp_footer', 'blog_way_footer_goto_top' );

//=============================================================
// Sidebar assigning hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_sidebar_action' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function blog_way_sidebar_action() {

		$global_layout = blog_way_get_option( 'global_layout' );
		$global_layout = apply_filters( 'blog_way_filter_theme_global_layout', $global_layout );

		// Include sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

	}
endif;

add_action( 'blog_way_sidebar', 'blog_way_sidebar_action' );

//=============================================================
// Change number of product per row
//=============================================================

if (!function_exists('blog_way_product_columns')) {

	function blog_way_product_columns() {

		return 3; // 3 products per row

	}
	
}

add_filter('loop_shop_columns', 'blog_way_product_columns');

//=============================================================
// Change number of related product
//=============================================================

function blog_way_related_products_args( $args ) {
	
	$args['posts_per_page'] = 3; // 3 related products
	
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'blog_way_related_products_args' );


//=============================================================
// Change number of upsell products
//=============================================================

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

add_action( 'woocommerce_after_single_product_summary', 'blog_way_output_upsells', 15 );

if ( ! function_exists( 'blog_way_output_upsells' ) ) {

	function blog_way_output_upsells() {

	    woocommerce_upsell_display( 3, 3 ); // Display 3 products in rows of 3
	    
	}

}

//=============================================================
// Hide archive page prefix
//=============================================================
if( ! function_exists( 'blog_way_archive_prefix_change' ) ):

	 function blog_way_archive_prefix_change( $title ) {

	 	$archive_prefix = blog_way_get_option( 'archive_prefix' );

	 	if( 1 === absint( $archive_prefix ) ){

	 		if ( is_category() ) {

	 		    $title = single_cat_title( '', false );

	 		} elseif ( is_tag() ) {

	 		    $title = single_tag_title( '', false );

	 		} elseif ( is_author() ) {

	 		    $title = '<span class="vcard">' . get_the_author() . '</span>';

	 		} elseif ( is_post_type_archive() ) {

	 		    $title = post_type_archive_title( '', false );

	 		} elseif ( is_tax() ) {

	 		    $title = single_term_title( '', false );

	 		}

	 	}

	 	return $title;

	 }

endif;

add_filter( 'get_the_archive_title', 'blog_way_archive_prefix_change');

//=============================================================
// Get custom excerpt length
//=============================================================
if ( ! function_exists( 'blog_way_get_the_excerpt' ) ) :

	/**
	 * Returns post excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length      Excerpt length in words.
	 * @param WP_Post $post_object The post object.
	 * @return string Post excerpt.
	 */
	function blog_way_get_the_excerpt( $length = 0, $post_object = null ) {
		global $post;

		if ( is_null( $post_object ) ) {
			$post_object = $post;
		}

		$length = absint( $length );
		if ( 0 === $length ) {
			return;
		}



		$source_content = $post_object->post_content;

		if ( ! empty( $post_object->post_excerpt ) ) {
			$source_content = $post_object->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}

endif;

//TGM Plugin activation.
require_once trailingslashit( get_template_directory() ) . '/inc/tgm/class-tgm-plugin-activation.php';
function blog_way_register_required_plugins() {
	
	$plugins = array(
		array(
            		'name'      => esc_html__( 'HubSpot All-In-One Marketing - Forms, Popups, Live Chat', 'blog-way' ),
			'slug'      => 'leadin',
			'required'  => false,
		),
	);

	tgmpa( $plugins );
}

add_action( 'tgmpa_register', 'blog_way_register_required_plugins' );