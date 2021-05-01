<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Way
 */

	/**
	 * Hook - blog_way_after_content.
	 *
	 * @hooked blog_way_after_content_action - 10
	 */
	do_action( 'blog_way_after_content' );

?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php 

		/**
		* Hook - blog_way_footer_widgets.
		*
		* @hooked blog_way_footer_widgets_action - 10
		*/
		do_action( 'blog_way_footer_widgets' );

		/**
		* Hook - blog_way_social_menu.
		*
		* @hooked blog_way_social_menu_action - 10
		*/
		do_action( 'blog_way_social_menu' );
		
		/**
		* Hook - blog_way_before_footer_info.
		*
		* @hooked blog_way_before_footer_info_action - 10
		*/
		do_action( 'blog_way_before_footer_info' );

		/**
		* Hook - blog_way_copyright.
		*
		* @hooked blog_way_copyright_action - 10
		*/
		do_action( 'blog_way_copyright' );

		/**
		* Hook - blog_way_credit.
		*
		* @hooked blog_way_credit_action - 10
		*/
		do_action( 'blog_way_credit' );

		/**
		* Hook - blog_way_after_footer_info.
		*
		* @hooked blog_way_after_footer_info_action - 10
		*/
		do_action( 'blog_way_after_footer_info' );
		?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>