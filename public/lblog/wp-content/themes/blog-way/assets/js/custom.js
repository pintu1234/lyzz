jQuery(document).ready(function ($) {

    $('#site-navigation').meanmenu({
        meanMenuOpen: "<span></span><span></span><span></span>",
    	meanScreenWidth: "767",
    }); 

    // Go to top.
    var $scroll_obj = $( '#btn-scrollup' );
    $( window ).scroll(function(){
    	if ( $( this ).scrollTop() > 100 ) {
    		$scroll_obj.fadeIn();
    	} else {
    		$scroll_obj.fadeOut();
    	}
    });

    $scroll_obj.click(function(){
    	$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
    	return false;
    });  

    //sticky sidebar
    var main_body_ref = $("body");
    
    if( main_body_ref.hasClass( 'global-sticky-sidebar' ) ){
        $( '.main-content-area, .main-sidebar' ).theiaStickySidebar();
    }

});

