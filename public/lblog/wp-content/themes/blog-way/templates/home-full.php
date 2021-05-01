<?php
/**
 * Template Name: Home Full Image
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog_way
 */

get_header(); 

	/**
	 * Hook - blog_way_before_primary.
	 *
	 * @hooked blog_way_before_primary_action - 10
	 */
	do_action( 'blog_way_before_primary' );

	$posts_per_page = get_option('posts_per_page');

	$paged 			= (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args = array(
			   'post_type'		=>'post',
			   'posts_per_page' => absint( $posts_per_page ),
			   'paged'			=> $paged
			);

	$temp 		= $wp_query;
	$wp_query   = null;
	$wp_query 	= new WP_Query($args);


	if ( $wp_query->have_posts() ) :

		if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

		<?php
		endif;

			while ( $wp_query->have_posts() ) : $wp_query->the_post();

				get_template_part( 'template-parts/content-full', get_post_format() );

			endwhile;

		get_template_part( 'template-parts/content', 'pagination' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; 

	$wp_query = null;
	$wp_query = $temp;

	/**
	 * Hook - blog_way_after_primary.
	 *
	 * @hooked blog_way_after_primary_action - 10
	 */
	do_action( 'blog_way_after_primary' );

	/**
	 * Hook - blog_way_sidebar.
	 *
	 * @hooked blog_way_sidebar_action - 10
	 */
	do_action( 'blog_way_sidebar' );

get_footer();