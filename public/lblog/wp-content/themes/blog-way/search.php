<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blog_Way
 */

get_header(); 
	/**
	 * Hook - blog_way_before_primary.
	 *
	 * @hooked blog_way_before_primary_action - 10
	 */
	do_action( 'blog_way_before_primary' );
?>

	<?php
	if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
			<?php 
			/* translators: used search keyword */
			printf( esc_html__( 'Search Results for: %s', 'blog-way' ), '<span>' . get_search_query() . '</span>' ); 
			?>
			</h1>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		get_template_part( 'template-parts/content', 'pagination' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

<?php
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