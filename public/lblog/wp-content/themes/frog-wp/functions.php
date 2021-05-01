<?php
// ------------------------------------------------ 
// ---------- Options Framework Theme -------------
// ------------------------------------------------
 require_once ('admin/index.php'); 

// ----------------------------------------------
// --------------- Load Scripts -----------------
// ----------------------------------------------
 include("functions/scripts.php");

// ---------------------------------------------- 
// --------------- Load Custom Widgets ----------
// ----------------------------------------------
 include("functions/widgets.php");
 include("functions/widgets/widget-tags.php");
 include("functions/widgets/widget-posts.php");
 include("functions/widgets/widget-top-posts.php");
 include("functions/widgets/widget-cat.php");
 include("functions/widgets/widget-feedburner.php");
 include("functions/widgets/widget-review.php");
 include("functions/widgets/widget-review-rand.php");
 include("functions/widgets/widget-review-recent.php");
 include("functions/widgets/widget-categories.php");
 include("functions/widgets/widget-banner.php");
 include("functions/widgets/widget-top-posts-30days.php");

 
// ----------------------------------------------
// --------------- Load Custom ------------------
// ---------------------------------------------- 
   include("functions/custom/comments.php");
  

// ----------------------------------------------
// ------ Content width -------------------------
// ----------------------------------------------
if ( ! isset( $content_width ) ) $content_width = 950;


// ----------------------------------------------
// ------ Post thumbnails ----------------------- 
// ----------------------------------------------
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumbnail-blog-small', 180, 180, true ); // Blog thumbnails home small
    add_image_size( 'thumbnail-blog-big', 620, 280, true ); // Blog thumbnails home big
    add_image_size( 'thumbnail-blog-featured', 275, 150, true ); // Blog thumbnails home featured posts
    add_image_size( 'thumbnail-blog-masonry', 250, '', true ); // Blog thumbnails home masonry style
    add_image_size( 'thumbnail-widget', 250, 130, true ); // Sidebar Widget thumbnails
    add_image_size( 'thumbnail-widget-small', 55, 55, true ); // Sidebar Widget thumbnails small
	add_image_size( 'thumbnail-single-image', 950, '', true ); // Single thumbnails
}

// ----------------------------------------------
// ------ title tag ----------------------------
// ----------------------------------------------
 add_theme_support( 'title-tag' );

 
// ----------------------------------------------
// ------ feed links ----------------------------
// ----------------------------------------------
 add_theme_support( 'automatic-feed-links' );
 

// ----------------------------------------------
// ---- Makes Theme available for translation ---
// ----------------------------------------------
load_theme_textdomain( 'anthemes', get_template_directory() . '/languages' );

// ----------------------------------------------
// -------------- Register Menu -----------------
// ----------------------------------------------

add_theme_support( 'nav-menus' );
add_action( 'init', 'register_my_menus_anthemes' );

function register_my_menus_anthemes() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Header Navigation', 'anthemes' ),
            'secondary-menu' => __( 'Categories Navigation', 'anthemes' ),
        )
    );
}


// ------------------------------------------------ 
// ---- Add  rel attributes to embedded images ----
// ------------------------------------------------ 
function insert_rel_frog_wp($content) {
    $pattern ='/<a(.*?)href=("|")(.*?).(bmp|gif|jpeg|jpg|png)("|")(.*?)>/i';
    $replacement = '<a$1href=$2$3.$4$5 data-fslightbox="gallery1">';
    $content = preg_replace( $pattern, $replacement, $content );
    return $content;
}
add_filter( 'the_content', 'insert_rel_frog_wp' );


// ------------------------------------------------ 
// --- Pagination class/style for entry articles --
// ------------------------------------------------ 
function custom_nextpage_links_anthemes($defaults) {
$args = array(
'before' => '<div class="my-paginated-posts"><p>' . '<span>',
'after' => '</span></p></div>',
);
$r = wp_parse_args($args, $defaults);
return $r;
}
add_filter('wp_link_pages_args','custom_nextpage_links_anthemes');


// ------------------------------------------------ 
// ------------ Nr of Topics for Tags -------------
// ------------------------------------------------  
function tag_cloud_count_anthemes($content, $tags, $args)
{ 
  $count=0;
  $output=preg_replace_callback('(</a\s*>)', 
  function($match) use ($tags, &$count) {
      return "<span class=\"tagcount\"> ".$tags[$count++]->count."</span></a>";  
  }
  , $content);
  
  return $output;
}
add_filter('wp_generate_tag_cloud','tag_cloud_count_anthemes', 10, 3); 


