/* ===== 

You are free to modify this file but you should really create a folder in your
themes directory called (exactly) multi-column-tag-map and then copy this file 
to that folder. Make your edits to the copy. If you make your edits to the 
file in the plugins folder, all your edits will be overwritten if you update.

===== */ 

/* =====  version 17.0.14 ===== */ 

/* ===== equalize ===== */

bp1 = 0;
bp2 = 0;
bp3 = 0;
bp4 = 0;
bp5 = 0;
max = 1;

(function (jQuery) {
	jQuery.fn.mctagmapEqualHeights = function() {
		var max_height = 0;
		var currentHeight = 0;
		this.each(function() {
			currentHeight = jQuery(this).height();
			if(currentHeight > max_height) {
				max_height = currentHeight;
			}
		});
		this.each(function() {
			jQuery(this).delay(0).animate({'min-height' : max_height}, 0);
		});
	};
})(jQuery);

jQuery(document).ready(function(){
								
/* ==== toggle ==== */
  jQuery('a.less').hide();
  jQuery('ul.links li.hideli').hide();
  jQuery('ul.links li.morelink').show();
  jQuery(' a.more').click(function() {
	jQuery(this).parent().siblings('li.hideli').slideToggle('fast');
	 jQuery(this).parent('li.morelink').children('a.less').show();
	 jQuery(this).hide();
  });
    jQuery('a.less').click(function() {
	jQuery(this).parent().siblings('li.hideli').slideToggle('fast');
	 jQuery(this).parent('li.morelink').children('a.more').show();
	 jQuery(this).hide();
  });

/* ===== equalize ===== */
	var numberOfHoldLeftChildren = 0;
	var numberOfTagIndex = jQuery('.mcEqualize .holdleft').eq(0).children('.tagindex').length;
	while(numberOfHoldLeftChildren <= numberOfTagIndex){
		jQuery('.mcEqualize .holdleft').children('.tagindex:nth-child('+numberOfHoldLeftChildren+')').mctagmapEqualHeights();
	    numberOfHoldLeftChildren++;
	}


	
/* ==== test purposes 
jQuery('.tagindex').css({'background-color' : '#D9CBDB', 'margin-bottom' : '10px'});
==== */
 
		/* === responsive === */
		/* the width of the first item */
		if(typeof tagindexwidth != 'undefined'){
		tagindexwidth = parseInt(tagindexwidth, 10);
		} else {
			tagindexwidth = 0;
			maxColumns = 2;
		}
		jQuery('.tagindex').css({'min-width':tagindexwidth,'width':''});
		/* the maximum number of columns you want at fullscreen desktop */
		maxColumns = maxColumns;
		if(maxColumns > 5){
			maxColumns = 5;
		}
		if(maxColumns <= 0){
			maxColumns = 2;
		}
		max = 5 - maxColumns;
		/* make the breakpoints */
		bp5 = tagindexwidth * 5;
		bp4 = tagindexwidth * 4;
		bp3 = tagindexwidth * 3;
		bp2 = tagindexwidth * 2;
		bp1 = tagindexwidth * 1;
});

	/* === responsive === */
	jQuery(document).ready(myfunction);
	jQuery(window).on('resize',myfunction);
	function myfunction() {
		/* the width of the column container */
		hlw = jQuery('#mcTagMap .responsive').innerWidth();
		/* "media queries" */
		if(hlw > bp4){
			jQuery('#mcTagMap .responsive').css({'column-count':5 - max});
		}
		if(hlw <= bp5 && hlw > bp4){
			jQuery('#mcTagMap .responsive').css({'column-count':4 - max});
		}
		if(hlw <= bp4 && hlw > bp3){
			jQuery('#mcTagMap .responsive').css({'column-count':3 - max});
		}
		if(hlw <= bp3 && hlw > bp2){
			jQuery('#mcTagMap .responsive').css({'column-count':2 - max});
		}
		if(hlw <= bp2){
			jQuery('#mcTagMap .responsive').css({'column-count':1});
			jQuery('.tagindex').css({'min-width':0});
		}
	}
	
	
