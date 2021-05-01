=== Thumbs Rating ===
Contributors: quicoto
Tags: ratings, thumbs, votes, AJAX, rating, thumb, vote, page, post
Requires at least: 3.8
Tested up to: 4.0
Stable tag: 2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Thumbs Rating does what you'd expect. It allows you to add a thumbs up/down to your content (posts, pages, custom post types...).

== Description ==

I needed a simple and light plugin to add Thumbs Rating, I couldn't find any so I built my own.

This plugin allows you to add a thumb up/down rating to your content. You can set it up to show anywhere you want, check out the Installation instructions.

The output is very basic, no images, no fonts, no fancy CSS. Customize the ouput overriding the CSS classes in your __style.css__ file.

= Features =

*   No output printed by default, __check the Installation instructions__.
*   Stores the votes values for each content.
*   Uses HTML5 LocalStorage to prevent the users from voting twice.
*   Easy to customize the output using CSS.
*   Show the most voted (positive/negative) items using shortcodes.
*   Show the buttons using shortcodes.

= Languages =


*	Catalan: ca
*	Chinese (China): zh_CN (by [suifengtec](http://wordpress.org/support/profile/suifengtec))
* 	Czech: cs_CZ (by [togur](http://wordpress.org/support/profile/togur/))
*   Dutch nl_NL (by [Thijs](http://wordpress.org/support/profile/thijsku))
*	English
*	French: fr_FR by Arnaud
* 	German: de_DE (by [webserviceXXL](http://profiles.wordpress.org/hvbx/))
* 	Japanese: ja by heySister721
*	Lithuanian: lt_LT by Andrius
*	Persian: fa_IR (by [Hamed.T](http://wordpress.org/support/profile/hamedt))
*	Portuguese: pt_BR by Felipe﻿
*	Romanian: ro_RO by (by [AlexCruz1989](https://wordpress.org/support/profile/alexcruz1989))
*	Russian: ru_RU (by [anatolt](http://wordpress.org/support/profile/anatolt))
*	Spanish: es_ES

Give me a hand and translate the plugin in your language, it's just a few words.

= Requests =

Feel free to post a request but let's keep it simple and light.

= Ping me / Blame me =

Are you using the plugin? Do you like it? Do you hate it? Let me know!

* Twitter: [@ricard_dev](http://twitter.com/ricard_dev)
* Blog: [Rick's code](http://php.quicoto.com/) 

== Installation ==

First of all activate the Plugin, then:

A) Add the shortcode to the posts or pages you want the Thumb Rating buttons to appear:

`[thumbs-rating-buttons]`


B) If you want to show the thumbs after all your content (posts, pages, custom post types) paste this snippet at the end of your __functions.php__ file of your theme:

`function thumbs_rating_print($content)
{
	return $content.thumbs_rating_getlink();
}
add_filter('the_content', 'thumbs_rating_print');`

C) Alternatively you can print the buttons only in certain parts of your theme. Paste the following snippet wherever you want them to show:

`<?=function_exists('thumbs_rating_getlink') ? thumbs_rating_getlink() : ''?>`

== Frequently Asked Questions ==

= I activated the plugin and I don't see the buttons =

You must specify where do you want to show the thumbs within your theme, __check out the Installation instructions__.

= Can I customize the colors? =

Absolutely. Check out the CSS within the plugin (__thumbs-rating/css/style.css__) and override the classes from your theme's __style.css__ file.

= When I sort the admin columns some posts disappear =

If the post/page has 0 votes for the column your trying to sort, WordPress hides it.
It only shows the posts/pages with at least +1 or -1 votes.

= How do I show the number of votes in other parts of my theme? =

Paste the following snippets inside the loop:

`<?=function_exists('thumbs_rating_show_up_votes') ? thumbs_rating_show_up_votes() : ''?>`

`<?=function_exists('thumbs_rating_show_down_votes') ? thumbs_rating_show_down_votes() : ''?>`

(Both functions accept the post ID as a parameter in case you need it)

= Shortcode =

The shortcode [thumbs_rating_top] accept the following parameters:

*	type: positive (default) / negative
*	posts_per_page: 5 (default)
*	category: ID (default = all)
* 	show_votes: yes (default) / no
* 	post_type: any (default) / post / page / books
* 	show_both: no (default) / yes

Here's an example using some parameters:

`[thumbs_rating_top type="positive" posts_per_page="10" post_type="post" show_votes="no"] `

= The shortcode in Widgets or Comments doesn't work =

You might need to allow shortcodes in that sections, [here's how](http://php.quicoto.com/how-to-allow-shortcodes-to-wordpress-comments/).

== Screenshots ==

1. Basic output with the default CSS with the TwentyThirteen theme.
2. This text is shown if you try to vote again.

== Changelog ==

= 2.1 =
* New language: Chinese (China): zh_CN

= 2.0 =
* New languages: Lithuanian (lt_LT) and Portuguese (pt_BR).
* Moved the + and - signs to the data attribute so they can be overwritten using css.

= 1.9 =
* New shortcode to show the buttons inside posts and pages.

= 1.8 =
* Improved the security, checking the ajax referer, props @frankiet
* Added Japanese (ja) translations by heySister721.

= 1.7.7 =
* Added Dutch (nl_NL) translations by Thijs.

= 1.7.6 =
* Added Romanian (ro_RO) translations by AlexCruz1989.

= 1.7.5 =
* Added French (fr_FR) translations by Arnaud.

= 1.7.4 =
* Fixed bug with the class .thumbs-rating-voted not being added to the buttons if the count was more than 0.

= 1.7.3 =
* Fixed bug with the shortcode ordering.

= 1.7.2 =
* Added Russian (ru_RU) translation.

= 1.7.1 =
* Improved the code to prevent multiple clicks. No DOM manipulation. Props @medariox and @ocean90

= 1.7 =
* Prevent the user from clicking multiple times, props @thequicksilver

= 1.6 =
* Added a new optional parameter to the shortcode: show_both="yes"

= 1.5.1 =
* Added Persian (fa_IR) translation.

= 1.5 =
* Added a shortcode to show the most voted items.
* Fixed warning in the Admin (only when WP_DEBUG = true).
* Added German de_DE translation.

= 1.4 =
* Improved security: prevent access to the file outside WordPress.
* Improved security: sanatize the parameters we receive from the JavaScript.
* Added two functions to print the thumbs values in your theme.

= 1.3 =
* Added a CSS class to the button after voting and on page load. You can use it to style the button different so the users knows he already voted.  This feature does not apply the CSS class to old votes, just the new ones after updating to the 1.3 version.

= 1.2 =
* Added "Up Votes" and "Down Votes" admin columns (they're shiny and sortable!)
* Deleted translation for: German and French. I used Google Translator and they didn't look correct.
* Updated translatations for: Spanish and Catalan.

= 1.1 =
* Added French, Catalan, German and Czech.

= 1.0 =
* First release.

== Upgrade Notice ==

= 2.1 =
* New language: Chinese (China): zh_CN

= 2.0 =
* New languages: Lithuanian (lt_LT) and Portuguese (pt_BR).
* Moved the + and - signs to the data attribute so they can be overwritten using css.

= 1.9 =
* New shortcode to show the buttons inside posts and pages.

= 1.8 =
* Security and Japanese translations.

= 1.7.7 =
* Added Dutch (nl_NL) translations by Thijs.

= 1.7.6 =
* Added Romanian (ro_RO) translations by AlexCruz1989.

= 1.7.5 =
* Added French (fr_FR) translations by Arnaud.

= 1.7.4 =
* Small tiny bug, feel free to upgrade nothing should break.

= 1.7.3 =
* Fixed bug with the shortcode ordering.

= 1.7.2 =
* Added Russian (ru_RU) translation.

= 1.7.1 =
* Improved the code to prevent multiple clicks.

= 1.7 =
* Prevent the user from clicking multiple times

= 1.6 =
* Added a new optional parameter to the shortcode: show_both="yes"

= 1.5.1 =
Added Persian translation.

= 1.5 =
Shortocode, Admin Warning and Translations.

= 1.4 =
Security update, please read the changelog.

= 1.3 =
You can style the buttons after clicking on them and after reloading the page.

= 1.2 =
Added admin columns: now you can see the number of votes from your admin screen!

= 1.1 =
Added French, Catalan, German and Czech.

= 1.0 =
First release, you'll love it.
