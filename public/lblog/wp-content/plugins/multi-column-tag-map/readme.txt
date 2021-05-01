=== Multi-column Tag Map ===
Contributors: tugbucket
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GX8RH7F2LR74J
Tags: tag cloud, tags, taxonomies, categories, authors, posts, custom post types, pages, column, alphabetical, index, appendix, glossary, tag cloud alternative
Requires at least: 2.1
Tested up to: 5.6
Requires PHP: 5.6
Stable tag: 17.0.14

Multi-column Tag Map will display tags, pages, posts, categories, custom post types, authors and taxonomies in a visually logical way similiar to that of an index of a book.

== Description ==

Multi-column Tag Map displays a columnized and alphabetical (English) listing of all tags, categories, authors, pages, posts, single custom post types or taxonomies used in your site similar to the index page of a book. This makes it easier for your visitors to quickly search for topics that might intrest them. It's a great alternative to the tag cloud and especially useful if you have a large site with a multitude of subjects, products etc...

**Live examples and option details can be found at <a href=\"http://mctagmap.tugbucket.net/\">mctagmap.tugbucket.net</a>**


= Features =
* Alphabetically lists tags, pages, posts, categories, custom post types, authors and taxonomies
* Over 50 customizable options

= Links =
* <a href=\"https://mctagmap.tugbucket.net/\">Options and Documentation</a>
* <a href=\"https://wordpress.org/support/plugin/multi-column-tag-map//\">Support</a>

== Screenshots ==

1. A fairly basic example.

== Installation ==

From your WordPress dashboard

1. Visit Plugins > Add New
2. Search for "Multi-column Tag Map"
3. Activate Multi-column Tag Map from your Plugins page
4. <a href=\"http://mctagmap.tugbucket.net/\">Read the documentation</a> to get started

= Shortcode Installation Example =
`[mctagmap show_pages="yes"]`


== Frequently Asked Questions ==

= Nothing shows on the page where the shortcode is =

Most likely this is a timeout or an out of memory issue. Fo rthe time being, increase your WP_MEMORY_LIMIT.

= The plugin doesn't work correctly in [insert non-english] language, can you fix it? =

Currently the plugin only displays and groups non-English words. It does not sort these words alphabetically. If someone would like to help translate it into another language, it would be appreciated.

= Does the plugin work in [insert theme name]? =

mctagmap does nothing to the core functions of Wordpress. There should be no reason that a theme changes the default functions as to how Wordpress handles tags. Knowing that, there shouldn't be any reason why the plugin does not work in your theme. The CSS might get overwritten due the the hierarchy of your themes CSS but, that can be changed by editing the mctagmap.css.

= The map is displaying in a "stair case" fashion =

In your admin panel for the page, switch to HTML view. Notice your theme is wrapping the shortcode in:

`&lt;pre>&lt;code> &lt;/code>&lt;/pre>`

Please remove that. That should fix it up.

= Can the plugin include tags from [insert plugin name]? =

Multi-column Tag Map looks for the tags created by Wordpress. Most other plugins (NextGen, The Events Calendar, etc...) create tags but, they are not stored in the database the same way as Wordpress does. Combining those tags into Multi-column Tag Map is possible but, any method of doing this is a hack and is not supported out of the box. I will not add this functionality to the plugin as a default since I have no control over the other plugins and cannot make any guarantee that the other plugins will not change how they structure and handle tags in the future.

= WooCommerce =

Use the right taxonomies. **product_tag** and **product_cat** or to show all products: **show_posts="yes" post_type="product"**

Please note this is not something made for WooCommerce. It's simply pulling out of the database with core WP functions.


== Changelog ==

