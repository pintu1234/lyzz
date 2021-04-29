<?php get_header(); // add header  ?>
<?php
    // Options from admin panel
    global $smof_data;

    $home_select = (isset($smof_data['home_select'])) ? $smof_data['home_select'] : 'Small Thumbnails';
    $home_pag_select = (isset($smof_data['home_pag_select'])) ? $smof_data['home_pag_select'] : 'Infinite Scroll';
?>
<!-- Begin Wrap Content -->
<div class="wrap-fullwidth">
 

    <!-- Begin Main Home Content -->
    <div id="infinite-articles" class="home-content js-masonry">


        <?php if (is_category()) { ?> 
            <div class="archive-header"><h3><?php _e( 'All posts in:', 'anthemes' ); ?> <strong><?php single_cat_title(''); ?></strong></h3><?php echo category_description(); ?></div>
        <?php } elseif (is_tag()) { ?>
            <div class="archive-header"><h3><?php _e( 'All posts tagged in:', 'anthemes' ); ?> <strong><?php single_tag_title(''); ?></strong></h3><?php echo tag_description(); ?></div>
        <?php } elseif (is_search()) { ?>
            <div class="archive-header"><h3><?php printf( __( 'Search Results for: %s', 'anthemes' ), '<strong>' . get_search_query() . '</strong>' ); ?></h3></div>
        <?php } elseif (is_author()) { ?>
            <?php if(get_the_author_meta('description') ): ?>
            <div class="archive-header"><h3><?php _e( 'All posts by:', 'anthemes' ); ?> <strong><?php the_author(); ?></strong></h3></div>
            <div class="author-meta">
                <div class="entry">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" class="author-nrposts"><?php echo number_format_i18n( get_the_author_posts() ); ?></a>
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?></a>
                    <div class="author-info">
                        <strong><?php the_author_posts_link(); ?></strong> &rsaquo; <a class="author-link" href="<?php the_author_meta('url'); ?>" target="_blank"><?php the_author_meta('url'); ?></a><br />
                        <p><?php the_author_meta('description'); ?></p>
                    </div><!-- end .autor-info -->
                </div><!-- end .entry -->
                <div class="clear"></div>
            </div><!-- end .author-meta -->
            <?php else: ?>
                <div class="archive-header"><h3><?php _e( 'All posts by:', 'anthemes' ); ?> <strong><?php the_author(); ?></strong></h3></div>
            <?php endif; ?>
        <?php } elseif (is_404()) { ?> 
            <div class="archive-header"><h3><?php _e('Error 404 - Not Found. <br />Sorry, but you are looking for something that isn\'t here.', 'anthemes'); ?></h3></div>
        <?php } ?> 

 
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if ($home_select == 'Small Thumbnails') { ?>   
     
        <article>
            <div <?php post_class('blog-ex2') ?> id="post-<?php the_ID(); ?>">

            <div class="ex2-content">

                <?php if ( has_post_thumbnail()) { ?>
                    <div class="article-category"><i></i> <?php $category = get_the_category(); if ($category) 
                            { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" class="tiptipBlog" title="' . sprintf( __( "View all posts in %s", "anthemes" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';}  ?>
                    </div><!-- end .article-category -->
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-blog-small', array('title' => "", 'class' => 'thumbnail_image')); ?></a>
                <?php } // end post_thumbnail ?> 

            
                    <div class="an-home-title" <?php if ( has_post_thumbnail()) { } else {?> style="width: auto;" <?php } ?>>
                        <h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php if(function_exists('taqyeem_get_score')) { ?>
                                    <?php
                                        $post_ft_type = get_post_meta($post->ID, 'post_ft_type', true);
                                        $post_review_score = get_review_score($post->ID);
                                        if(!empty($post_review_score))
                                        {
                                    ?>
                                    <div class="review_score">
                                        <?php taqyeem_get_score(); ?>
                                    </div>
                                <?php }} // Review Points ?>                        


                        <span><?php _e('Written by', 'anthemes'); ?> <?php the_author_posts_link(); ?></span> <i class="fa fa-check-circle"></i>
                        <p><?php echo anthemes_excerpt(strip_tags(strip_shortcodes(get_the_excerpt())), 150); ?></p>
                        <div class="an-read-more"><a href="<?php the_permalink(); ?>"><?php _e('Continue reading', 'anthemes'); ?></a></div>
                        <div class="clear"></div>
                    </div> <div class="clear"></div>

                    <div class="home-meta">
                        <div class="an-display-time"><i class="fa fa-clock-o"></i> <?php echo time_ago_anthemes(); ?> <?php _e('ago', 'anthemes'); ?></div>
                        <div class="an-display-view"><i class="fa fa-eye"></i> <?php echo getPostViews_anthemes(get_the_ID()); ?></div>      
                        <div class="an-display-comm"><i class="fa fa-comments"></i> <?php comments_popup_link('0 ' . __('Comments', 'anthemes') . '', '1 ' . __('Comment', 'anthemes') . '', '% ' . __('Comments', 'anthemes') . ''); ?></div>       
                        <div class="home-data">
                            <?php if (function_exists('thumbs_rating_getlink')) { echo thumbs_rating_getlink(); } ?>
                        </div><!-- end .home-data -->                        
                        <div class="clear"></div> 
                    </div><!-- Meta ( time and comments ) -->
                </div><!-- end .ex2-content -->

            </div><!-- Blog .blog-ex2 --> 
        </article><!-- end article -->

<?php } else { ?>

        <article>
            <div <?php post_class('blog-ex1') ?> id="post-<?php the_ID(); ?>">

                <?php if ( has_post_thumbnail()) { ?>
                    <div class="article-category"><i></i> <?php $category = get_the_category(); if ($category) 
                            { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" class="tiptipBlog" title="' . sprintf( __( "View all posts in %s", "anthemes" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';}  ?>
                    </div><!-- end .article-category -->
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-blog-big', array('title' => "", 'class' => 'thumbnail_image')); ?></a>
                <?php } // end post_thumbnail ?> 

                <div class="ex1-content">
                    <div class="an-home-title">
                        <h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php if(function_exists('taqyeem_get_score')) { ?>
                                    <?php
                                        $post_ft_type = get_post_meta($post->ID, 'post_ft_type', true);
                                        $post_review_score = get_review_score($post->ID);
                                        if(!empty($post_review_score))
                                        {
                                    ?>
                                    <div class="review_score">
                                        <?php taqyeem_get_score(); ?>
                                    </div>
                                <?php }} // Review Points ?>                        


                        <span><?php _e('Written by', 'anthemes'); ?> <?php the_author_posts_link(); ?></span> <i class="fa fa-check-circle"></i>
                    </div>

                    <div class="home-data">
                        <?php if (function_exists('thumbs_rating_getlink')) { echo thumbs_rating_getlink(); } ?>
                    </div><!-- end .home-data -->
                    <div class="clear"></div>
                    <p><?php echo anthemes_excerpt(strip_tags(strip_shortcodes(get_the_excerpt())), 200); ?></p>


                    <div class="home-meta">
                        <div class="an-display-time"><i class="fa fa-clock-o"></i> <?php echo time_ago_anthemes(); ?> <?php _e('ago', 'anthemes'); ?></div>
                        <div class="an-display-view"><i class="fa fa-eye"></i> <?php echo getPostViews_anthemes(get_the_ID()); ?></div>      
                        <div class="an-display-comm"><i class="fa fa-comments"></i> <?php comments_popup_link('0 ' . __('Comments', 'anthemes') . '', '1 ' . __('Comment', 'anthemes') . '', '% ' . __('Comments', 'anthemes') . ''); ?></div>       
                        <div class="an-read-more"><a href="<?php the_permalink(); ?>"><?php _e('Continue reading', 'anthemes'); ?></a></div><div class="clear"></div> 
                    </div><!-- Meta ( time and comments ) & read more link -->
                </div><!-- end .ex1-content -->

            </div><!-- Blog .blog-ex1 --> 
        </article><!-- end article -->

<?php } ?>

        <div class="clear"></div>
        <?php endwhile; endif; ?>


         <!-- Pagination -->
        <?php if ($home_pag_select == 'Infinite Scroll') { ?>
            <div id="nav-below" class="pagination" style="display: none;">
                    <div class="nav-previous"><?php previous_posts_link('&lsaquo; ' . __('Newer Entries', 'anthemes') . ''); ?></div>
                    <div class="nav-next"><?php next_posts_link('' . __('Older Entries', 'anthemes') . ' &rsaquo;'); ?></div>
            </div>
        <?php } else { // Infinite Scroll ?>
            <div class="clear"></div>
            <?php if(function_exists('wp_pagenavi')) { ?>
            <?php wp_pagenavi(); ?>
            <?php } else { ?>
            <div class="defaultpag">
                <div class="sright"><?php next_posts_link('' . __('Older Entries', 'anthemes') . ' &rsaquo;'); ?></div>
                <div class="sleft"><?php previous_posts_link('&lsaquo; ' . __('Newer Entries', 'anthemes') . ''); ?></div>
            </div>
            <?php } ?>
        <?php } // Default Pagination ?>
        <!-- pagination -->


    </div><!-- end .home-content -->


    <!-- Begin Sidebar 2 (left middle) -->
    <?php get_template_part('sidebar2'); ?>
    <!-- end #sidebar 2 (left) --> 


    <!-- Begin Sidebar 1 (default right) -->
    <?php get_sidebar(); // add sidebar ?>
    <!-- end #sidebar 1 (default right) --> 

        
<div class="clear"></div>
</div><!-- end .wrap-fullwidth -->

<?php get_footer(); // add footer  ?>