<?php

/**
 * Options.
 *
 * @package Blog_Way
 */
$default = blog_way_get_default_theme_options();

//Logo Options Setting Starts
$wp_customize->add_setting('site_identity', array(
    'default' => $default['site_identity'],
    'sanitize_callback' => 'blog_way_sanitize_select'
));

$wp_customize->add_control('site_identity', array(
    'type' => 'radio',
    'label' => esc_html__('Show', 'blog-way'),
    'section' => 'title_tagline',
    'choices' => array(
        'logo-only' => esc_html__('Logo Only', 'blog-way'),
        'title-text' => esc_html__('Title + Tagline', 'blog-way'),
        'logo-title' => esc_html__('Logo + Title and Tagline', 'blog-way')
    )
));

//Color Setting Starts
// Add Color Options Panel.
$wp_customize->add_panel('color_option_panel', array(
    'title' => esc_html__('Advance Color Options', 'blog-way'),
    'priority' => 90,
        )
);

// Primary Color Section.
$wp_customize->add_section('section_primary_color', array(
    'title' => esc_html__('General Colors', 'blog-way'),
    'priority' => 100,
    'panel' => 'color_option_panel',
        )
);
//Body color options
$wp_customize->add_setting('body_color', array(
    'default' => $default['body_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'body_color', array(
    'label' => esc_html__('Body Text Color', 'blog-way'),
    'settings' => 'body_color',
    'section' => 'section_primary_color',
    'priority' => 100,
        )
        )
);

//Site title color options
$wp_customize->add_setting('site_title_color', array(
    'default' => $default['site_title_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'site_title_color', array(
    'label' => esc_html__('Site Title Color', 'blog-way'),
    'settings' => 'site_title_color',
    'section' => 'section_primary_color',
    'priority' => 100,
        )
        )
);

//Site description color options
$wp_customize->add_setting('site_description_color', array(
    'default' => $default['site_description_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'site_description_color', array(
    'label' => esc_html__('Site Description Color', 'blog-way'),
    'settings' => 'site_description_color',
    'section' => 'section_primary_color',
    'priority' => 100,
        )
        )
);

//Button color options
$wp_customize->add_setting('button_color', array(
    'default' => $default['button_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'button_color', array(
    'label' => esc_html__('Button Color', 'blog-way'),
    'settings' => 'button_color',
    'section' => 'section_primary_color',
    'priority' => 100,
        )
        )
);

//Scroll Up color options
$wp_customize->add_setting('scrollup_color', array(
    'default' => $default['scrollup_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'scrollup_color', array(
    'label' => esc_html__('Scroll Up Color', 'blog-way'),
    'settings' => 'scrollup_color',
    'section' => 'section_primary_color',
    'priority' => 100,
        )
        )
);

// Header Color Section.
$wp_customize->add_section('section_header_color', array(
    'title' => esc_html__('Header Colors', 'blog-way'),
    'priority' => 100,
    'panel' => 'color_option_panel',
        )
);

//Background color options
$wp_customize->add_setting('header_bg_color', array(
    'default' => $default['header_bg_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'header_bg_color', array(
    'label' => esc_html__('Header Background Color', 'blog-way'),
    'settings' => 'header_bg_color',
    'section' => 'section_header_color',
    'priority' => 100,
        )
        )
);

//Menu color options
$wp_customize->add_setting('menu_color', array(
    'default' => $default['menu_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'menu_color', array(
    'label' => esc_html__('Menu Text Color', 'blog-way'),
    'settings' => 'menu_color',
    'section' => 'section_header_color',
    'priority' => 100,
        )
        )
);

//Menu hover color options
$wp_customize->add_setting('menu_hover_color', array(
    'default' => $default['menu_hover_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'menu_hover_color', array(
    'label' => esc_html__('Active Menu + Hover Color', 'blog-way'),
    'settings' => 'menu_hover_color',
    'section' => 'section_header_color',
    'priority' => 100,
        )
        )
);

// Heading Color Section.
$wp_customize->add_section('section_heading_color', array(
    'title' => esc_html__('Heading(H1 - H6) Colors', 'blog-way'),
    'priority' => 100,
    'panel' => 'color_option_panel',
        )
);

