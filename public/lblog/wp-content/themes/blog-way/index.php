<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blog_Way
 */
get_header(); 

/**
 * Hook - blog_way_before_primary.
 *
 * @hooked blog_way_before_primary_action - 10
 */
do_action('blog_way_before_primary');
?>

    <?php
if (have_posts()) :

    //if (is_home() && !is_front_page()) :
    $header_enabled = blog_way_get_option('seo_h1_title_set');    
    if($header_enabled == true) : 
        ?>
        <header id="seo_header_title">
            <h1 class="page-title"><?php do_action('blog_way_home_title'); ?></h1>
        </header>

        <?php
    endif;

    $list_type = blog_way_get_option('list_type');

    if ('full' == $list_type) {

        while (have_posts()) : the_post();

            get_template_part('template-parts/content-full', get_post_format());

        endwhile;
    }else {

        while (have_posts()) : the_post();

            get_template_part('template-parts/content', get_post_format());

        endwhile;
    }

    get_template_part('template-parts/content', 'pagination');

else :

    get_template_part('template-parts/content', 'none');

endif;
?>

<?php
/**
 * Hook - blog_way_after_primary.
 *
 * @hooked blog_way_after_primary_action - 10
 */
do_action('blog_way_after_primary');

/**
 * Hook - blog_way_sidebar.
 *
 * @hooked blog_way_sidebar_action - 10
 */
do_action('blog_way_sidebar');

get_footer();
