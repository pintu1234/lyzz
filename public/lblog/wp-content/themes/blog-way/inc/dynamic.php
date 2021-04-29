<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Way
 */

if ( ! function_exists( 'blog_way_dynamic_options' ) ) :

    function blog_way_dynamic_options(){

    $body_color                 =  blog_way_get_option( 'body_color' );
    $site_title_color           =  blog_way_get_option( 'site_title_color' );
    $site_description_color     =  blog_way_get_option( 'site_description_color' );
    $button_color               =  blog_way_get_option( 'button_color' );
    $scrollup_color             =  blog_way_get_option( 'scrollup_color' );
    $headings_color             =  blog_way_get_option( 'headings_color' );
    $meta_color                 =  blog_way_get_option( 'meta_color' );
    $anchor_color               =  blog_way_get_option( 'anchor_color' );
    $header_bg_color            =  blog_way_get_option( 'header_bg_color' );
    $menu_color                 =  blog_way_get_option( 'menu_color' );
    $menu_hover_color           =  blog_way_get_option( 'menu_hover_color' );
    $footer_bg_color            =  blog_way_get_option( 'footer_bg_color' );
    $footer_text_color          =  blog_way_get_option( 'footer_text_color' );


    $bg_color                   = get_background_color();
    ?>               
    <style>
        body{
            color: <?php echo esc_attr( $body_color ); ?>;
        }

        .site-title a{
            color: <?php echo esc_attr( $site_title_color ); ?>;
        }

        .site-description{
            color: <?php echo esc_attr( $site_description_color ); ?>;
        }

        h1,
        h2, 
        h3,
        h4, 
        h5,
        h6,
        .entry-header h2.entry-title a,
        .related-posts .news-item.three-column-item .news-text-wrap h2 a{
            color: <?php echo esc_attr( $headings_color ); ?>;
        }

        #primary .cat-links a{
            color: <?php echo esc_attr( $meta_color ); ?>;
        }

        .author-info-wrap .author-content-wrap a.authors-more-posts,
        .blog_way_widget_author .author-profile a.btn-continue,
        .content-area a{
            color: <?php echo esc_attr( $anchor_color ); ?>;
        }

        header#masthead,
        .main-navigation ul ul,
        .mean-container .mean-bar{
            background: <?php echo esc_attr( $header_bg_color ); ?>;
        }

        .main-navigation ul li a,
        #masthead .main-navigation ul li ul li a,
        #masthead .main-navigation li.current_page_item ul li a,
        a.meanmenu-reveal.meanclose{
            color: <?php echo esc_attr( $menu_color ); ?>;
        }

        #masthead .main-navigation ul li ul.sub-menu li ul.sub-menu li a{
            color: <?php echo esc_attr( $menu_color ); ?>;
        }

        .mean-container a.meanmenu-reveal span{
            background: <?php echo esc_attr( $menu_color ); ?>;
        }

        #masthead .main-navigation li.current-menu-item a,
        #masthead .main-navigation li.current_page_item a,
        .main-navigation ul.menu li:hover a,
        #masthead .main-navigation ul li ul li:hover a,
        #masthead .main-navigation li.current_page_item ul li:hover a,
        #masthead .main-navigation ul li ul.sub-menu li ul.sub-menu li:hover a,
        #masthead .main-navigation ul li ul.sub-menu li ul.sub-menu li.current-menu-item a{
            color: <?php echo esc_attr( $menu_hover_color ); ?>;
        }
    
        .widget .widget-title{
            background: #<?php echo esc_attr( $bg_color ); ?>;
        }

        .site-footer,
        .footer-social .menu-social-menu-container #menu-social-menu{
            background: <?php echo esc_attr( $footer_bg_color ); ?>;
        }
        .site-info,
        .site-info a{
            color: <?php echo esc_attr( $footer_text_color ); ?>;
        }

        button, 
        input[type="button"], 
        input[type="reset"], 
        input[type="submit"], 
        .nav-links .nav-previous a, 
        .nav-links .nav-next a,
        .nav-links .page-numbers,
        .pagination .page-numbers.next, 
        .pagination .page-numbers.previous{
            border: 1px solid <?php echo esc_attr( $button_color ); ?>;
            background: <?php echo esc_attr( $button_color ); ?>;
        }

        .scrollup {
            background-color: <?php echo esc_attr( $scrollup_color ); ?>;
        }

    </style>

<?php }

endif;

add_action( 'wp_head', 'blog_way_dynamic_options' );