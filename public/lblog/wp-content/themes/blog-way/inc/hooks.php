<?php
/**
 * Load hooks.
 *
 * @package Blog_Way
 */
/** Hookes Used
 *
 * blog_way_doctype
 * blog_way_head
 * blog_way_before_header  
 * blog_way_header 
 * blog_way_after_header 
 * blog_way_site_branding
 * blog_way_before_content
 * blog_way_after_content
 * blog_way_footer_widgets
 * blog_way_social_menu 
 * blog_way_before_footer_info_action
 * blog_way_copyright 
 * blog_way_credit
 * blog_way_after_footer_info_action
 * blog_way_before_primary
 * blog_way_after_primary
 * blog_way_before_secondary
 * blog_way_after_secondary
 * blog_way_related_post
 * blog_way_author_info
 */

//=============================================================
// Doctype hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function blog_way_doctype_action() {
    ?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
    }
endif;

add_action( 'blog_way_doctype', 'blog_way_doctype_action', 10 );

//=============================================================
// Head hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_head_action' ) ) :
    /**
     * Header hook of the theme.
     *
     * @since 1.0.0
     */
    function blog_way_head_action() {
    ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;

add_action( 'blog_way_head', 'blog_way_head_action', 10 );

//=============================================================
// Before header hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_before_header_action' ) ) :
    /**
     * Header Start.
     *
     * @since 1.0.0
     */
    function blog_way_before_header_action() {

        // Sticky status.
        $sticky         = blog_way_get_option( 'sticky' ); 
        $sticky_class   = (1 != $sticky ) ? 'navbar-fixed-top' : '';

        ?><header id="masthead" class="site-header <?php echo $sticky_class; ?>" role="banner"><div class="container"><div class="row"><?php
    }
endif;

add_action( 'blog_way_before_header', 'blog_way_before_header_action' );

//=============================================================
// Header main hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_header_action' ) ) :

    /**
     * Site Header.
     *
     * @since 1.0.0
     */
    function blog_way_header_action() {
        ?>
    	<div class="col-sm-12">
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php 
                wp_nav_menu( 
                    array( 
                        'theme_location'    => 'primary', 
                        'menu_id'           => 'primary-menu', 
                        'fallback_cb'       => 'blog_way_menu_fallback' 
                    ) 
                ); 
                ?>
            </nav>
        </div>
        <?php
    }

endif;

add_action( 'blog_way_header', 'blog_way_header_action' );

//=============================================================
// After header hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_after_header_action' ) ) :
    /**
     * Header End.
     *
     * @since 1.0.0
     */
    function blog_way_after_header_action() {
       
    ?></div><!-- .row --></div><!-- .container --></header><!-- #masthead --><?php
    }
endif;
add_action( 'blog_way_after_header', 'blog_way_after_header_action' );

//=============================================================
// Site branding hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_site_branding_action' ) ) :
    /**
     * Site branding.
     *
     * @since 1.0.0
     */
    function blog_way_site_branding_action() {

        // Custom image.
        $header_image = get_header_image();

        if( $header_image ){

            $header_style = 'style="background-image: url('.esc_url( $header_image ).');"';
            $header_class = 'banner-enabled';

        } else{

            $header_style = '';
            $header_class = 'banner-disabled';

        }

        $overlay_option = blog_way_get_option('overlay');

        if( 1 === absint( $overlay_option ) ){

            $overlay_class = 'overlay-enabled';

        }else{

            $overlay_class = '';
        }


        ?>
        <div class="main-banner <?php echo $header_class.' '.$overlay_class; ?>" <?php echo $header_style; ?>>
            <div class="container">
                <div class="row">
                    <div class="site-branding">
                        <?php
                        $logo_option = blog_way_get_option('site_identity');

                        if( 'logo-only' == $logo_option && function_exists( 'the_custom_logo' ) ){  

                            the_custom_logo(); 

                        }elseif( 'logo-title' == $logo_option ){

                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            } 
                           
                            ?>
                            
                            <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>

                            <?php

                            $description = get_bloginfo( 'description', 'display' );

                            if ( $description || is_customize_preview() ) : ?>

                                <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                                <?php
                            endif; 

                        }else{ 
                            ?>

                            <h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                           
                            <?php
                            $description = get_bloginfo( 'description', 'display' );

                            if ( $description || is_customize_preview() ) : ?>

                                <h3 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h3>

                                <?php
                            endif; 

                        } ?>
                    </div><!-- .site-branding -->
                </div>
            </div>
        </div><!-- .main-banner -->
        <?php
    }