//Headings color options
$wp_customize->add_setting('headings_color', array(
    'default' => $default['headings_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'headings_color', array(
    'label' => esc_html__('Headings(H1 - H6) Color', 'blog-way'),
    'settings' => 'headings_color',
    'section' => 'section_heading_color',
    'priority' => 100,
        )
        )
);

// Meta Color Section.
$wp_customize->add_section('section_meta_color', array(
    'title' => esc_html__('Post/Meta Colors', 'blog-way'),
    'priority' => 100,
    'panel' => 'color_option_panel',
        )
);
//Meta color options
$wp_customize->add_setting('meta_color', array(
    'default' => $default['meta_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'meta_color', array(
    'label' => esc_html__('Meta Color', 'blog-way'),
    'settings' => 'meta_color',
    'section' => 'section_meta_color',
    'priority' => 100,
        )
        )
);

//Anchor color options
$wp_customize->add_setting('anchor_color', array(
    'default' => $default['anchor_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'anchor_color', array(
    'label' => esc_html__('Anchor/Link Color', 'blog-way'),
    'settings' => 'anchor_color',
    'section' => 'section_meta_color',
    'priority' => 100,
        )
        )
);

// Footer Color Section.
$wp_customize->add_section('section_footer_color', array(
    'title' => esc_html__('Footer Colors', 'blog-way'),
    'priority' => 100,
    'panel' => 'color_option_panel',
        )
);

//Background color options
$wp_customize->add_setting('footer_bg_color', array(
    'default' => $default['footer_bg_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'footer_bg_color', array(
    'label' => esc_html__('Footer Background Color', 'blog-way'),
    'settings' => 'footer_bg_color',
    'section' => 'section_footer_color',
    'priority' => 100,
        )
        )
);

//Footer text color options
$wp_customize->add_setting('footer_text_color', array(
    'default' => $default['footer_text_color'],
    'sanitize_callback' => 'sanitize_hex_color'
));

$wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize, 'footer_text_color', array(
    'label' => esc_html__('Footer Text Color', 'blog-way'),
    'settings' => 'footer_text_color',
    'section' => 'section_footer_color',
    'priority' => 100,
        )
        )
);

// Reset Color Section.
$wp_customize->add_section('section_reset_color', array(
    'title' => esc_html__('Reset Color', 'blog-way'),
    'priority' => 100,
    'panel' => 'color_option_panel',
        )
);

