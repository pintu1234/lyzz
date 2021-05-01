<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		$imgs_url = get_template_directory_uri().'/images/';
		$imgs_url_demo = get_template_directory_uri().'/demo';



// Set the Options Array
global $of_options;
$of_options = array();

/*-----------------------------------------------------------------------------------*/
/* General Settings */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( 	"name" 		=> "General Settings",
						"type" 		=> "heading");

$of_options[] = array( 	"name" 		=> "Custom Logo",
						"desc" 		=> "Upload a custom logo image for your site here.",
						"id" 		=> "site_logo",
						"std" 		=> $imgs_url.'logo.png',
						"type" 		=> "upload");

$of_options[] = array( 	"name" 		=> "Logo Margin Top",
						"desc" 		=> "To align it perfectly, you need to give a positive margin, default is 10px",
						"id" 		=> "logo-margin",
						"std" 		=> "10",
						"min"		=> "-10",
						"max"		=> "100",						
						"type" 		=> "sliderui");
					
$of_options[] = array( 	"name" 		=> "Custom Favicon",
						"desc" 		=> "Upload a custom favicon (.ico/.png/.gif) image for your site here. Maximum size should be 32px x 32px.",
						"id" 		=> "custom_favicon",
						"std" 		=> $imgs_url.'web-icon.png',
						"type" 		=> "upload");


$of_options[] = array( 	"name" 		=> "Pagination or Infinite Scroll.",
						"desc" 		=> "",
						"id" 		=> "choose_options_home",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Default Pagination or Infinite Scroll.</h3>
						Choose the option that better fits your needs, default is Infinite Scroll.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Pagination or Infinite Scroll",
						"desc" 		=> "Choose the option that better fits your needs, default is Infinite Scroll.",
						"id" 		=> "home_pag_select",
						"std" 		=> "0",
						"type" 		=> "select",
						"options" 	=> array(
										"Infinite Scroll",
										"Default Pagination"
									),
					);



$of_options[] = array( 	"name" 		=> "Home Design",
						"desc" 		=> "",
						"id" 		=> "choose_options_home",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Categories / Tags / Style</h3>
						Select a Home Page design for categories / tags / etc.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Categories / Tags / Style",
						"desc" 		=> "Select a Home Page design for Categories / Tags / Author / Search / etc. page.",
						"id" 		=> "home_select",
						"std" 		=> "0",
						"type" 		=> "select",
						"options" 	=> array(
										"Small Thumbnails",
										"Big Thumbnails"
									),
					);





$of_options[] = array( 	"name" 		=> "Featured Posts.",
						"desc" 		=> "",
						"id" 		=> "introduction_posts",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Featured Posts.</h3>
						<strong>Featured Posts</strong> - Home Page Featured Posts",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Featured Posts",
						"desc" 		=> "How many Featured Posts you want to display.",
						"id" 		=> "featured-posts",
						"std" 		=> "8",
						"min"		=> "1",
						"max"		=> "100",						
						"type" 		=> "sliderui");


$of_options[] = array( 	"name" 		=> "Header Social Icons.",
						"desc" 		=> "",
						"id" 		=> "introduction_social",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Social Icons.</h3>
						<strong>Social Icons</strong> - Header Social Icons.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Social Icons",
						"desc" 		=> "You can use HTML code.<br /> For more social icons go to <a href=\"https://fontawesome.com/v4.7.0/icons/\" target=\"_blank\">fontawesome</a> and at the bottom you have Brand Icons!",
						"id" 		=> "top_icons",
						"std" 		=> "<ul class=\"top-social\">
<li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-pinterest\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-youtube\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-vimeo-square\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-linkedin-square\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-rss-square\"></i></a></li>
</ul>",
						"type" 		=> "textarea");	

$of_options[] = array( 	"name" 		=> "Header Popular Tags.",
						"desc" 		=> "",
						"id" 		=> "introduction_tags",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Popular Tags.</h3>
						<strong>Popular Tags</strong> - Header Popular Tags, the popular tags options are mostly for the Full Width version.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Popular Tags = 1900px.",
						"desc" 		=> "How many tags you want to display, for bigger screens: 1900px",
						"id" 		=> "popular-tags-1",
						"std" 		=> "8",
						"min"		=> "1",
						"max"		=> "15",						
						"type" 		=> "sliderui");

