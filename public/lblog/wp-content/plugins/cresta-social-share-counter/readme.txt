=== Cresta Social Share Counter ===
Contributors: CrestaProject
Donate link: https://crestaproject.com/downloads/cresta-social-share-counter/
Tags: share, social, social share, social buttons, share button, share buttons, facebook, twitter, linkedin, pinterest, google plus, floating buttons, social count, social counter, sharing, social sharing, socialize, social icon, print, post, posts, page, plugin, facebook share, twitter share, google plus share, linkedin share, pinterest share
Requires at least: 4.2
Tested up to: 5.7
Stable tag: 2.9.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Share your posts and pages quickly and easily with Cresta Social Share Counter and show share counts.

== Description ==

<a href="https://crestaproject.com/downloads/cresta-social-share-counter/" rel="nofollow" target="_blank">Plugin Homepage & Demo</a>

Cresta Social Share Counter is a <strong>free WordPress Plugin</strong> that allows your users to <strong>share posts and pages</strong> easily using the social buttons of Facebook, Twitter, Google Plus, Linkedin and Pinterest.
You can also choose to show the <strong>social counter</strong> for each social media and the total shares.

<strong>You can select the following Social Network</strong>
<ul>
	<li>1. Facebook</li>
	<li>2. Twitter</li>
	<li>3. Google Plus</li>
	<li>4. Linkedin</li>
	<li>5. Pinterest</li>
</ul>

<strong>Some features</strong>
<ul>
	<li>Show Social Counter</li>
	<li>Choose up to 9 buttons styles</li>
	<li>Fade animation</li>
	<li>Show the floating social buttons</li>
	<li>Show the social buttons before/after the post or page content</li>
	<li>Use the shortcode <strong>[cresta-social-share]</strong> wherever you want to display the social buttons</li>
</ul>

<strong>PRO version features</strong>
<ul>
	<li>Mix.com, Buffer, Reddit, VK, OK.ru, Xing, Tumblr, Telegram and WhatsApp share buttons</li>
	<li>Change buttons colors</li>
	<li>Choose up to 17 buttons styles</li>
	<li>Up to 30 effects animation</li>
	<li>10 hover button animations</li>
	<li>Tooltips on the social buttons</li>
	<li>and much more...</li>
</ul>

== Installation ==

1. Unzip cresta-social-share-counter.zip
2. Upload the folder 'cresta-social-share-counter' to the '/wp-content/plugins/' directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Go to WordPress Main Menu -> CSSC FREE to set the options


== Frequently Asked Questions ==

= Can I choose which pages to display social buttons? =
Yes, in the options page you can choose which pages to display social buttons (pages, posts, media and any custom post type).

= The shortcode [cresta-social-share] doesn't work in a widget =
Most likely the theme you're using has not enabled the use of shortcodes within text-widget.<br/>
Try to add this snippet in your theme’s functions.php:
`
add_filter('widget_text', 'do_shortcode');
`

= Can I hide the floating social buttons and only show the buttons in content? =
Yes, the floating social buttons can be hidden (from version 1.1).

= The plugin does not appear in home page =
The plugin does not appear in home page if the home shows the latest posts. Indeed, if the home page shows a static page, the plugin works correctly. (the option "show on: pages" must be enabled).

= Why social buttons are not shown in the posts list? (tags page, categories page, home feeds, etc ...) =
Because the plugin is designed to work exclusively on individual pages (single post, single page, single custom post type)

== Screenshots ==

1. Cresta Social Share Counter Settings Page 1
2. Cresta Social Share Counter Settings Page 2
3. Floating social buttons with social count
4. Social buttons before/after posts/page content

== Changelog ==

= 2.9.8 =
* Added compatibility with WordPress 5.7

= 2.9.7 =
* Change logo and banner
* Minor bug fixes

= 2.9.6 =
* Added font display swap for icons
* Added compatibility with WordPress 5.5
* Removed Google Plus social button (no longer available)

= 2.9.5 =
* Re-inserted the possibility of having http + https for Facebook Shares

= 2.9.4 =
* Minor bug fixes

= 2.9.3 =
* Minor bug fixes

= 2.9.2 =
* Added compatibility with WordPress 5.5

= 2.9.1 =
* Removed newsharecount.com Twitter API because they don't work anymore
* Minor bug fixes

= 2.9.0 =
* Added compatibility with WordPress 5.4
* Minor bug fixes

= 2.8.9 =
* Added an option to disable Google Fonts
* Minor bug fixes

= 2.8.8 =
* Minify CSS files
* Minor bug fixes

= 2.8.7 =
* Added HTTP+HTTPS for Facebook without Facebook APP
* Minify CSS and JS

= 2.8.6 =
* Found a (temporary) method to show Facebook shares without using a Facebook APP
* Minor bug fixes

= 2.8.5 =
* Improved management of the Facebook Share count

= 2.8.4 =
* Fixed Facebook share number to show all interactions

= 2.8.3 =
* Fatal error fixed

= 2.8.2 =
* Now Facebook requires APP ID and APP Secret to show the number of shares

= 2.8.1 =
* Added compatibility with twitcount.com API's for Twitter Share Count

= 2.8.0 =
* Fixed Twitter share count for HTTP + HTTPS
* Minor bug fixes

= 2.7.9 =
* Added compatibility with opensharecount.com API's for Twitter Share Count

= 2.7.8 =
* Minor bug fixes

= 2.7.7 =
* Removing LinkedIn share count because has been disabled by LinkedIn

= 2.7.6 =
* Improved plugin javascript

