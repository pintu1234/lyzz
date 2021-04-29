<?php
/**
 * About configuration
 *
 * @package Blog_Way
 */

$config = array(
	'menu_name' => esc_html__( 'About Blog Way', 'blog-way' ),
	'page_name' => esc_html__( 'About Blog Way', 'blog-way' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'blog-way' ), 'Blog Way' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'blog-way' ), 'Blog Way' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','blog-way' ),
			'url'  => 'https://www.prodesigns.com/wordpress-themes/downloads/blog-way/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','blog-way' ),
			'url'  => 'https://www.prodesigns.com/wordpress-themes/demo/blog-way/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'View Documentation','blog-way' ),
			'url'    => 'https://www.prodesigns.com/wordpress-themes/documentation/blog-way/',
			'button' => 'primary',
			),
		'rate_url' => array(
			'text' => esc_html__( 'Rate This Theme','blog-way' ),
			'url'  => 'https://wordpress.org/support/theme/blog-way/reviews/',
			),
		'pro_url' => array(
			'text'   => esc_html__( 'Buy Pro From Themeforest','blog-way' ),
			'url'    => 'https://themeforest.net/item/blog-way-plus-minimal-wordpress-blog-theme/19848313?ref=prodesigns',
			'button' => 'primary',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'blog-way' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'blog-way' ),
		'support'             => esc_html__( 'Support', 'blog-way' ),
		'upgrade_to_pro'      => esc_html__( 'Upgrade to Pro', 'blog-way' ),
		'free_pro'            => esc_html__( 'FREE VS. PRO', 'blog-way' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'blog-way' ),
			'text'                => esc_html__( 'Find step by step instructions with video documentation to setup theme easily.', 'blog-way' ),
			'button_label'        => esc_html__( 'View documentation', 'blog-way' ),
			'button_link'         => 'https://www.prodesigns.com/wordpress-themes/documentation/blog-way/',
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'blog-way' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'blog-way' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'blog-way' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=blog-way-about&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'blog-way' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'blog-way' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'blog-way' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	
	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'blog-way' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'blog-way' ),
			'button_label' => esc_html__( 'Contact Support', 'blog-way' ),
			'button_link'  => esc_url( 'https://www.prodesigns.com/wordpress-themes/support/item/blogway/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'blog-way' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'blog-way' ),
			'button_label' => esc_html__( 'View Documentation', 'blog-way' ),
			'button_link'  => 'https://www.prodesigns.com/wordpress-themes/documentation/blog-way/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Pro Version', 'blog-way' ),
			'icon'         => 'dashicons dashicons-products',
			'icon'         => 'dashicons dashicons-star-filled',
			'text'         => esc_html__( 'Upgrade to pro version for additional features and options.', 'blog-way' ),
			'button_label' => esc_html__( 'View Pro Version', 'blog-way' ),
			'button_link'  => 'https://www.prodesigns.com/wordpress-themes/downloads/blog-way-plus/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'fourth' => array(
			'title'        => esc_html__( 'Customization Request', 'blog-way' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'We have dedicated team members for theme customization. Feel free to contact us any time if you need any customization service.', 'blog-way' ),
			'button_label' => esc_html__( 'Customization Request', 'blog-way' ),
			'button_link'  => 'https://www.prodesigns.com/contact-us/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'fifth' => array(
			'title'        => esc_html__( 'Child Theme', 'blog-way' ),
			'icon'         => 'dashicons dashicons-admin-customizer',
			'text'         => esc_html__( 'If you want to customize theme file, you should use child theme rather than modifying theme file itself.', 'blog-way' ),
			'button_label' => esc_html__( 'About child theme', 'blog-way' ),
			'button_link'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'sixth' => array(),
	),

	// Upgrade.
	'upgrade_to_pro' 	=> array(
		'description'   => esc_html__( 'Upgrade to pro version for more exciting features and additional theme options.', 'blog-way' ),
		'button_label' 	=> esc_html__( 'Upgrade to Pro', 'blog-way' ),
		'button_link'  	=> 'https://www.prodesigns.com/wordpress-themes/downloads/blog-way-plus/',
		'is_new_tab'   	=> true,
	),

    // Free vs pro array.
    'free_pro' => array(
	    array(
		    'title'		=> esc_html__( 'Themeforest Item', 'blog-way' ),
		    'desc' 		=> esc_html__( 'Available in themeforest', 'blog-way' ),
		    'free'      => esc_html__('no','blog-way'),
		    'pro'       => esc_html__('yes','blog-way'),
	    ),

	    array(
		    'title'		=> esc_html__( 'Featured Slider', 'blog-way' ),
		    'desc' 		=> esc_html__( 'Slider from category, tags, and pages', 'blog-way' ),
		    'free'      => esc_html__('no','blog-way'),
		    'pro'       => esc_html__('yes','blog-way'),
	    ),

        array(
    	    'title'		=> esc_html__( 'Home Layout', 'blog-way' ),
    	    'desc' 		=> esc_html__( 'Variations of home page design', 'blog-way' ),
    	    'free' 		=> esc_html__('1','blog-way'),
    	    'pro'  		=> esc_html__('3','blog-way'),
        ),

        array(
    	    'title'		=> esc_html__( 'Custom Widgets', 'blog-way' ),
    	    'desc' 		=> esc_html__( 'Widgets added by theme to enhance features', 'blog-way' ),
    	    'free' 		=> esc_html__('4','blog-way'),
    	    'pro'  		=> esc_html__('5','blog-way'),
        ),
	    
	    array(
		    'title'     => esc_html__( 'Font Options', 'blog-way' ),
		    'desc' 		=> esc_html__( 'Google fonts options for changing the overall site fonts', 'blog-way' ),
		    'free'  	=> 'no',
		    'pro'   	=> esc_html__('100+','blog-way'),
	    ),
	    array(
		    'title'     => esc_html__( 'Color Options', 'blog-way' ),
		    'desc'      => esc_html__( 'Options to change primary color of the site', 'blog-way' ),
		    'free'      => esc_html__('yes','blog-way'),
		    'pro'       => esc_html__('yes','blog-way'),
	    ),
	    array(
		    'title'     => esc_html__( 'WooCommerce Ready', 'blog-way' ),
		    'desc'      => esc_html__( 'Theme supports/works with WooCommerce plugin', 'blog-way' ),
		    'free'      => esc_html__('yes','blog-way'),
		    'pro'       => esc_html__('yes','blog-way'),
	    ),
        array(
    	    'title'     => esc_html__( 'Instagram Feeds', 'blog-way' ),
    	    'desc'      => esc_html__( 'Widget to display feeds from instagram account', 'blog-way' ),
    	    'free'      => esc_html__('no','blog-way'),
    	    'pro'       => esc_html__('yes','blog-way'),
        ),

        array(
    	    'title'     => esc_html__( 'Social Icons in Header', 'blog-way' ),
    	    'desc'      => esc_html__( 'Option to show social links in main header', 'blog-way' ),
    	    'free'      => esc_html__('no','blog-way'),
    	    'pro'       => esc_html__('yes','blog-way'),
        ),

        array(
    	    'title'     => esc_html__( 'Hide Footer Credit', 'blog-way' ),
    	    'desc'      => esc_html__( 'Option to enable/disable Powerby(Designer) credit in footer', 'blog-way' ),
    	    'free'      => esc_html__('no','blog-way'),
    	    'pro'       => esc_html__('yes','blog-way'),
        ),
        array(
    	    'title'     => esc_html__( 'Override Footer Credit', 'blog-way' ),
    	    'desc'      => esc_html__( 'Option to Override existing Powerby credit of footer', 'blog-way' ),
    	    'free'      => esc_html__('no','blog-way'),
    	    'pro'       => esc_html__('yes','blog-way'),
        ),
	    array(
		    'title'     => esc_html__( 'SEO', 'blog-way' ),
		    'desc' 		=> esc_html__( 'Developed with high skilled SEO tools.', 'blog-way' ),
		    'free'  	=> 'yes',
		    'pro'   	=> 'yes',
	    ),
	    array(
		    'title'     => esc_html__( 'Support Forum', 'blog-way' ),
		    'desc'      => esc_html__( 'Highly experienced and dedicated support team for your help plus online chat.', 'blog-way' ),
		    'free'      => esc_html__('yes', 'blog-way'),
		    'pro'       => esc_html__('High Priority', 'blog-way'),
	    )

    ),

);
Blog_Way_About::init( apply_filters( 'blog_way_about_filter', $config ) );