$of_options[] = array( 	"name" 		=> "Popular Tags = 1350px.",
						"desc" 		=> "How many tags you want to display, for normal screens: 1350px",
						"id" 		=> "popular-tags-2",
						"std" 		=> "5",
						"min"		=> "1",
						"max"		=> "10",						
						"type" 		=> "sliderui");

$of_options[] = array( 	"name" 		=> "Popular Tags = 1024px.",
						"desc" 		=> "How many tags you want to display, for smaller screens: 1024px",
						"id" 		=> "popular-tags-3",
						"std" 		=> "3",
						"min"		=> "1",
						"max"		=> "5",						
						"type" 		=> "sliderui");






/*-----------------------------------------------------------------------------------*/
/* Advertisement Settings */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( 	"name" 		=> "Advertisement",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-money.png"
				);

$of_options[] = array( 	"name" 		=> "Advertisement",
						"desc" 		=> "",
						"id" 		=> "introduction_banner",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Header Advertisement</h3>
						<strong>Advertisement</strong> - Advertisement on Article page.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "728x90 Banner",
						"desc" 		=> "The ads will be displayed in Header at the Top. Paste your HTML or JavaScript code here.",
						"id" 		=> "header_728",
						"std" 		=> "<a href=\"#\"><img src=\"http://placehold.it/728x90/ffd800/FFF&amp;text=AD+BLOCK+728x90+>+Theme+Options+>+Advertisement\" width=\"728\" height=\"90\" alt=\"banner\" /></a>",
						"type" 		=> "textarea");	

 

