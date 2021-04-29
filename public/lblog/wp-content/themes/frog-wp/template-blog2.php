<?php 
/* 
Template Name: Template - Home Small thumbnails
*/ 
?>
<?php get_header(); // add header  ?>
<?php
    // Options from admin panel
    global $smof_data;

    if (empty($smof_data['featured-posts'])) { $smof_data['featured-posts'] = '8'; }
    $home_pag_select = (isset($smof_data['home_pag_select'])) ? $smof_data['home_pag_select'] : 'Infinite Scroll';
?>

<!-- Begin Wrap Content -->
<div class="wrap-fullwidth">

      <!-- Begin Featured articles on slide -->
      <div class="featured-articles">
        
        <div class="featured-title">
            <h3><?php _e('Featured Articles', 'anthemes'); ?></h3>
            <div class="slide-nav">
              <span id="slider-prev"></span>
              <span id="slider-next"></span>
            </div><!-- end .slide-nav -->          
        </div><!-- end .featured-title -->  

        <ul class="featured-articles-slider">
          <?php  query_posts( array( 'post_type' => 'post', 'tag' => 'featured', 'posts_per_page' => $smof_data['featured-posts'] ) );  ?> 
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 

            <li <?php post_class('post-slide') ?> id="post-<?php the_ID(); ?>">
                <?php if ( has_post_thumbnail()) { ?>
                    <div class="article-category"><i></i> <?php $category = get_the_category(); if ($category) 
                        { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" class="tiptipBlog" title="' . sprintf( __( "View all posts in %s", "anthemes" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';}  ?>
                    </div><!-- end .article-category -->
                    <?php the_post_thumbnail('thumbnail-blog-featured', array('title' => "")); ?>
                <?php } // Post Thumbnail ?>

                <div class="title-box">
                    <span><?php the_author_posts_link(); ?></span>
                    <?php if(function_exists('taqyeem_get_score')) { ?> <?php taqyeem_get_score(); ?> <?php } ?>                    
                    <div class="clear"></div>
                    <h2><a href="<?php the_permalink(); ?>"><?php if ( strlen(get_the_title()) > 60 ) { echo mb_substr(get_the_title(), 0, 56)." ..."; } else { the_title(''); } ?></a></h2>
                </div>

            </li><!-- end .post-slide --> 
          <?php endwhile; endif; wp_reset_query(); ?> 
        </ul><!-- end .featured-articles-slider --> 
      
        <div class="clear"></div>             
      </div><!-- end .featured-articles -->



    <!-- Begin Main Home Content -->
    <div id="infinite-articles" class="home-content js-masonry">

        <?php if (have_posts()) : while (have_posts()) : the_post(); 
            $thecontent = get_the_content();
            if(!empty($thecontent)) { ?>        
                <div class="home-content"><?php the_content(''); // content ?></div>
            <?php } ?>
        <?php endwhile; endif; ?>

        <?php
            if ( get_query_var('paged') )  {  $paged = get_query_var('paged'); 
            } elseif ( get_query_var('page') ) { $paged = get_query_var('page');
            } else { $paged = 1;  }
            query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
            if (have_posts()) : while (have_posts()) : the_post();
        ?>
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