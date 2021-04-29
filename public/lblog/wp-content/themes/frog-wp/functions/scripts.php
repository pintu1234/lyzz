<?php
// ----------------------------------------------
// ------------ JavaScrips Files ----------------
// ----------------------------------------------


if( !function_exists( 'anthemes_enqueue_scripts' ) ) {
    function anthemes_enqueue_scripts() {

		// Register css files
        wp_register_style( 'style', get_stylesheet_uri(), '', '3.6');
		wp_register_style( 'default', get_template_directory_uri() . '/css/colors/default.css', TRUE);
		wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', '', '3.6');
        wp_register_style( 'google-font', '//fonts.googleapis.com/css?family=Ruda:400,700', TRUE);
        wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', TRUE);

		
		// Register scripts
		wp_register_script( 'customjs', get_template_directory_uri() . '/js/custom.js', 'jquery', '', TRUE);
        wp_register_script( 'validatecontact', get_template_directory_uri() . '/js/jquery.validate.min.js', 'jquery', '', TRUE);
        wp_register_script( 'mainfiles',  get_template_directory_uri() . '/js/jquery.main.js', 'jquery', '', TRUE);

        // Display js files in Header via wp_head();
        wp_enqueue_style('style');
        wp_enqueue_style('default');
        wp_enqueue_style('responsive');
        wp_enqueue_style('google-font');
        wp_enqueue_style('font-awesome');
        wp_enqueue_script('jquery');

        // Load Comments & .js files.
        if( is_single() ) {
            wp_enqueue_script( 'fslightbox-basic', get_template_directory_uri() . '/functions/fslightbox-basic-3.2.1/fslightbox.js', array( 'jquery' ), '3.2.1', true );  
            wp_enqueue_script('comment-reply');
         }

        // Load js validate in contact and job page.
        if( is_page_template( 'template-contact.php' ) ) { 
            wp_enqueue_script('validatecontact');
         }

        // Load js for masonry style with infinite scroll.
        if( ! is_singular() || is_single() || is_page() || is_page_template( 'template-blog1.php') || is_page_template( 'template-blog2.php') || is_page_template( 'template-blog3.php') || is_page_template( 'template-blog4.php')) { 
            wp_enqueue_script('mainfiles');
         }
 
        // Display js and css files in Footer via wp_footer();
        wp_enqueue_script('customjs');
    }
    add_action('wp_enqueue_scripts', 'anthemes_enqueue_scripts');
}
?>