= 2.7.5 =
* Now it's possible to aggregate the shares in http to https (beta)

= 2.7.4 =
* Removing Google Plus share count because has been disabled by Google
* Now it's possible to show the single shares only if the number is more than a value of your choice
* Minor bug fixes

= 2.7.3 =
* Fixed social bar in mobile view
* Minor bug fixes

= 2.7.2 =
* Minor bug fixes

= 2.7.1 =
* Added an alternative method to get Linkedin share count

= 2.7.0 =
* Minor bug fixes

= 2.6.9 =
* Added compatibility with WordPress 4.8

= 2.6.8 =
* Minor bug fixes

= 2.6.7 =
* Minor bug fixes

= 2.6.6 =
* Minor bug fixes

= 2.6.5 =
* Improved Pinterest share mode
* Minor bug fixes

= 2.6.4 =
* Minor bug fixes

= 2.6.3 =
* Added WPML compatibility
* Updated plugin description
* Fixed a bug that opened two sharing windows if the site is also using the official Twitter widget

= 2.6.2 =
* Updated compatibility with WordPress 4.7
* Minor bug fixes

= 2.6.1 =
* Improved buttons metabox
* Minor bug fixes

= 2.6.0 =
* Minor bug fixes

= 2.5.9 =
* Now is possible to using the Facebook App to fetch share counts if the "classic method" is not working
* Fixed a problem with the classic Facebook Share Count method when a page has 0 shares

= 2.5.8 =
* Updated Facebook Share Count API

= 2.5.7 =
* Updated compatibility with WordPress 4.6

= 2.5.6 =
* Fixed Linkedin Share Count

= 2.5.5 =
* Fixed share URL
* Fixed CSS code for floating buttons in mobile version
* Fixed share page title

= 2.5.4 =
* Added the possibility of re-use Twitter Share Count with newsharecounts.com public API (Unofficial Counter)

= 2.5.3 =
* Added a box to insert custom CSS code, if needed
* Updated compatibility with WordPress 4.5
* Minor bug fixes

= 2.5.2 =
* Improved plugin security
* Minor bug fixes

= 2.5.1 =
* Removed Twitter Share Count (no longer used by Twitter)
* Added the possibility to show the single shares count only if is more than 0
* Minor bug fixes

= 2.5.0 =
* Minor bug fixes

= 2.4.9 =
* Tweak: Changed text domain from "crestassc" to "cresta-social-share-counter"
* Minor bug fixes

= 2.4.8 =
* Updated Google Plus icon
* Updated Twitter Share Count (provisional)

= 2.4.7 =
* Updated Google Plus counter method
* Minor bug fixes

= 2.4.6 =
* Updated compatibility with WordPress 4.3
* Minor bug fixes

= 2.4.5 =
* Minor bug fixes

= 2.4.4 =
* Fixed small bug when you used the shortcode
* Updated compatibility with WordPress 4.2

= 2.4.3 =
* Fixed small bug that, in some cases, showed wrong title in Twitter box.
* Added possibility to hide/show the floating buttons via button

= 2.4.2 =
* Fixed an issue that did not display the shortcode
* Added Polish translation (Thanks to Piotr Deres)
* Minor bug fixes

= 2.4.1 =
* Minor bug fixes

= 2.4 =
* Added the possibility to set the social counter box with the same color of Social Network
* Fixed Google Plus share count
* Speed improvement
* Minor bug fixes

= 2.3 =
* Fixed a bug that did not allow you to choose where to display the social buttons
* Changed the name of the social icons font to avoid conflicts with other font
* Code cleanup
* Minor bug fixes

= 2.2.1 =
* Fixed an CSS error that sometimes did not display properly social icons

= 2.2 =
* Added the print button
* Ability to change the text of shares
* Added Metabox that allows you to hide the social icons on certain pages/posts/custom post type
* Minor Bug Fixes

= 2.1 =
* Now the plugin works with HTTPS protocol
* Added 1 new style
* Minor Bug Fixes

= 2.0.1 =
* Added the possibility to place the content buttons in the center of column
* Fixed share link
* Fixed CSS buttons height

= 2.0 =
* Added the possibility to adjust the z-index
* Added shadow and reflection on buttons
* Added Spanish localization (Thanks to Andrew Kurtis)
* Fixed javascript (NaN and number of shares)
* Fixed CSS and buttons reflection
* Minor Bug Fixes

= 1.9 =
* Now the plugin show the social buttons in home page if the home page is a static page (not blog index)
* Added 1 new style
* Minor Bug Fixes

= 1.8 =
* Added shadow on buttons
* Added Italian localization
* Minor bug fixes

= 1.7 =
* Fixed Share URL
* Now the Plugin is completely W3C Validated
* Add possibility to show / hide CrestaProject Credit

= 1.6 =
* Fixed Custom Post Type Bug

= 1.5 =
* Added 2 new styles
* Update icon
* Minor bug fixes

= 1.4 =
* Added a new field to enter the Twitter Username (optional)
* Added the possibility to choose the position of Social Buttons in content (left or right).
* Fixed Options Display
* Minor bug fixes

= 1.3 =
* Added the "Show Total Shares" option
* Now the "In content Buttons" have the same style of "Floating Buttons"
* Minor bug fixes

= 1.2 =
* Added custom post format filter
* Fixes share icons size
* Fixes page share title with special characters
* Minor bug fixes

= 1.1 =
* Added the option to disable floating buttons
* Minor bug fixes

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.0 =
This is the first version of the plugin