// ------------------------------------------------ 
// --------------- Posts Time Ago -----------------
// ------------------------------------------------  

function time_ago_anthemes( $type = 'post' ) {
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
    return human_time_diff($d('U'), current_time('timestamp')) . " ";
}




// ----------------------------------------------
// ---------- excerpt length adjust -------------
// ----------------------------------------------
function anthemes_excerpt($str, $length, $minword = 3)
{
    $sub = '';
    $len = 0;
    
    foreach (explode(' ', $str) as $word)
    {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        
        if (strlen($word) > $minword && strlen($sub) >= $length)
        {
            break;
        }
    }
    
    return $sub . (($len < strlen($str)) ? ' ..' : '');
}
 


// ------------------------------------------------ 
// ------------ Number of post views --------------
// ------------------------------------------------

 // function to display number of posts.
function getPostViews_anthemes($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

// function to count views.
function setPostViews_anthemes($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// ------------------------------------------------ 
// ------------ Meta Box --------------------------
// ------------------------------------------------
$prefix = 'anthemes_';
global $meta_boxes;
$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
    'id' => 'standard',
    'title' => __( 'Article Page Options', 'anthemes' ),
    'context' => 'normal',
    'priority' => 'high',
    'autosave' => true,

    // Youtube
    'fields' => array(
        // TEXT
        array(
            // Field name - Will be used as label
            'name'  => __( 'Video Youtube', 'anthemes' ),
            // Field ID, i.e. the meta key
            'id'    => "{$prefix}youtube",
            // Field description (optional)
            'desc'  => __( 'Add Youtube code ex: HIrMIeN5ttE', 'anthemes' ),
            'type'  => 'text',
            // Default value (optional)
            'std'   => __( '', 'anthemes' ),
            // CLONES: Add to make the field cloneable (i.e. have multiple value)
            'clone' => false,
        ),


    // Vimeo
        // TEXT
        array(
            // Field name - Will be used as label
            'name'  => __( 'Video Vimeo', 'anthemes' ),
            // Field ID, i.e. the meta key
            'id'    => "{$prefix}vimeo",
            // Field description (optional)
            'desc'  => __( 'Add Vimeo code ex: 7449107', 'anthemes' ),
            'type'  => 'text',
            // Default value (optional)
            'std'   => __( '', 'anthemes' ),
            // CLONES: Add to make the field cloneable (i.e. have multiple value)
            'clone' => false,
        ),

    // Gallery
        // IMAGE UPLOAD
        array(
            'name' => __( 'Gallery', 'anthemes' ),
            'id'   => "{$prefix}slider",
            // Field description (optional)
            'desc'  => __( 'Image with any size!', 'anthemes' ),            
            'type' => 'image_advanced',
        ),

    // Hide Featured Image
        // CheckBox
        array(
            'name' => __( 'Featured Image', 'anthemes' ),
            'id'   => "{$prefix}hideimg",
            'desc'  => __( 'Hide Featured Image on single page for this article', 'anthemes' ),
            'type' => 'checkbox',
        ),


    ),

);



/**
 * Register meta boxes
 *
 * @return void
 */
function anthemes_register_meta_boxes()
{
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if ( !class_exists( 'RW_Meta_Box' ) )
        return;

    global $meta_boxes;
    foreach ( $meta_boxes as $meta_box )
    {
        new RW_Meta_Box( $meta_box );
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'anthemes_register_meta_boxes' );


// ------------------------------------------------ 
// ------------ Notice ----------------------------
// ------------------------------------------------
function themes_admin_notice(){
    global $pagenow;
    if ( $pagenow == 'themes.php' ) {
         echo '<div class="notice notice-info is-dismissible" style="box-shadow: 0 1px 5px rgba(0,0,0,0.2); ">
             <p><a class="button activate" href="https://anthemes.com/theme/the-frog/" target="_blank">The Frog</a> <a class="button activate" href="https://anthemes.com/docs/the-frog/" target="_blank">Docs</a> <a class="button activate" href="https://anthemes.com/docs/the-frog/changelog/" target="_blank">Changelog</a></p>
         </div>';
    }
}
add_action('admin_notices', 'themes_admin_notice');


// ------------------------------------------------ 
// --- One Click Demo Import (Plugin) -------------
// --- You can delete this part if you wish -v3.2--
// ------------------------------------------------ 
function frog_wp_plugin_intro_text( $frog_wp_default_text ) {
    $frog_wp_default_text =  /* https://wordpress.org/plugins/one-click-demo-import/faq/ the inline style is added for the demo import plugin, that is displayed via Dashboard > Appearance. */ '<div class="ocdi__intro-text" style="width:355px;">'. esc_html__( 'Please click "Import Demo Data" button only once and wait, it can take a couple of minutes.', 'anthemes' ) .'</div>';?><br /><img style="width:400px; margin-bottom: 20px; border-radius: 4px;" src="<?php echo get_template_directory_uri(); ?>/screenshot.png" width="400" hieght="300" alt="img" /><br /> In the meantime, you check the <a href="https://anthemes.com/docs/the-frog/" target="_blank">help file</a> or <a href="https://anthemes.com/support/" target="_blank">get support</a>.<?php
    return $frog_wp_default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'frog_wp_plugin_intro_text' );

function frog_wp_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Main Demo', 'anthemes' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . '/functions/demo/frog-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/functions/demo/frog-widgets.wie',
        ) 
    );
}
add_filter( 'pt-ocdi/import_files', 'frog_wp_import_files' );


