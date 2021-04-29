jQuery( document ).ready( function( $ ) {
"use strict";

    /////////////////////////////////
    // Instagram 
    /////////////////////////////////
    jQuery("ul.instagram-pics li img").delay(150).animate({"opacity": "1"}, 100);

    /////////////////////////////////
    // Slider Featured Articles
    /////////////////////////////////
    jQuery(".featured-articles-slider").hide().css({'left' : "0px"}).fadeIn(1000); // fade effect for images, lovely.
    jQuery('.featured-articles-slider').bxSlider({
            slideWidth: 275,
            minSlides: 1,
            maxSlides: 4,
            auto: true,
            autoHover: true,
            nextSelector: '#slider-next',
            prevSelector: '#slider-prev',
            nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>',
            slideMargin: 0,
            controls: true,
            autoControls: true
          }); 

    /////////////////////////////////
    // Slider Random Articles Footer
    /////////////////////////////////
    jQuery(".random-articles-slider").hide().css({'left' : "0px"}).fadeIn(1000); // fade effect for images, lovely.
    jQuery('.random-articles-slider').bxSlider({
            slideWidth: 275,
            minSlides: 1,
            maxSlides: 4,
            auto: true,
            autoHover: true,
            nextSelector: '#slider-next2',
            prevSelector: '#slider-prev2',
            nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>',
            slideMargin: 0,
            controls: true,
            autoControls: true
          }); 


    /////////////////////////////////
    // Slider Related Articles Footer
    /////////////////////////////////
    jQuery(".related-articles-slider").hide().css({'left' : "0px"}).fadeIn(1000); // fade effect for images, lovely.
    jQuery('.related-articles-slider').bxSlider({
            slideWidth: 275,
            minSlides: 1,
            maxSlides: 2,
            auto: true,
            autoHover: true,
            nextSelector: '#slider-next3',
            prevSelector: '#slider-prev3',
            nextText: '<i class="fa fa-chevron-right"></i>',
            prevText: '<i class="fa fa-chevron-left"></i>',
            slideMargin: 0,
            controls: true,
            autoControls: true
          }); 


    /////////////////////////////////
    // Accordion 
    /////////////////////////////////       
    jQuery(".accordionButton").click(function(){jQuery(".accordionButton").removeClass("on");jQuery(".accordionContent").slideUp("normal");if(jQuery(this).next().is(":hidden")==true){jQuery(this).addClass("on");jQuery(this).next().slideDown("normal")}});jQuery(".accordionButton").mouseover(function(){jQuery(this).addClass("over")}).mouseout(function(){jQuery(this).removeClass("over")});jQuery(".accordionContent").hide(); 

    /////////////////////////////////
    // Go to TOP & Prev/Next Article.
    /////////////////////////////////
    // hide #back-top first
    jQuery("#back-top, .prev-articles").hide();
    
    // fade in #back-top
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 100) {
                jQuery('#back-top, .prev-articles').fadeIn();
            } else {
                jQuery('#back-top, .prev-articles').fadeOut();
            }
        });

        // scroll body to 0px on click
        jQuery('#back-top a').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    /////////////////////////////////
    // Sticky Header
    /////////////////////////////////
    var stickyNavTop = jQuery('.main-header').offset().top;    
    var stickyNav = function(){  
    var scrollTop = jQuery(window).scrollTop();  
           
    if (scrollTop > stickyNavTop) {   
        jQuery('.main-header').addClass('sticky');  
    } else {  
        jQuery('.main-header').removeClass('sticky');   
    }  
    };  
    stickyNav();  
    jQuery(window).scroll(function() { stickyNav(); });
    
}); // jQuery(document).