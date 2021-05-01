<?php 
// Register widgetized areas
function theme_widgets_init() {

    register_sidebar( array (
		'name' => __( 'Home Sidebar (Left Middle)', 'anthemes' ),
		'id' => 'sidebar-middle',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="title"><i></i> ',
		'after_title' => '</h3><div class="clear"></div>',
	) );

    register_sidebar( array (
		'name' => __( 'Default Sidebar (Right)', 'anthemes' ),
		'id' => 'sidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="title"><i></i> ',
		'after_title' => '</h3><div class="clear"></div>',
	) );

    register_sidebar( array (
		'name' => __( 'Footer Sidebar 1', 'anthemes' ),
		'id' => 'footer1',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="title"><i></i> ',
		'after_title' => '</h3><div class="clear"></div>',
	) );

    register_sidebar( array (
		'name' => __( 'Footer Sidebar 2', 'anthemes' ),
		'id' => 'footer2',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="title"><i></i> ',
		'after_title' => '</h3><div class="clear"></div>',
	) );

    register_sidebar( array (
		'name' => __( 'Footer Sidebar 3', 'anthemes' ),
		'id' => 'footer3',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="title"><i></i> ',
		'after_title' => '</h3><div class="clear"></div>',
	) );

    register_sidebar( array (
		'name' => __( 'Footer Sidebar 4', 'anthemes' ),
		'id' => 'footer4',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget' => "</div>",
		'before_title' => '<h3 class="title"><i></i> ',
		'after_title' => '</h3><div class="clear"></div>',
	) );
}

add_action( 'init', 'theme_widgets_init' );
?>