// ------------------------------------------------ 
// ---------- TGM_Plugin_Activation -------------
// ------------------------------------------------ 
require_once dirname( __FILE__ ) . '/functions/custom/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {

    $plugins = array(
         array(
            'name'                  => 'Shortcodes', // The plugin name
            'slug'                  => 'anthemes-shortcodes', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/plugins/anthemes-shortcodes.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => 'Reviews', // The plugin name
            'slug'                  => 'anthemes-reviews', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/plugins/anthemes-reviews.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => 'Thumbs Likes System', // The plugin name
            'slug'                  => 'thumbs-rating', // The plugin slug (typically the folder name)
            'source'                => get_stylesheet_directory() . '/plugins/thumbs-rating.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => 'Meta Box',
            'slug'                  => 'meta-box',
            'required'              => true,
            'version'               => '',
        ),

        array(
            'name'                  => 'Custom Sidebars',
            'slug'                  => 'custom-sidebars',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => 'Daves WordPress Live Search',
            'slug'                  => 'daves-wordpress-live-search',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => 'Multi-column Tag Map',
            'slug'                  => 'multi-column-tag-map',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => 'Responsive Menu',
            'slug'                  => 'responsive-menu',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => 'Cresta Social Share Counter',
            'slug'                  => 'cresta-social-share-counter',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => 'AccessPress Anonymous Post',
            'slug'                  => 'accesspress-anonymous-post',
            'required'              => false,
            'version'               => '',
        ),
        
        array(
            'name'                  => 'WP-PageNavi',
            'slug'                  => 'wp-pagenavi',
            'required'              => false,
            'version'               => '',
        ),

        array(
            'name'                  => 'One Click Demo Import',
            'slug'                  => 'one-click-demo-import',
            'required'              => false,
            'version'               => '',
        ), 

    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'tgmpa';
    $config = array(
        'domain'            => $theme_text_domain,          // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                          // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',                // Default parent menu slug
        'parent_url_slug'   => 'themes.php',                // Default parent URL slug
        'menu'              => 'install-required-plugins',  // Menu slug
        'has_notices'       => true,                        // Show admin notices or not
        'is_automatic'      => false,                       // Automatically activate plugins after installation or not
        'message'           => '',                          // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => esc_html__( 'Install Required Plugins', 'anthemes' ),
            'menu_title'                                => esc_html__( 'Install Plugins', 'anthemes' ),
            'installing'                                => esc_html__( 'Installing Plugin: %s', 'anthemes' ), // %1$s = plugin name
            'oops'                                      => esc_html__( 'Something went wrong with the plugin API.', 'anthemes' ),
            'return'                                    => esc_html__( 'Return to Required Plugins Installer', 'anthemes' ),
            'plugin_activated'                          => esc_html__( 'Plugin activated successfully.', 'anthemes' ),
            'complete'                                  => esc_html__( 'All plugins installed and activated successfully. %s', 'anthemes' ), // %1$s = dashboard link
            'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );

}

?>