// reset_colors
$wp_customize->add_setting('reset_colors', array(
    'default' => $default['reset_colors'],
    'transport' => 'postMessage',
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);

$wp_customize->add_control('reset_colors', array(
    'label' => esc_html__('Reset Colors', 'blog-way'),
    'description' => esc_html__('This will replace all colors with default color of the theme. Please reload page to see changes.', 'blog-way'),
    'section' => 'section_reset_color',
    'type' => 'checkbox',
    'priority' => 101,
        )
);

// Option Panel
$wp_customize->add_panel(
        'basic_panel', array(
    'title' => esc_html__('Theme Options', 'blog-way'),
    'priority' => 90
        )
);

// Header Section
$wp_customize->add_section(
        'header', array(
    'title' => esc_html__('Header Options', 'blog-way'),
    'panel' => 'basic_panel'
        )
);
//print_r($default);
//exit;
$wp_customize->add_setting(
        'sticky', array(
    'default' => $default['sticky'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox'
        )
);

$wp_customize->add_control(
        'sticky', array(
    'label' => esc_html__('Disable sticky header', 'blog-way'),
    'section' => 'header',
    'settings' => 'sticky',
    'type' => 'checkbox'
        )
);

$wp_customize->add_setting(
        'overlay', array(
    'default' => $default['overlay'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox'
        )
);

$wp_customize->add_control(
        'overlay', array(
    'label' => esc_html__('Enable overlay of main banner', 'blog-way'),
    'section' => 'header',
    'type' => 'checkbox'
        )
);

// Seo h1 title setting
$wp_customize->add_setting('seo_h1_title_set', array(
    'default' => $default['seo_h1_title_set'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control('seo_h1_title_set', array(
    'label' => esc_html__('Show Header title', 'blog-way'),
    'section' => 'header',
    'type' => 'checkbox',
    'priority' => 100,
        )
);

//if (get_theme_mod('seo_h1_title_set') == 1) {
//    
    $wp_customize->add_setting('seo_h1_title', array(
        'default' => $default['seo_h1_title'],
        'sanitize_callback' => 'sanitize_text_field',
            )
    );
    $wp_customize->add_control('seo_h1_title', array(
        'label' => esc_html__('Header title text', 'blog-way'),
        'section' => 'header',
        'type' => 'text',
        'priority' => 100,
        'active_callback' => 'blog_way_is_seo_h1_title_active',
            )
   );
//
//} else {
//        $wp_customize->remove_control('seo_h1_title');
//}



// Blog Options Section
$wp_customize->add_section(
        'post_options', array(
    'title' => esc_html__('Blog Options', 'blog-way'),
    'panel' => 'basic_panel'
        )
);

// Post List Type 
$wp_customize->add_setting('list_type', array(
    'default' => $default['list_type'],
    'sanitize_callback' => 'blog_way_sanitize_select'
        )
);

$wp_customize->add_control('list_type', array(
    'label' => esc_html__('Post Listing Type', 'blog-way'),
    'section' => 'post_options',
    'type' => 'radio',
    'choices' => array(
        'default' => esc_html__('Default', 'blog-way'),
        'full' => esc_html__('Full Image', 'blog-way'),
    ),
        )
);

// Setting enable_sticky_sidebar.
$wp_customize->add_setting('enable_sticky_sidebar', array(
    'default' => $default['enable_sticky_sidebar'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control('enable_sticky_sidebar', array(
    'label' => esc_html__('Enable Sticky Sidebar', 'blog-way'),
    'section' => 'post_options',
    'type' => 'checkbox',
        )
);

// Setting global_layout.
$wp_customize->add_setting('global_layout', array(
    'default' => $default['global_layout'],
    'sanitize_callback' => 'blog_way_sanitize_select',
        )
);
$wp_customize->add_control('global_layout', array(
    'label' => esc_html__('Sidebar', 'blog-way'),
    'section' => 'post_options',
    'type' => 'radio',
    'choices' => array(
        'left-sidebar' => esc_html__('Left Sidebar', 'blog-way'),
        'right-sidebar' => esc_html__('Right Sidebar', 'blog-way'),
        'no-sidebar' => esc_html__('No Sidebar', 'blog-way'),
    ),
        )
);

$wp_customize->add_setting(
        'excerpt_length', array(
    'default' => $default['excerpt_length'],
    'sanitize_callback' => 'blog_way_sanitize_positive_integer'
        )
);

$wp_customize->add_control(
        'excerpt_length', array(
    'label' => esc_html__('Excerpt Length', 'blog-way'),
    'description' => esc_html__('Select number of words to display in excerpt', 'blog-way'),
    'section' => 'post_options',
    'settings' => 'excerpt_length',
    'type' => 'number',
    'input_attrs' => array(
        'min' => 20,
        'max' => 220,
        'step' => 1
    ),
        )
);

// Read More Text
$wp_customize->add_setting(
        'read_more', array(
    'default' => $default['read_more'],
    'sanitize_callback' => 'sanitize_text_field'
        )
);

$wp_customize->add_control(
        'read_more', array(
    'label' => esc_html__('Read More Text', 'blog-way'),
    'settings' => 'read_more',
    'section' => 'post_options',
    'type' => 'text'
        )
);

// Setting category_meta.
$wp_customize->add_setting(
        'category_meta', array(
    'default' => $default['category_meta'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'category_meta', array(
    'label' => esc_html__('Show Category', 'blog-way'),
    'section' => 'post_options',
    'type' => 'checkbox',
        )
);

// Setting author_meta.
$wp_customize->add_setting(
        'author_meta', array(
    'default' => $default['author_meta'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'author_meta', array(
    'label' => esc_html__('Show Author', 'blog-way'),
    'section' => 'post_options',
    'type' => 'checkbox',
        )
);

// Setting date_meta.
$wp_customize->add_setting(
        'date_meta', array(
    'default' => $default['date_meta'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'date_meta', array(
    'label' => esc_html__('Show Posted Date', 'blog-way'),
    'section' => 'post_options',
    'type' => 'checkbox',
        )
);

// Setting archive_prefix.
$wp_customize->add_setting(
        'archive_prefix', array(
    'default' => $default['archive_prefix'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'archive_prefix', array(
    'label' => esc_html__('Disable prefix in archive pages', 'blog-way'),
    'section' => 'post_options',
    'type' => 'checkbox',
        )
);

//Single Post Options Section
$wp_customize->add_section(
        'single_post_options', array(
    'title' => esc_html__('Single Post Options', 'blog-way'),
    'panel' => 'basic_panel'
        )
);

// Setting featured_img_meta.
$wp_customize->add_setting(
        'featured_img_meta', array(
    'default' => $default['featured_img_meta'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'featured_img_meta', array(
    'label' => esc_html__('Show featured image', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'checkbox',
        )
);

// Setting single_category_meta.
$wp_customize->add_setting(
        'single_category_meta', array(
    'default' => $default['single_category_meta'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'single_category_meta', array(
    'label' => esc_html__('Show Category', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'checkbox',
        )
);

// Setting author_meta.
$wp_customize->add_setting(
        'single_author_meta', array(
    'default' => $default['single_author_meta'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'single_author_meta', array(
    'label' => esc_html__('Show Author', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'checkbox',
        )
);

// Setting date_meta.
$wp_customize->add_setting(
        'single_date_meta', array(
    'default' => $default['single_date_meta'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'single_date_meta', array(
    'label' => esc_html__('Show Posted Date', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'checkbox',
        )
);

// Setting single_tags_meta.
$wp_customize->add_setting(
        'single_tags_meta', array(
    'default' => $default['single_tags_meta'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'single_tags_meta', array(
    'label' => esc_html__('Show Tags', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'checkbox',
        )
);

// Setting show_post_nav
$wp_customize->add_setting(
        'show_post_nav', array(
    'default' => $default['show_post_nav'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'show_post_nav', array(
    'label' => esc_html__('Show Post Navigation', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'checkbox',
        )
);

// Setting show_author_info
$wp_customize->add_setting(
        'show_author_info', array(
    'default' => $default['show_author_info'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'show_author_info', array(
    'label' => esc_html__('Show Author Information', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'checkbox',
        )
);

// Setting show_related_posts
$wp_customize->add_setting(
        'show_related_posts', array(
    'default' => $default['show_related_posts'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox',
        )
);
$wp_customize->add_control(
        'show_related_posts', array(
    'label' => esc_html__('Show Related Posts', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'checkbox',
        )
);

//Related Post Text
$wp_customize->add_setting(
        'related_posts_text', array(
    'default' => $default['related_posts_text'],
    'sanitize_callback' => 'sanitize_text_field'
        )
);

$wp_customize->add_control(
        'related_posts_text', array(
    'label' => esc_html__('Related Posts Text', 'blog-way'),
    'section' => 'single_post_options',
    'type' => 'text',
    'active_callback' => 'blog_way_is_relative_posts_active',
        )
);

// Footer Section
$wp_customize->add_section(
        'footer', array(
    'title' => esc_html__('Footer Options', 'blog-way'),
    'panel' => 'basic_panel'
        )
);

$wp_customize->add_setting(
        'copyright', array(
    'default' => $default['copyright'],
    'sanitize_callback' => 'sanitize_text_field'
        )
);

$wp_customize->add_control(
        'copyright', array(
    'label' => esc_html__('Copyright Text', 'blog-way'),
    'description' => esc_html__('Copyright text of the site', 'blog-way'),
    'settings' => 'copyright',
    'section' => 'footer',
    'type' => 'text'
        )
);

// ScrollUp Section
$wp_customize->add_section(
        'scrollup', array(
    'title' => esc_html__('Scroll Up Options', 'blog-way'),
    'panel' => 'basic_panel'
        )
);

$wp_customize->add_setting(
        'enable_scrollup', array(
    'default' => $default['enable_scrollup'],
    'sanitize_callback' => 'blog_way_sanitize_checkbox'
        )
);

$wp_customize->add_control(
        'enable_scrollup', array(
    'label' => esc_html__('Disable Scroll Up', 'blog-way'),
    'section' => 'scrollup',
    'settings' => 'enable_scrollup',
    'type' => 'checkbox'
        )
);