/*-----------------------------------------------------------------------------------*/
/* Contact Settings */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( 	"name" 		=> "Contact Settings",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-info.png");

$of_options[] = array( 	"name" 		=> "Email address.",
						"desc" 		=> "",
						"id" 		=> "introduction_7",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Email address.</h3>
						<strong>Contact form</strong> - add your email address.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Contact Form Email",
						"desc" 		=> "Enter the email address where you'd like to receive emails from the Contact form, or leave this field blank to use admin email.",
						"id" 		=> "contact_email",
						"std" 		=> "",
						"type" 		=> "text"); 

$of_options[] = array( 	"name" 		=> "Confirmation message",
						"desc" 		=> "",
						"id" 		=> "introduction_8",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Confirmation message</h3>
						<strong>Confirmation message</strong> - add your message.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Confirmation message",
						"desc" 		=> "Add a confirmation message.",
						"id" 		=> "contact_confirmation",
						"std" 		=> "Thanks, your email was sent successfully.",
						"type" 		=> "textarea");	



/*-----------------------------------------------------------------------------------*/
/* Style Settings */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( 	"name" 		=> "Style Settings",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-paint.png");

$of_options[] = array( 	"name" 		=> "Style",
						"desc" 		=> "",
						"id" 		=> "introduction_14",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Style Settings.</h3>
						The style options control the main color styling of the site. <br />To change all colors of the site, open <strong>Theme folder / css / colors / default.css</strong> file.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Main Color 1",
						"desc" 		=> "Use the color picker to change the main color of the site to match your brand color.",
						"id" 		=> "main_color1",
						"std" 		=> "#ffd800",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Main Color 2",
						"desc" 		=> "Use the color picker to change the main color of the site to match your brand color.",
						"id" 		=> "main_color2",
						"std" 		=> "#222222",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Entry Link Color",
						"desc" 		=> "Use the color picker to change the entry link color on article or default / full width pages.",
						"id" 		=> "entry_linkcolor",
						"std" 		=> "#000000",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Header Background color",
						"desc" 		=> "Use the color picker to change the header background color to match your brand color.",
						"id" 		=> "header_color",
						"std" 		=> "#000000",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Header Links color",
						"desc" 		=> "Use the color picker to change the color of the links from the menu.",
						"id" 		=> "header_links_color",
						"std" 		=> "#FFFFFF",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Thumbs rating up",
						"desc" 		=> "Use the color picker to change the color to match your brand color.",
						"id" 		=> "thumbs_up_color",
						"std" 		=> "#6ecb0a",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Thumbs rating down",
						"desc" 		=> "Use the color picker to change the color to match your brand color.",
						"id" 		=> "thumbs_down_color",
						"std" 		=> "#fe6969",
						"type" 		=> "color"
				);


$of_options[] = array( 	"name" 		=> "Background Color",
						"desc" 		=> "Pick a background color for the theme.",
						"id" 		=> "color_bg_color",
						"std" 		=> "#f6f5f2",
						"type" 		=> "color"
				);

$of_options[] = array( 	"name" 		=> "Footer Pattern Image",
						"desc" 		=> "Pattern image can have any size!",
						"id" 		=> "pattern_footer_img",
						"std" 		=> $imgs_url.'bg.png',
						"type" 		=> "upload"
				);


$of_options[] = array( 	"name" 		=> "Infinite Scroll Loading Image.",
						"desc" 		=> "Upload your loader icon or create easily your own ajax loader icon with <a href=\"http://ajaxload.info/\" target=\"_blank\">http://ajaxload.info/</a>",
						"id" 		=> "loader-image",
						"std" 		=> $imgs_url.'ajax-loader.gif',
						"type" 		=> "upload"
				);


$of_options[] = array( 	"name" 		=> "Custom CSS.",
						"desc" 		=> "",
						"id" 		=> "introduction_customcss",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Custom CSS.</h3>
						Enter your custom CSS code. It will be included in the head section of the page.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Custom CSS",
						"desc" 		=> "Enter your custom CSS code. It will be included in the head section of the page.",
						"id" 		=> "custom_css_style",
						"std" 		=> "",
						"type" 		=> "textarea");


/*-----------------------------------------------------------------------------------*/
/* Footer Settings */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( 	"name" 		=> "Footer Settings",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-settings.png");



$of_options[] = array( 	"name" 		=> "Social Icons.",
						"desc" 		=> "",
						"id" 		=> "introduction_social",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Social Icons.</h3>
						<strong>Social Icons</strong> - for footer.",
						"icon" 		=> true,
						"type" 		=> "info");

$of_options[] = array( 	"name" 		=> "Social Icons",
						"desc" 		=> "You can use HTML code.<br /> For more social icons go to <a href=\"https://fontawesome.com/v4.7.0/icons/\" target=\"_blank\">fontawesome</a> and at the bottom you have Brand Icons!",
						"id" 		=> "bottom_icons",
						"std" 		=> "<ul class=\"footer-social\">
<li><a href=\"#\"><i class=\"fa fa-twitter\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-facebook\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-youtube\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-vimeo-square\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-tumblr\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-dribbble\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-pinterest\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-linkedin\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-flickr\"></i></a></li>
<li><a href=\"#\"><i class=\"fa fa-rss\"></i></a></li>
</ul>",
						"type" 		=> "textarea");	

$of_options[] = array( 	"name" 		=> "Copyright",
						"desc" 		=> "You can use HTML code.",
						"id" 		=> "copyright_footer",
						"std" 		=> "The Frog is your Review Magazine Blog News WordPress Theme<br /> Copyright &copy; 2020 - Theme by <a target=\"_blank\" href=\"https://anthemes.com/\">Anthemes.com</a>",
						"type" 		=> "textarea");	

$of_options[] = array( 	"name" 		=> "Tracking Code.",
						"desc" 		=> "",
						"id" 		=> "introduction_analtytics",
						"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Tracking Code.</h3>
						Google Analytics (or other) tracking codes.",
						"icon" 		=> true,
						"type" 		=> "info");
$of_options[] = array( 	"name" 		=> "Tracking Code",
						"desc" 		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
						"id" 		=> "google_analytics",
						"std" 		=> "",
						"type" 		=> "textarea");	



/*-----------------------------------------------------------------------------------*/
/* Backup Options */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( 	"name" 		=> "Backup Options",
						"type" 		=> "heading",
						"icon"		=> ADMIN_IMAGES . "icon-slider.png"
				);
				
$of_options[] = array( 	"name" 		=> "Backup and Restore Options",
						"id" 		=> "of_backup",
						"std" 		=> "",
						"type" 		=> "backup",
						"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);
				
$of_options[] = array( 	"name" 		=> "Transfer Theme Options Data",
						"id" 		=> "of_transfer",
						"std" 		=> "",
						"type" 		=> "transfer",
						"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);




				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