endif;
add_action( 'blog_way_site_branding', 'blog_way_site_branding_action' );

//=============================================================
// Before content hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_before_content_action' ) ) :
    /**
     * Content Start.
     *
     * @since 1.0.0
     */
    function blog_way_before_content_action() {
    ?><div id="content" class="site-content"><div class="container"><div class="row"><?php
    }
endif;
add_action( 'blog_way_before_content', 'blog_way_before_content_action' );

//=============================================================
// After content hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_after_content_action' ) ) :
    /**
     * Content End.
     *
     * @since 1.0.0
     */
    function blog_way_after_content_action() {
    ?></div><!-- .row --></div><!-- .container --></div><!-- #content --><?php    
    }
endif;
add_action( 'blog_way_after_content', 'blog_way_after_content_action' );

//=============================================================
// Social menu hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_social_menu_action' ) ) :

    function blog_way_social_menu_action(){ 
        
        if( has_nav_menu( 'social' ) ) { ?>
            <div class="footer-social">
                <div class="container">
                    <div class="row">
                        <?php 
                        wp_nav_menu( array(
                            'theme_location' => 'social',
                            'depth'          => 1,
                            'container'      => 'div',
                            'container_class'=> 'social-menu-wrap',
                            'link_before'    => '<span class="screen-reader-text">',
                            'link_after'     => '</span>',
                        ) ); ?>
                    </div>
                </div>
            </div>
        <?php
        } 
    }

endif;

add_action( 'blog_way_social_menu', 'blog_way_social_menu_action', 10 );

//=============================================================
// Footer widgets hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_footer_widgets_action' ) ) :

    function blog_way_footer_widgets_action(){ 

        if ( is_active_sidebar( 'footer-1' ) ||
             is_active_sidebar( 'footer-2' ) ||
             is_active_sidebar( 'footer-3' ) ||
             is_active_sidebar( 'footer-4' ) ){ ?> 
            <div id="footer-widgets" class="widget-area">
                <div class="container">
                    <?php
                    $column_count = 0;
                    for ( $i = 1; $i <= 4; $i++ ) {
                        if ( is_active_sidebar( 'footer-' . $i ) ) {
                            $column_count++;
                        }
                    }

                    $col_divide = 12/$column_count;

                     $column_class = 'widget-column col-sm-' . absint( $col_divide );
                     for ( $i = 1; $i <= 4 ; $i++ ) {
                        if ( is_active_sidebar( 'footer-' . $i ) ) {
                            ?>
                            <div class="<?php echo $column_class; ?>">
                                <?php dynamic_sidebar( 'footer-' . $i ); ?>
                            </div>
                            <?php
                        }
                     }
                     ?>
                </div><!-- .container -->
            </div><!-- #footer-widgets -->
            <?php
        }
    }

endif;

add_action( 'blog_way_footer_widgets', 'blog_way_footer_widgets_action', 10 );

//=============================================================
// Before footer info hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_before_footer_info_action' ) ) :

    function blog_way_before_footer_info_action(){ 
        ?><div class="site-info"><div class="container"><div class="row"><?php
    }

endif;

add_action( 'blog_way_before_footer_info', 'blog_way_before_footer_info_action', 10 );

//=============================================================
// After footer info hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_after_footer_info_action' ) ) :
    
    function blog_way_after_footer_info_action() {
       
        ?></div><!-- .row --></div><!-- .container --></div><!-- .site-info --><?php
    }
endif;

add_action( 'blog_way_after_footer_info', 'blog_way_after_footer_info_action' );

//=============================================================
// Copyright hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_copyright_action' ) ) :

    function blog_way_copyright_action(){ 
        ?> 
        <div class="col-md-6 col-sm-6">
            <?php 
            $copyright = blog_way_get_option('copyright');

            if( !empty( $copyright )){ ?>

                <div class="copyright-text">

                    <?php echo wp_kses_data( $copyright ); ?>

                </div>

                <?php

            } ?> 
        </div>
        <?php
    }

endif;

add_action( 'blog_way_copyright', 'blog_way_copyright_action', 10 );

//=============================================================
// Credit info hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_credit_action' ) ) :

    function blog_way_credit_action(){ 
        ?> 
        <div class="col-md-6 col-sm-6">     
            <div class="credit-text">             
                <?php 
                /* translators: 1: name of theme, 2: Link of theme author */
                printf( esc_html__( '%1$s by %2$s', 'blog-way' ), 'Blog Way', '<a href="https://www.prodesigns.com/" rel="designer" target="_blank">ProDesigns</a>' ); 
                ?>
            </div>
        </div>
        <?php
    }

