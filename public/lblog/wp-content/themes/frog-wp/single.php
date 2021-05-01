<?php get_header(); // add header ?>  
<?php
    // Options from admin panel
    global $smof_data;
?>


<!-- Begin Content -->
<div class="wrap-fullwidth">


    <div class="single-content">

        <?php if (!empty($smof_data['header_728'])) { ?>
        <div class="single-box">
            <div class="single-money">
            <?php echo stripslashes($smof_data['header_728']); ?>
            </div>
        </div><div class="clear"></div>
        <?php } ?>
        <ul class="single-breadcrumbs">
            <li><a href="<?php echo home_url( '/' ); ?>"><?php _e('Home', 'anthemes'); ?></a> <i class="fa fa-angle-double-right"></i></li>
            <li><?php $category = get_the_category(); if ($category) { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" class="tiptipBlog" title="' . sprintf( __( "View all posts in %s", "anthemes" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';}  ?> <i class="fa fa-angle-double-right"></i></li>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        </ul>
        <div class="clear"></div>
        <!-- end .single-box -->



    <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
    <div class="entry-top">
        <h1 class="article-title entry-title"><?php the_title(); ?></h1> 
        <span><?php _e('Written by', 'anthemes'); ?> <?php the_author_posts_link(); ?></span> <i class="fa fa-check-circle"></i>
    </div><div class="clear"></div>
    <?php endwhile; endif; ?>


        <article>
            <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
            <?php setPostViews_anthemes(get_the_ID()); ?>
            <div <?php post_class('post') ?> id="post-<?php the_ID(); ?>">

            <div class="media-single-content">
            <?php if ( function_exists( 'rwmb_meta' ) ) {  
            // If Meta Box plugin is activate ?>
                <?php
                $youtubecode = rwmb_meta('anthemes_youtube', true );
                $vimeocode = rwmb_meta('anthemes_vimeo', true );
                $image = rwmb_meta('anthemes_slider', true );
                $hideimg = rwmb_meta('anthemes_hideimg', true );
                ?> 

                <?php if(!empty($image)) { ?>
                    <!-- #### Single Gallery #### -->
                    <div class="single-gallery">
                        <?php
                        $images = rwmb_meta( 'anthemes_slider', 'type=image&size=thumbnail-blog-small' );
                        foreach($images as $key =>$image)
                         { echo "<a href='{$image['full_url']}' data-fslightbox='gallery1'><img src='{$image['url']}'  alt='{$image['alt']}' /></a>";
                        } ?>
                    </div><!-- end .single-gallery --> 
                <?php } ?>

                <?php if(!empty($youtubecode)) { ?>
                    <!-- #### Youtube video #### -->
                    <iframe class="single_iframe" width="720" height="420" src="//www.youtube.com/embed/<?php echo $youtubecode; ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
                <?php } ?>

                <?php if(!empty($vimeocode)) { ?>
                    <!-- #### Vimeo video #### -->
                    <iframe class="single_iframe" src="//player.vimeo.com/video/<?php echo $vimeocode; ?>?portrait=0" width="720" height="420" frameborder="0" allowFullScreen></iframe>
                <?php } ?>

                <?php if(!empty($image) || !empty($youtubecode) || !empty($vimeocode)) { ?>
                <?php } elseif ( has_post_thumbnail()) { ?>
                    <?php if(!empty($hideimg)) { } else { ?>
                     <?php the_post_thumbnail('thumbnail-single-image'); ?>
                    <?php } // disable featured image ?>
                <?php } ?>

            <?php } else { 
            // Meta Box Plugin ?>
                <?php the_post_thumbnail('thumbnail-single-image'); ?>
            <?php } ?> 
            </div><!-- end .media-single-content -->

                    <div class="entry">
                        <!-- entry content -->
                        <div class="author-right-meta">
                            <div class="aut-img">
                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 60 ); ?></a>
                            </div>
                            <ul class="aut-meta">
                                <li class="name"><div class="vcard author"><span class="fn"><?php the_author_posts_link(); ?></span></div></li>
                                <li class="time updated"><?php echo time_ago_anthemes(); ?> <?php _e('ago', 'anthemes'); ?></li>
                                <li class="like sleft"><?php if (function_exists('thumbs_rating_getlink')) { echo thumbs_rating_getlink(); } ?></li>
                            </ul>    
                        </div><!-- end .author-right-media -->
                        <div class="p-first-letter">
                            <?php the_content(''); // content ?>
                        </div><!-- end .p-first-letter -->
                        <?php wp_link_pages(); // content pagination ?>
                        <div class="clear"></div>

                        <!-- tags -->
                        <?php $tags = get_the_tags(); 
                        if ($tags): ?>
                            <div class="ct-size"><?php the_tags(__('<div class="entry-btn">Article Tags:</div>', 'anthemes'),' &middot; '); // tags ?></div><div class="clear"></div>
                        <?php endif; ?>

                        <!-- categories -->
                        <?php $categories = get_the_category(); 
                        if ($categories): ?>
                            <div class="ct-size"><?php _e( '<div class="entry-btn">Article Categories:</div>', 'anthemes' ); ?> <?php the_category(' &middot; '); // categories ?></div><div class="clear"></div>
                        <?php endif; ?>

                        <div class="clear"></div>                        
                    </div><!-- end .entry -->
                    <div class="clear"></div> 
            </div><!-- end #post -->
            <?php endwhile; endif; ?>
        </article><!-- end article -->



        <!-- Related Articles -->
        <?php $tags = wp_get_post_tags($post->ID);  
        if ($tags) { ?>
        <div class="single-related">
          <!-- Begin related articles on slide -->
          <div class="related-articles">

            <div class="related-title">
                <h3><?php _e('Related Articles', 'anthemes'); ?></h3>
                <div class="slide-nav">
                  <span id="slider-prev3"></span>
                  <span id="slider-next3"></span>
                </div><!-- end .slide-nav -->          
            </div><!-- end .related-title -->
            
            <ul class="related-articles-slider">
                <?php  
                    $orig_post = $post;  
                    global $post;  
                                    
                    if ($tags) {  
                    $tag_ids = array();  
                    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
                    $args=array(  
                    'tag__in' => $tag_ids,  
                    'post__not_in' => array($post->ID),  
                    'posts_per_page'=>6, // Number of related posts to display.  
                    'ignore_sticky_posts'=>1  
                    );  
                                      
                    $my_query = new wp_query( $args );  
                                  
                    while( $my_query->have_posts() ) {  
                    $my_query->the_post();  
                ?>

                <li <?php post_class('post-slide') ?> id="post-<?php the_ID(); ?>">
                        <div class="article-category"><i></i> <?php $category = get_the_category(); if ($category) 
                            { echo '<a href="' . get_category_link( $category[0]->term_id ) . '" class="tiptipBlog" title="' . sprintf( __( "View all posts in %s", "anthemes" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';}  ?>
                        </div><!-- end .article-category -->                
                    <?php if ( has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail('thumbnail-blog-featured', array('title' => "")); ?>
                    <?php } else { ?> 
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="article image" /></a> 
                    <?php } // Post Thumbnail ?> 


                    <div class="title-box">
                        <span><?php the_author_posts_link(); ?></span>
                        <?php if(function_exists('taqyeem_get_score')) { ?> <?php taqyeem_get_score(); ?> <?php } ?>                    
                        <div class="clear"></div>
                        <h2><a href="<?php the_permalink(); ?>"><?php if ( strlen(get_the_title()) > 60 ) { echo mb_substr(get_the_title(), 0, 56)." ..."; } else { the_title(''); } ?></a></h2>
                    </div>

                </li><!-- end .post-slide --> 
              <?php } } $post = $orig_post; wp_reset_query(); ?> 
            </ul><!-- end .related-articles-slider --> 
            
          </div> <div class="clear"></div> <!-- end .related-articles -->
        </div><?php } ?><!-- end .single.related -->



        <!-- Prev and Next articles -->
        <div class="prev-articles">
            <ul class="article_list">
            <?php
            $previousPost = get_previous_post(true);
            if ($previousPost) {
                $args = array(
                    'posts_per_page' => 1,
                    'include' => $previousPost->ID
                );
            $previousPost = get_posts($args);
            foreach ($previousPost as $post) {
                setup_postdata($post);
            ?>
              <li>
                  <a href="<?php the_permalink(); ?>"> <?php echo the_post_thumbnail('thumbnail-widget-small'); ?> </a>
                  <div class="an-widget-title" <?php if ( has_post_thumbnail()) { ?> style="margin-left:70px;" <?php } ?>>
                    <h4 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <?php if(function_exists('taqyeem_get_score')) { ?>
                        <?php taqyeem_get_score(); ?>
                      <?php } ?>                    
                    <span><?php _e('by', 'anthemes'); ?> <?php the_author_posts_link(); ?></span> <i class="fa fa-check-circle"></i>
                  </div>
              </li>

            <?php wp_reset_postdata();
            } //end foreach
            } else { 
            $nextPost = get_next_post(true);
            if ($nextPost) {
                $args = array(
                    'posts_per_page' => 1,
                    'include' => $nextPost->ID
                );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post);
            ?>
              <li>
                  <a href="<?php the_permalink(); ?>"> <?php echo the_post_thumbnail('thumbnail-widget-small'); ?> </a>
                  <div class="an-widget-title" <?php if ( has_post_thumbnail()) { ?> style="margin-left:70px;" <?php } ?>>
                    <h4 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <?php if(function_exists('taqyeem_get_score')) { ?>
                        <?php taqyeem_get_score(); ?>
                      <?php } ?>                    
                    <span><?php _e('by', 'anthemes'); ?> <?php the_author_posts_link(); ?></span> <i class="fa fa-check-circle"></i>
                  </div>
              </li>
            <?php
                    wp_reset_postdata();
                    } //end foreach
                } // end if
            } // else
            ?>
            </ul><!-- end .article_list -->
        </div><div class="clear"></div>
        <!-- end .prev-articles --> 

 
        <!-- Comments -->
        <div class="entry-bottom">
            <?php if (get_comments_number()==0) { 
            } else { ?>
                <h3 class="title"><i></i> <?php _e( 'Comments', 'anthemes' ); ?></h3>
            <?php } ?>            
            
            <!-- Comments -->
            <div id="comments" class="comments">
                <?php comments_template('', true); // comments ?>
            </div>
            <div class="clear"></div>
        </div><!-- end .entry-bottom -->

    </div><!-- end .single-content -->


    <!-- Begin Sidebar (right) -->
    <?php  get_sidebar(); // add sidebar ?>
    <!-- end #sidebar  (right) -->    


    <div class="clear"></div>
</div><!-- end .wrap-fullwidth  -->

<?php get_footer(); // add footer  ?>