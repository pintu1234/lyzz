<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Way
 */

?>
<?php
	/**
	 * Hook - blog_way_doctype.
	 *
	 * @hooked blog_way_doctype_action - 10
	 */
	do_action( 'blog_way_doctype' );
?>
<head>
<?php
	/**
	 * Hook - blog_way_head.
	 *
	 * @hooked blog_way_head_action - 10
	 */
	do_action( 'blog_way_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(function_exists('wp_body_open')){
	wp_body_open();
} ?>
	<div id="page" class="site">
		<?php
		/**
		* Hook - blog_way_before_header.
		*
		* @hooked blog_way_before_header_action - 10
		*/
		do_action( 'blog_way_before_header' );

		/**
		* Hook - blog_way_header.
		*
		* @hooked blog_way_header_action - 10
		*/
		do_action( 'blog_way_header' );

		/**
		* Hook - blog_way_after_header.
		*
		* @hooked blog_way_after_header_action - 10
		*/
		do_action( 'blog_way_after_header' );

		/**
		* Hook - blog_way_site_branding.
		*
		* @hooked blog_way_site_branding_action - 10
		*/
		do_action( 'blog_way_site_branding' );

		/**
		* Hook - blog_way_before_content.
		*
		* @hooked blog_way_before_content_action - 10
		*/
		do_action( 'blog_way_before_content' );