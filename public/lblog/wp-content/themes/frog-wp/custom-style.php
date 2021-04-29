<style type="text/css"><?php
    // Options from admin panel
    global $smof_data;

    if (empty($smof_data['logo-margin'])) { $smof_data['logo-margin'] = ''; }
    if (empty($smof_data['custom_css_style'])) { $smof_data['custom_css_style'] = ''; }
    if (empty($smof_data['header_color'])) { $smof_data['header_color'] = ''; }
    if (empty($smof_data['pattern_footer_img'])) { $smof_data['pattern_footer_img'] = ''; }
    if (empty($smof_data['main_color1'])) { $smof_data['main_color1'] = ''; }
    if (empty($smof_data['main_color2'])) { $smof_data['main_color2'] = ''; }
    if (empty($smof_data['thumbs_up_color'])) { $smof_data['thumbs_up_color'] = ''; }
    if (empty($smof_data['thumbs_down_color'])) { $smof_data['thumbs_down_color'] = ''; }
    if (empty($smof_data['entry_linkcolor'])) { $smof_data['entry_linkcolor'] = ''; }
    if (empty($smof_data['color_bg_color'])) { $smof_data['color_bg_color'] = ''; }
    if (empty($smof_data['header_links_color'])) { $smof_data['header_links_color'] = ''; }
?>
<?php
if($smof_data['logo-margin']) {
	echo '.logo { margin-top: '. $smof_data['logo-margin'] .'px !important; }';
}
if($smof_data['custom_css_style']) {
	echo $smof_data['custom_css_style']; //Custom CSS 
}
if($smof_data['header_color']) {// header bg
	echo 'header, .sticky, .jquerycssmenu ul li ul { background-color: '. $smof_data['header_color'] .' !important; }';
}
if($smof_data['pattern_footer_img']) {// footer pattern 
	echo 'footer { background: url('. $smof_data['pattern_footer_img'] .') !important; }';
}
if($smof_data['entry_linkcolor']) {// color link
    echo '.p-first-letter p a  { color: '. $smof_data['entry_linkcolor'] .' !important;}';
}
if($smof_data['header_links_color']) {// color menu link
    echo '.jquerycssmenu ul li a  { color: '. $smof_data['header_links_color'] .' !important;}';
}
if($smof_data['main_color1']) {// 1st main color.
	echo 'a:hover, .popular-words span, .top-social li a, .blog-ex1 .an-read-more a:hover, .review-box-nr i, .review-box-nr, .blog-ex2 .an-read-more a:hover, ul.aut-meta li.name a, div.p-first-letter p:first-child:first-letter, div.feed-info i, .article_list li .an-display-author a, .widget_anthemes_categories li, div.tagcloud span, .widget_archive li, .widget_meta li, #mcTagMap .tagindex h4, #sc_mcTagMap .tagindex h4 { color: '. $smof_data['main_color1'] .' !important;}'; //Main color = color
	echo '.bar-header, .popular-words strong, #searchform2 .buttonicon, .featured-articles .article-category, .blog-ex1 .article-category, .blog-ex2 .article-category, ul.masonry_list .article-category, a.author-nrposts, .related-articles .article-category, .entry-btn, .my-paginated-posts span, #newsletter-form input.newsletter-btn, ul.article_list .article-category, #contactform .sendemail, .social-section, #back-top span, .wp-pagenavi span.current, .wp-pagenavi a:hover { background-color: '. $smof_data['main_color1'] .' !important;}'; //Main bg color
	echo '#mcTagMap .tagindex h4, #sc_mcTagMap .tagindex h4 { border-bottom: 5px solid '. $smof_data['main_color1'] .' !important;}';
    echo '.jquerycssmenu ul li.current-home > a, .featured-articles .title-box span a, .blog-ex1 .an-read-more a, .blog-ex1 .an-home-title span a, .blog-ex2 .an-read-more a, .blog-ex2 .an-home-title span a, ul.masonry_list .an-widget-title span a, .related-articles .title-box span a, .single-breadcrumbs li a, .entry-top span a, div.feed-info strong, ul.article_list .an-widget-title span a, .copyright a  { border-bottom: 1px solid '. $smof_data['main_color1'] .' !important;}';
    echo '.menu-categories .jquerycssmenu ul li ul { border-top: 3px solid '. $smof_data['main_color1'] .' !important;}';
    echo '.prev-articles { border-top: dashed 5px '. $smof_data['main_color1'] .' !important;}';
    echo '.featured-articles .article-category i, .blog-ex1 .article-category i, .blog-ex2 .article-category i, ul.masonry_list .article-category i, .related-articles .article-category i, ul.article_list .article-category i   { border-color: '. $smof_data['main_color1'] .' transparent '. $smof_data['main_color1'] .' '. $smof_data['main_color1'] .' !important;}';
	echo '.p-first-letter p a { background-color: '. $smof_data['main_color1'] .';}'; //Main bg color
}
if($smof_data['main_color2']) {// 2nd main color.
	echo '.featured-title, .related-title, .single-content h3.title, .my-paginated-posts p a, .sidebar .widget h3.title, .sidebar-middle .widget h3.title, #wp-calendar tbody td#today, .comments h3.comment-reply-title, #commentform #submit, form.wpcf7-form input.wpcf7-submit, footer .widget h3.title  { background-color: '. $smof_data['main_color2'] .' !important; }';
    echo '.single-content h3.title i, .sidebar .widget h3.title i, .sidebar-middle .widget h3.title i, .comments h3.comment-reply-title i, footer .widget h3.title i { border-color: '. $smof_data['main_color2'] .' transparent '. $smof_data['main_color2'] .' '. $smof_data['main_color2'] .' !important;}';
}
if($smof_data['thumbs_up_color']) {// Thumbs color
	echo '.thumbs-rating-container .thumbs-rating-up    { color: '. $smof_data['thumbs_up_color'] .' !important; }';
}
if($smof_data['thumbs_down_color']) {// Thumbs color
	echo '.thumbs-rating-container .thumbs-rating-down    { color: '. $smof_data['thumbs_down_color'] .' !important; }';
}
if($smof_data['color_bg_color']) {
    echo 'html body  { background-color: '. $smof_data['color_bg_color'] .'!important; }';
}
?>
</style>