endif;

add_action( 'blog_way_credit', 'blog_way_credit_action', 10 );

//=============================================================
// Before primary hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_before_primary_action' ) ) :

    function blog_way_before_primary_action(){

        // Add class for sidebar layout.
        $global_layout  = blog_way_get_option( 'global_layout' );

        if('no-sidebar' === $global_layout || is_page_template( 'templates/page-fullwidth.php' ) ){
            $col_class      = 'col-sm-12 layout-' . esc_attr( $global_layout );
        } else{
            $col_class      = 'col-md-8 col-sm-12 layout-' . esc_attr( $global_layout );
        }
        ?><div class="<?php echo $col_class; ?> main-content-area"><div id="primary" class="content-area"><main id="main" class="site-main" role="main"><?php
    }

endif;

add_action( 'blog_way_before_primary', 'blog_way_before_primary_action', 10 );

//=============================================================
// After primary hook of the theme
//=============================================================
if ( ! function_exists( 'blog_way_after_primary_action' ) ) :

    function blog_way_after_primary_action(){ 
        ?></main><!-- #main --></div><!-- #primary --></div><!-- .col-md-8 --><?php
    }

endif;

add_action( 'blog_way_after_primary', 'blog_way_after_primary_action', 10 );

//=============================================================
// Related post hook of the theme
//=============================================================

if ( ! function_exists( 'blog_way_related_post_action' ) ) :

    function blog_way_related_post_action(){ 

        $show_related_posts = blog_way_get_option( 'show_related_posts' );

        if( 1 == $show_related_posts ){
        
            $post_id = get_the_ID();

            $categories = get_the_category( $post_id );  

            if( $categories ) {

                $category_ids = array();

                foreach( $categories as $category ) {

                    $category_ids[] = $category->term_id;

                }

                $args = array(
                            'category__in'   => $category_ids,
                            'post__not_in'   => array( $post_id ),
                            'posts_per_page' => 3,                                
                        );

                $related_query = new WP_Query( $args );

                if( $related_query->have_posts() ) { ?>

                    <div class="related-posts">

                        <?php

                        $related_post_title = blog_way_get_option( 'related_posts_text' ); 

                        if( !empty( $related_post_title ) ){  ?>

                            <h3 class="related-posts-title"><?php echo esc_html( $related_post_title ); ?></h3>

                            <?php

                        } ?>
                        
                        <div class="inner-wrapper">
                            <?php 
                            while( $related_query->have_posts()){
                                
                                $related_query->the_post(); ?>  

                                <div class="news-item three-column-item">
                                    <div class="news-thumb">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-way-common'); ?></a>   
                                    </div><!-- .news-thumb --> 

                                   <div class="news-text-wrap">
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                         <span class="posted-date"><?php echo esc_html( get_the_date() ); ?></span>
                                   </div><!-- .news-text-wrap -->
                                </div><!-- .news-item -->

                                <?php                
                            } 

                            wp_reset_postdata(); ?>
                        </div>

                    </div>
                     
                    <?php           
                }
            }
        }
    }

endif;

add_action( 'blog_way_related_post', 'blog_way_related_post_action', 10 );


//=============================================================
// Author info hook of the theme
//=============================================================

if ( ! function_exists( 'blog_way_author_info_action' ) ) :

    function blog_way_author_info_action(){ 

        $show_author_info = blog_way_get_option( 'show_author_info' );

        if( 1 == $show_author_info ){ ?>

            <div class="author-info-wrap">

                <div class="author-thumb">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), '100' ); ?>
                </div>

                <div class="author-content-wrap">
                    
                    <div class="author-header">
                         <h3 class="author-name"><?php printf( esc_attr__( 'About %s', 'blog-way' ), get_the_author() );?></h3>
                    </div><!-- .author-header -->

                    <div class="author-content">
                        <div class="author-desc"><?php the_author_meta( 'description' ); ?></div>
                        <a class="authors-more-posts" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php printf( esc_html__( 'View all posts by %s &rarr;', 'blog-way' ), esc_attr( get_the_author() ) ); ?></a>
                    </div><!-- .author-content -->
                    
                </div>
                
            </div>
                     
            <?php           
        }
    }

endif;

add_action( 'blog_way_author_info', 'blog_way_author_info_action', 10 );

//=============================================================
// Home page title
//=============================================================
add_action('blog_way_home_title','blog_way_home_title_action');
function blog_way_home_title_action(){    
    $seo_h1_title = blog_way_get_option('seo_h1_title');    
    printf(sanitize_text_field($seo_h1_title));
}
