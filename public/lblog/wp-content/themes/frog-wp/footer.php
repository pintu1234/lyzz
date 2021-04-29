<?php
    // Options from admin panel
    global $smof_data;

    $loader_image = $smof_data['loader-image'];
    if (empty($loader_image)) { $loader_image = get_template_directory_uri().'/images/ajax-loader.gif'; }     
    $home_pag_select = (isset($smof_data['home_pag_select'])) ? $smof_data['home_pag_select'] : 'Infinite Scroll';
?> 

<!-- Begin Footer -->
<footer> 

	<div class="social-section">
	    <!-- footer social icons. -->
	    <?php if (!empty($smof_data['bottom_icons'])) { ?>
	        <?php echo stripslashes($smof_data['bottom_icons']); ?>
	    <?php } ?>
	</div>

	<div class="wrap-footer">
      <!-- Begin random articles on slide -->
      <div class="featured-articles">

        <div class="featured-title">
            <h3><?php _e('Random Articles', 'anthemes'); ?></h3>
            <div class="slide-nav">
              <span id="slider-prev2"></span>
              <span id="slider-next2"></span>
            </div><!-- end .slide-nav -->          
        </div><!-- end .featured-title --> 
               
        <ul class="random-articles-slider">
        <?php $footertop = new WP_Query(array('orderby' => 'rand', 'posts_per_page' => 12 )); // number to display more / less ?>
        <?php while ($footertop->have_posts()) : $footertop->the_post(); ?> 

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
          <?php endwhile; wp_reset_query(); ?> 
        </ul><!-- end .random-articles-slider -->        
      </div> <div class="clear"></div> <!-- end .featured-articles -->



        <div class="one_fourth">
            <?php if ( ! dynamic_sidebar( 'footer1' ) ) : endif; ?><!-- #1st footer -->
        </div>
        <div class="one_fourth">
            <?php if ( ! dynamic_sidebar( 'footer2' ) ) : endif; ?><!-- #2nd footer -->
        </div>
        <div class="one_fourth">
            <?php if ( ! dynamic_sidebar( 'footer3' ) ) : endif; ?><!-- #3rd footer -->
        </div>
        <div class="one_fourth_last">
            <?php if ( ! dynamic_sidebar( 'footer4' ) ) : endif; ?><!-- #4th footer -->
        </div><div class="clear"></div>        
 

        <div class="copyright">
          <?php if (!empty($smof_data['copyright_footer'])) { ?>
              <?php echo stripslashes($smof_data['copyright_footer']); ?>
          <?php } ?>  
        </div>
    </div>
	<p id="back-top" style="display: block;"><a href="#top"><span></span></a></p>
</footer><!-- end #footer -->

<!-- Menu & link arrows -->
<script type="text/javascript">var jquerycssmenu={fadesettings:{overduration:0,outduration:100},buildmenu:function(b,a){jQuery(document).ready(function(e){var c=e("#"+b+">ul");var d=c.find("ul").parent();d.each(function(g){var h=e(this);var f=e(this).find("ul:eq(0)");this._dimensions={w:this.offsetWidth,h:this.offsetHeight,subulw:f.outerWidth(),subulh:f.outerHeight()};this.istopheader=h.parents("ul").length==1?true:false;f.css({top:this.istopheader?this._dimensions.h+"px":0});h.children("a:eq(0)").css(this.istopheader?{paddingRight:a.down[2]}:{}).append('<img src="'+(this.istopheader?a.down[1]:a.right[1])+'" class="'+(this.istopheader?a.down[0]:a.right[0])+'" style="border:0;" />');h.hover(function(j){var i=e(this).children("ul:eq(0)");this._offsets={left:e(this).offset().left,top:e(this).offset().top};var k=this.istopheader?0:this._dimensions.w;k=(this._offsets.left+k+this._dimensions.subulw>e(window).width())?(this.istopheader?-this._dimensions.subulw+this._dimensions.w:-this._dimensions.w):k;i.css({left:k+"px"}).fadeIn(jquerycssmenu.fadesettings.overduration)},function(i){e(this).children("ul:eq(0)").fadeOut(jquerycssmenu.fadesettings.outduration)})});c.find("ul").css({display:"none",visibility:"visible"})})}};var arrowimages={down:['downarrowclass', '<?php echo get_template_directory_uri(); ?>/images/menu/arrow-down.png'], right:['rightarrowclass', '<?php echo get_template_directory_uri(); ?>/images/menu/arrow-right.png']}; jquerycssmenu.buildmenu("myjquerymenu", arrowimages);</script>

<?php if ($home_pag_select == 'Infinite Scroll') { ?>
<!-- Infinite scroll (default) -->
<script>jQuery(window).load(function(b){jQuery("#infinite-articles, .sidebar, .sidebar-middle").masonry();var a=jQuery("#infinite-articles");a.imagesLoaded(function(){a.masonry({itemSelector:".blog-ex1, .blog-ex2, .ex34"})});a.infinitescroll({navSelector:"#nav-below",nextSelector:"#nav-below a",itemSelector:".blog-ex1, .blog-ex2, .ex34",loading:{msgText:"",finishedMsg:"",img:"<?php echo ($loader_image); ?>"}},function(c){var d=jQuery(c).css({opacity:0});d.imagesLoaded(function(){d.animate({opacity:1});a.masonry("appended",d,true)})})});</script>
<?php } else { ?>
<script>jQuery( window ).load( function( $ ) {"use strict"; var $container = jQuery('#infinite-articles, .sidebar, .sidebar-middle'); $container.imagesLoaded( function(){ $container.masonry({ itemSelector : '' }); });});</script>
<?php } ?>

<!-- Google analytics  -->
<?php if( !empty( $smof_data['google_analytics']) ) { echo stripslashes($smof_data['google_analytics']); } ?>

<!-- Footer Theme output -->
<?php wp_footer();?>
</body>
</html>