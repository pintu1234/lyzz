<?php
/**
 * Custom widgets.
 *
 * @package Blog_Way
 */

if ( ! function_exists( 'blog_way_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function blog_way_load_widgets() {
        
        //Author Profile
        register_widget( 'Blog_Way_Author_Widget' );

        //Social Links
        register_widget( 'Blog_Way_Social_Widget' );

        //Extended Recent Posts
        register_widget( 'Blog_Way_Extended_Recent_Posts_Widget' );

        //Popular Posts
        register_widget( 'Blog_Way_Popular_Posts_Widget' );

    }

endif;

add_action( 'widgets_init', 'blog_way_load_widgets' );


//Author Profile Widget
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/author-profile.php';

//Social Links Widget
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/social-links.php';

//Extended Recent Posts Widget
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/extended-recent-posts.php';

//Popular Posts Widget
require_once trailingslashit( get_template_directory() ) . '/inc/widgets/popular-posts.php';