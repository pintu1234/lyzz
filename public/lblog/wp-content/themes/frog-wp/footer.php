<?php
    // Options from admin panel
    global $smof_data;

    $loader_image = $smof_data['loader-image'];
    if (empty($loader_image)) { $loader_image = get_template_directory_uri().'/images/ajax-loader.gif'; }     
    $home_pag_select = (isset($smof_data['home_pag_select'])) ? $smof_data['home_pag_select'] : 'Infinite Scroll';
?> 

<!-- Begin Footer -->
<footer class="full-width">
    <div class="full-width links-map">
        <div class="container">
            <div>
                <img src="http://127.0.0.1:8000/images/Logo-white.png" width="80" />
                <p class="full-width">Unadulterated, Unpretentious, Unbothered, Unapologetic, Whatever Comes to mind, Uncensored, all me. It's Whatever, Lyzz</p>
            </div>
            <div>
                <h2 class="full-width title2"><span>QUICK LINKS</span></h2>
                <ul>
                    <li><a href="http://127.0.0.1:8000">Home</a></li>
                    <li><a href="http://127.0.0.1:8000/blogs">Blog</a></li>
                    <li><a href="http://127.0.0.1:8000/contact-us">Contact</a></li>
                </ul>
            </div>
            <div>
                <h2 class="full-width title2"><span>CONTACT INFO</span></h2>
                <div class="full-width address">
                    <p><strong>Phone:</strong><br>In Your Hands or Back Pocket I Suppose</p>
                    <p><strong>Address:</strong><br /> Somewhere in My Mind</p>
                    <p><strong>Email :</strong><br /><a href="mailto:Lyzz@WhateverLyzz.com">Lyzz@WhateverLyzz.com</a></p>
                </div>
            </div>
            <div class="flex_p">
                <img src="http://127.0.0.1:8000/images/img.png" class="full-width" style="max-width: 275px;margin-bottom: 5px;" />
                <p style="font-size:12px;padding:0!important;">(we don't own the rights to this image)</p>
            </div>
        </div>
    </div>
    <div class="copyright">© Copyright 2020 Whatever Lyzz.</div>
    <div class="social-icons w_100">
        <a href=""><i class="icon-facebook" target="_blank"></i></a>
        <a href="https://www.linkedin.com/company/whateverlyzz" target="_blank"><i class="icon-linkedin"></i></a>
        <a href="https://twitter.com/WhateverLyzz" target="_blank"><i class="icon-twitter"></i></a>
        <a href="https://www.instagram.com/whateverlyzz/" target="_blank"><i class="icon-instagram"></i></a>
    </div>
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