* v17.0.14 - CSS and Language fix 
* v17.0.13 - search bug fix
* v17.0.12 - Minor bug fix
* v17.0.11 - JS clean up and testing with WP 5.5
* v17.0.10 - Adding responsive support for multi_page
* v17.0.9 - added "count_order" and "search options.
* v17.0.8 - added the "from_current" option and totally updated the readme.txt file
* v17.0.7 - added "child_of" logic for "show_pages"
* v17.0.6 - Fixing a logic oversight in sorting rules
* v17.0.5 - Autor tag count fix and a few variable corrections
* v17.0.4 - Fixing the_title errors
* v17.0.3 - Clean up from 17.0.2
* v17.0.2 - Clean up from 17.0.1
* v17.0.1 - Clean up from 17.0.0
* v17.0.0 - Added a fix for SSL. New options: "sort_alpha", "sort_alpha_numbers", "sort_alpha_groups" and "sort_alpha_extras"
* v16.0.4 - correcting "order" to work with numeric values
* v16.0.3 - correcting "order" to work with "manual" and "basic"
* v16.0.2 - adding "order", "numbers_first" and "denote_numbers" options.
* v16.0.1 - Updating to PHP7+ functions.
* v16.0.0 - Auhtor options. title_divider added. <a href=\"http://mctagmap.tugbucket.net/\">mctagmap.tugbucket.net</a> launched.
* v15.0.6 - Minor varibale issues fixed. 
* v15.0.5 - Minor varibale issues fixed. 
* v15.0.4 - removed a variable check to allow descriptions/excerpts for posts. Added thumbnail/featured image support.
* v15.0.3 - now exclude checks for underscores and hyphens
* v15.0.2 - Fixed some PHP errors, path for child themes. Removed text-align: left from the core CSS. Added 'force_first' and 'first_force_nav'.
* v15.0.1 - JS error clean up
* v15.0.0 - BETA "responsive"
* v14.0.3 - Fixing a PHP v7.2.x issue with count() and finally found the fix for the group_numbers PHP warning
* v14.0.2 - PHP version fixes (Thanks Rick)
* v14.0.1 - Added slug option for "from_category" and "child_of", can now have multiple categories in "from_category", cleaned up "page_hierarchy" HTML output, added "class", added multiple taxonomy functionality and cleaned up a "from_category" error
* v14.0.0 - Fixed the "one column issue" with improper closing, added "multi_page" functionality, changed the anchor for numbers from "#" to "0-9" to make the "multi_page" functionality work and cleaned up the "width"  option.
* v13.0.7 - Minor code fix.
* v13.0.6 - Minor code fix and WP version testing.
* v13.0.5 - Added "post_tags", fixed a permalink issue, added minimum post & tag counts and cleaned up a fair number of older PHP version issues.
* v13.0.4 - Reverting the include to support older PHP versions.
* v13.0.3 - Typo from dev code. 
* v13.0.2 - Fixed the show_posts limit and a couple of typos.
* v13.0.1 - Added custom post type, the ability to show pages and the ablity to show child pages in hierarchy.
* v13.0 - Added the css3 and ie9 variables. Created an options screen in the admin to insert custom CSS and media queries.
* v12.0.4 - Added a fix to the errors with the "Standard" theme's functions.php
* v12.0.3 - Cleaned up some PHP notifications from undeclared variables, replaced attribute_escape() with esc_attr() and eliminated the extra div issue when there are more columns assigned than tags availabble.
* v12.0.2 - Sort issue with show_pages (uasort) addressed.
* v12.0.1 - Sort issue with show_pages addressed.
* v12.0 - Fixed the numberposts issue for showing categories. Fixed the way scripts were loaded for SSL use. Fixed the "flatten" function conflict. You can now use your own CSS, JS and PHP if desired.
* v11.0.3 - Fixed a duplicate problem and archives issue on "from_category"
* v11.0.2 - Fixed show_categories and tuned a PHP 4.x issue.
* v11.0.1 - Corrected plugin conflict.
* v11.0 - Fixed a PHP 4 issue, added "show_pages", "page_excerpt", "&#42;!", "from_category", "child_of"
* v10.0.1 - Fixed "show_navigation" issue.
* v10.0 - Removed the old hardcode version completely. Options "show_categories". "taxonomy", "group_numbers", and "show_navigation" added.
* v9.0 - Added the "manual", "basic" and "basic_heading" options.
* v8.0 - Added the ability to equalize the heights of the individual letters sections, the use of a custom CSS within the theme's folder and added to the FAQ.
* v7.0 - Added the ablity to display tag descriptions and set the column width in the shortcode. Cleaned up some of the code that was being inserted in the head section.
* v6.0.2 - upload error. 
* v6.0.1 - upload error. 
* v6.0 - Added language display support and the ability to exclude tags.
* v5.1 - cleaned up the tag_count function.
* v5.0 - Fixed a small issue with the name_divider addition. Added the tag_count option.
* v4.2 - Fixed function conflict and added to the FAQ.
* v4.1 - oops
* v4.0.1 - Typos
* v4.0 - Deprecated hardcode support. Added name_divider shortcode option.
* v3.0 - Added toggleability to the lists, the ability to show empty posts and the ability to use special characters in the links.
* v2.2 - Fixed shorcode placement issue.
* v2.1 - Fixed a sorting coflict with the defaults.
* v2.0 - Added shortcode functionality.
* v1.3.1 - Fixed a conflict in jQuery for the show/hide to work.
* v1.2 - Updated the plugin PHP to correct the CSS path.
* v1.0 - It's a boy!

== Upgrade Notice ==
You should really keep your software up to date.