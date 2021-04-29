<?php 
/* 
Template Name: Template - Home Grid Style
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
    <div class="wrap-content">
        
        <ul id="infinite-articles" class="masonry_list js-masonry">

        <?php
            if ( get_query_var('paged') )  {  $paged = get_query_var('paged'); 
            } elseif ( get_query_var('page') ) { $paged = get_query_var('page');
            } else { $paged = 1;  }
            query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
            if (have_posts()) : while (have_posts()) : the_post();
        ?>

            <li <?php post_class('ex34') ?> id="post-<?php the_ID(); ?>">

                  <?php if ( has_post_thumbnail()) { ?>
                    <div class="article-category"><i></i> <?php $category = get_the_category(); if ($category) 
                      { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" class="tiptipBlog" title="' . sprintf( __( "View all posts in %s", "anthemes" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';}  ?>
                    </div><!-- end .article-category -->    
                    <a href="<?php the_permalink(); ?>"> <?php echo the_post_thumbnail('thumbnail-widget'); ?> </a> 
                <?php } else { ?> 
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-img-2.png" alt="article image" /></a> 
                    <div class="article-category"><i></i> <?php $category = get_the_category(); if ($category) 
                      { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" class="tiptipBlog" title="' . sprintf( __( "View all posts in %s", "anthemes" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';}  ?>
                    </div><!-- end .article-category -->                  
                <?php } // Post Thumbnail ?>  <div class="clear"></div>  

                  <div class="an-widget-title">
                    <h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <?php if(function_exists('taqyeem_get_score')) { ?>
                        <?php taqyeem_get_score(); ?>
                      <?php } ?>                    
                    <span><?php _e('Written by', 'anthemes'); ?> <?php the_author_posts_link(); ?></span> <i class="fa fa-check-circle"></i>
                  </div> 
            </li>
        <?php endwhile; endif; ?>
        </ul>  


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



    <!-- Begin Sidebar 1 (default right) -->
    <?php get_sidebar(); // add sidebar ?>
    <!-- end #sidebar 1 (default right) --> 

        
<div class="clear"></div>
</div><!-- end .wrap-fullwidth -->

<?php get_footer(); // add footer  ?>