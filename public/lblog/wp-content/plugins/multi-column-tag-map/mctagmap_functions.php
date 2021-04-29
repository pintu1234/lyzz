<?php
/* ===== 

You are free to modify this file but you should really create a folder in your
themes directory called (exactly) multi-column-tag-map and then copy this file 
to that folder. Make your edits to the copy. If you make your edits to the 
file in the plugins folder, all your edits will be overwritten if you update.

===== */ 
	
	/* =====  version 17.0.14 ===== */ 
	
	/* ** for anyone looking at the source, yes I leave in a lot of comments and print_r ;) ** */

	/* ===== set up options ===== */ 
	extract(shortcode_atts(array(
        "columns" => "2",
        "more" => "View More",
		"hide" => "no",
		"num_show" => "5",
		"toggle" => "no",
		"show_empty" => "no",
		"name_divider" => "|",
		"tag_count" => "no",
		"exclude" => "",
		"include" => "",
		"descriptions" => "no",
		"width" => "",
		"equal" => "no",
		"manual" => "",
		"basic" => "no",
		"basic_heading" => "no",
		"show_categories" => "no",
		"child_of" => "",
		"from_category" => "",
		"show_pages" => "no",
		"page_excerpt" => "no",
		"taxonomy" => "",
		"group_numbers" => "no",
		"show_navigation" => "no",
		"css3" => "no",
		"ie9" => "no",
		"show_posts" => "no",
		"post_type" => "no",
		"page_hierarchy" => "no",
		"show_child_pages" => "yes",
		"post_tags" => "",
		"minimum_count" => "0",
		"multi_page" => "no",
		"class" => "",
		"responsive" => "no",
		"force_first" => "",
		"force_first_nav" => "no",
		"thumbnail" => "",
		"thumbnail_linked" => "no",
		"show_authors" => "no",
		"author_bio" => "no",
		"author_avatar" => "",
		"author_avatar_linked" => "no",
		"authors_sort_last" => "no",
		"title_divider" => "",
		"order" => "ASC",
		"denote_numbers" => '0-9',
		"numbers_first" => "no",
		"sort_alpha" => "",
		"sort_alpha_numbers" => "yes",
		"sort_alpha_extras" => "no",
		"sort_alpha_groups" => "",
		"from_current" => "",
		"search" => "no",
		"count_order" => '',
	), $atts));

$mctagmapVersionNumber = "17.0.14";
$mctagmapCSSpath = $_SERVER['DOCUMENT_ROOT'].parse_url(get_stylesheet_directory_uri(), PHP_URL_PATH);
$mctmarr = get_option('mctagmapoptions');

	/* load the CSS */
	if(file_exists($mctagmapCSSpath.'/multi-column-tag-map/mctagmap.css')){
		wp_enqueue_style( 'mctagmapcss', get_stylesheet_directory_uri().'/multi-column-tag-map/mctagmap.css',false,$mctagmapVersionNumber,'all');
	} elseif(isset($mctmarr['use_custom']) && $mctmarr['use_custom']=='yes'){
	} else {
		wp_enqueue_style( 'mctagmapcss', plugin_dir_url( __FILE__ ).'mctagmap.css',false,$mctagmapVersionNumber,'all');
	}
	
	/* load the JS */
	if(file_exists($mctagmapCSSpath.'/multi-column-tag-map/mctagmap.js')){
		wp_register_script (
  			'mctm_scripts', /* handle WP will know JS by */
  			get_stylesheet_directory_uri().'/multi-column-tag-map/mctagmap.js',/* source */
  			array('jquery'), /* requires jQuery */
  			$mctagmapVersionNumber,
  			true /* can load in footer */
		);	
	} else {
		wp_register_script (
  			'mctm_scripts', /* handle WP will know JS by */
  			plugin_dir_url( __FILE__ ) . 'mctagmap.js', /* source */
  			array('jquery'), /* requires jQuery */
  			$mctagmapVersionNumber,
  			true /* can load in footer */
		);
	}
	if (!is_admin()) {
  		wp_enqueue_script('mctm_scripts');
	}
	
	$mctagmap_description = '';
	$id = '';
	$equalize = '';
	$tugPPTwidth = '';
	$mctagmap_count = '';
	$scarr = array();

	
	if(!in_array($columns, array(1, 2, 3, 4, 5))){
		$columns = "2";
	}
   
	if($show_empty == "yes"){
		$show_empty = "0";
	}
	if($show_empty == "no"){
		$show_empty = "1";
	}
	
	if($width){
		if(is_numeric($width)){
			$tugPPTwidth = "style=\"width: ". $width ."px;\"";
		} else {
			$tugPPTwidth = "style=\"width: ". $width ."\"";
		}
	}
	if($equal == "yes" && $columns != "1"){ 
		$equalize = 'mcEqualize';
	}
	if($toggle != "no"){
		$toggable = "toggleYes";
	} else {
		$toggable = "toggleNo";
	}
	
	if($class){
		$class = $class;
	} else { 
		$class = '';
	}
	
	if($from_current){
		$from_current = $from_current;
	} else {
		$from_current = '';
	}
	
	//wp_suspend_cache_addition(true);
	


	/* ===== show settings for debug purposes ===== */ 
	if(isset($_REQUEST[base64_decode('dHVnYWRtaW4=')])){ 

	
		$catlist = '';
		$colist = '';
		
		$childof = preg_replace('/\s+/', '', explode(',',$child_of));
		$child_of_list = array();
		foreach($childof as $kids){
			if(!empty($kids)){
					if(!is_numeric($kids)){
						$cat = get_category_by_slug($kids); 
						$kids = $cat->term_id;
					}
				array_push($child_of_list, $kids.' ('.get_cat_name($kids).')');
			}
		}
		foreach($child_of_list as $col1){
			$colist .= $col1.', ';
		}
		
		/* from cat */
		$fromcat = preg_replace('/\s+/', '', explode(',',$from_category));
		$fromcat_list = array();
		foreach($fromcat as $cats){
			if(!empty($cats)){
					if(!is_numeric($cats)){
						$cat = get_category_by_slug($cats); 
						$cats = $cat->term_id;
					}
				array_push($fromcat_list, $cats.' ('.get_cat_name($cats).')');
			}
		}
		foreach($fromcat_list as $col1l){
			$catlist .= $col1l.', ';
		}	
		$list = '<div>
			<style type="text/css">
				#tug-settings-mctagmap { border: 2px solid #ccc; background: #f8f8f8; font: 12px/16px monospace; padding: 10px; margin: 0; color: #333; }
				#tug-settings-mctagmap dt { padding: 0 0 8px 0; }
				#tug-settings-mctagmap dd { margin-bottom: 6px; }
			</style>
			<dl id="tug-settings-mctagmap">
				<dt>mctagmap settings: '.$mctagmapVersionNumber.'</dt>
					<dd>columns => '.$columns.'</dd>
					<dd>more => '.$more.'</dd>
					<dd>hide => '.$hide.'</dd>
					<dd>num_show => '.$num_show.'</dd>
					<dd>toggle => '.$toggle.'</dd>
					<dd>show_empty => '.$show_empty.'</dd>
					<dd>name_divider => '.$name_divider.'</dd>
					<dd>tag_count => '.$tag_count.'</dd>
					<dd>exclude => '.$exclude.'</dd>
					<dd>include => '.$include.'</dd>
					<dd>descriptions => '.$descriptions.'</dd>
					<dd>width => '.$width.'</dd>
					<dd>equal => '.$equal.'</dd>
					<dd>manual => '.$manual.'</dd>
					<dd>basic => '.$basic.'</dd>
					<dd>basic_heading => '.$basic_heading.'</dd>
					<dd>show_categories => '.$show_categories.'</dd>
					<dd>child_of => '.substr($colist,0,-2).'</dd>
					<dd>from_category => '.substr($catlist,0,-2).'</dd>
					<dd>show_pages => '.$show_pages.'</dd>
					<dd>page_excerpt => '.$page_excerpt.'</dd>
					<dd>taxonomy => '.$taxonomy.'</dd>
					<dd>group numbers => '.$group_numbers.'</dd>
					<dd>show_navigation => '.$show_navigation.'</dd>
					<dd>css3 => '.$css3.'</dd>
					<dd>ie9 => '.$ie9.'</dd>
					<dd>show_posts => '.$show_posts.'</dd>
					<dd>post_type => '.$post_type.'</dd>
					<dd>page_hierarchy => '.$page_hierarchy.'</dd>
					<dd>show_child_pages => '.$show_child_pages.'</dd>
					<dd>post_tags => '.$post_tags.'</dd>
					<dd>minimum_count => '.$minimum_count.'</dd>
					<dd>multi_page => '.$multi_page.'</dd>
					<dd>class => '.$class.'</dd>
					<dd>responsive => '.$responsive.'</dd>
					<dd>force_first => '.$force_first.'</dd>
					<dd>force_first_nav => '.$force_first_nav.'</dd>
					<dd>thumbnail => '.$thumbnail.'</dd>
					<dd>thumbnail_linked => '.$thumbnail_linked.'</dd>
					<dd>show_authors => '.$show_authors.'</dd>
					<dd>author_bio => '.$author_bio.'</dd>
					<dd>author_avatar => '.$author_avatar.'</dd>
					<dd>author_avatar_linked => '.$author_avatar_linked.'</dd>
					<dd>authors_sort_last => '.$authors_sort_last.'</dd>
					<dd>title_divider => '.$title_divider.'</dd>
					<dd>order => '.$order.'</dd>
					<dd>denote_numbers => '.$denote_numbers.'</dd>
					<dd>numbers_first => '.$numbers_first.'</dd>
					<dd>sort_alpha => '.$sort_alpha.'</dd>
					<dd>sort_alpha_numbers => '.$sort_alpha_numbers.'</dd>
					<dd>sort_alpha_extras => '.$sort_alpha_extras.'</dd>
					<dd>sort_alpha_groups => '.$sort_alpha_groups.'</dd>
					<dd>from_current => '.$from_current.'</dd>
					<dd>search => '.$search.'</dd>
					<dd>count_order => '.$count_order.'</dd>
			<!-- end dl -->';
			
			
			global $post;
			$contentQ = get_post_field('post_content', $post->ID);
			$pattern = get_shortcode_regex();
			if (   preg_match_all( '/'. $pattern .'/s', $contentQ, $matches )
				&& array_key_exists( 2, $matches )
				&& in_array( 'mctagmap', $matches[2] ) ){
					$list .= '<dd><br />'.$matches[0][0].'</dd>';
				}
			$list .= '</dl></div>';
	} else {
		$list = '';
	}

	$manual = str_replace(' ', '', strtoupper($manual));
	$manualArray = explode(',', $manual);

	if($responsive == "yes"){
		//$css3 = "yes";
	}	
	if($css3 == "yes"){
		$css3 = 'css3';
	}
    $list .= '<!-- begin list -->'."\n".'<div id="mcTagMap" class="'.$equalize.' '.$toggable.' '.$class.' '.$css3.'">'."\n";
	
	/* ===== set up what to get (tags, categories, etc...) ===== */ 
	if($taxonomy){
		$tags = array();
		$fromtax = preg_replace('/\s+/', '', explode(',',$taxonomy));
		foreach($fromtax as $tax){
			$args = array('order' => 'ASC','hide_empty' => $show_empty);
			$tags = array_merge($tags, get_terms($tax, $args));
		}
	} elseif($show_categories == "yes"){
		if($child_of != ""){
			$childof = array();
			$childof = preg_replace('/\s+/', '', explode(',',$child_of));
			$tags = array();
			foreach($childof as $kids){
					if(!is_numeric($kids)){
						$cat = get_category_by_slug($kids); 
						$kids = $cat->term_id;
					}
				$args = array(
					'child_of' => $kids,
					'order' => 'ASC',
					'hide_empty' => 0,
				);
				$childcats = get_categories($args);
				$tags = array_merge($tags, $childcats);
			}
		} else {
			$tags = get_categories('order=ASC&hide_empty='.$show_empty.'');
		}	
	} elseif($show_pages == "yes"){
		$page_child = 0;
		if($child_of != ""){
			$childofconv = array();
			$childof = preg_replace('/\s+/', '', explode(',',$child_of));
			foreach($childof as $kids){
				if(!is_numeric($kids)){
					$page = get_page_by_path($kids);
					unset($kids);
					$kids = $page->ID;
					$childofconv[] = $kids;
				} else {
					$childofconv[] = $kids;
				}
			}
			$tags = array();
			foreach($childofconv as $child){
				$p = get_pages(array('sort_order' => 'asc', 'sort_column' => 'post_title', 'post_status' => 'publish', 'child_of' => $child));
				$tags = array_merge($tags, $p);
			}
			//print_r($tags);
		} else {
			$tags = get_pages(array('sort_order' => 'asc', 'sort_column' => 'post_title', 'post_status' => 'publish'));
		}
		
	} elseif($from_category && $show_posts != "yes"){
		$tags = array();
		
		/* from cat */
		$fromcat = preg_replace('/\s+/', '', explode(',',$from_category));
		$posts_array = array();
		$catsx = '';
		if($from_category){
			foreach($fromcat as $cats){
				if(!is_numeric($cats)){
					$cat = get_category_by_slug($cats); 
					$catsx .= $cat->term_id.',';
				} else {
					$catsx .= $cats.',';
				}
			}
		}
		$posts_array = get_posts('category='.$catsx.'&numberposts=-1');
		foreach($posts_array as $pa) {
			$tags = array_merge($tags, wp_get_post_tags($pa->ID));		
		}
		$tmp = array();
		foreach($tags as $k => $v){
    		$tmp[$k] = $v->term_id;
 		}
		$tmp = array_unique($tmp);
 		foreach($tags as $k => $v){
    		if (!array_key_exists($k, $tmp)){
        		unset($tags[$k]);
			}
		}
	} elseif($show_posts == "yes"){
		if($post_type && $post_type != "no"){
			$type = $post_type;
		} else {
			$type = '';
		}
		/* from cat */
		$fromcat = preg_replace('/\s+/', '', explode(',',$from_category));
		$posts_array = array();
		$catsx = '';
		if($from_category){
			foreach($fromcat as $cats){
				if(!is_numeric($cats)){
					$cat = get_category_by_slug($cats); 
					$catsx .= $cat->term_id.',';
				} else {
					$catsx .= $cats.',';
				}
			}
		}
		$tags = get_posts(array('numberposts' => -1, 'sort_order' => 'asc', 'sort_column' => 'post_title', 'post_status' => 'publish', 'post_type' => $type, 'category' => $catsx, 'tag' => $post_tags));
	} elseif($show_authors != "no"){
		$a_array = 'post';
		$tags = get_users(array(
			'has_published_posts' => array($a_array),
			'order' => 'ASC',
			'sort_column' => 'display_name',
			));
		$authortags = array();
		foreach($tags as $tag){
			$authortags[] = $tag->data;
		}
		foreach($authortags as &$val){
			//$authortags['last_name'] = get_the_author_meta('last_name', $key->ID);
			$val->first_name = get_the_author_meta('first_name', $val->ID);
			$val->last_name = get_the_author_meta('last_name', $val->ID);
			$val->count = count_user_posts($val->ID);
		}
		$tags = $authortags;
		usort($tags, function ($a, $b) {
			return strnatcasecmp($a->last_name, $b->last_name);
		});
	} else {
		$tags = get_terms('post_tag', 'order=ASC&hide_empty='.$show_empty.''); 
	}
	
	/* woo test */
	/*
	$args = array(
		'product_cat' => 'product-category-chickens',
		'post_type' => 'product',
	);
	$tags = get_posts($args);
	print_r($tags);
	*/
	//https://developer.wordpress.org/reference/functions/get_terms/
	//http://bluffcitybrewers.localhost/woo-product/
	/* /woo test */
	
	/* from_current - this will override all the other queries above */
	if($from_current){
		$fcarray = explode(',',$from_current);
		$fcarray_show = strtolower(trim($fcarray[0]));
		if(trim($fcarray[1]) == '' || !isset($fcarray[1]) || !is_numeric($fcarray[1]) ){
			$fcarray_id = get_the_ID();
		} else {
			$fcarray_id = trim($fcarray[1]);
		}
		if($fcarray_show == 'tags'){
			$tags = wp_get_post_terms($fcarray_id, 'post_tag');
		}
		if($fcarray_show == 'categories'){;
			$tags = wp_get_post_terms($fcarray_id, 'category');
		}
		if($fcarray_show == 'taxonomies'){
			$tags = array();
			$taxes = get_post_taxonomies($fcarray_id); 
			foreach($taxes as $tax) {
				$tags = array_merge($tags, wp_get_post_terms($fcarray_id, $tax));
			}
		}
		if($fcarray_show != 'tags' && $fcarray_show != 'categories' && $fcarray_show != 'taxonomies'){
			/* this gets single taxonomy */
			$tags = wp_get_post_terms($fcarray_id, $fcarray_show);
		}
	}
	
	/*
	print_r($tags);
	die();
	*/
	
	/* === set a minimum count for tags and categories === */	
	foreach ($tags as $key => $value) {
		if(isset($value->count) && $value->count < $minimum_count){
			unset($tags[$key]);
		}
	}
	
	/* === create a variable to pull the correct title from the given arrays === */	
	$arraypart2 = '';
	if($show_pages == "yes" || $show_posts == "yes"){
		$arraypart = "post_title";
		if($page_excerpt == "yes"){
		}
	} elseif($show_authors != "no"){
		$arraypart = "display_name";
		if($authors_sort_last == "yes"){
			$arraypart = "last_name";
		}
	/* } elseif(isset($sort_alpha) && $sort_alpha != ''){ 
		$arraypart = "slug"; */
	} else {
		$arraypart = "name";
	}
	//$arraypart = "slug"; /* 022119 - 8sakura */
	
	/* === hide child pages === */
	if($show_pages == "yes" && $show_child_pages == "no" && $page_hierarchy == "no"){
		$newtags = array();
		foreach($tags as $tag){
			$childtags = array();
			if($tag->post_parent == 0){
				array_push($newtags, $tag);
			}
		}
		$tags = $newtags;
	}
	/* === show child pages by page_hierarchy === */
	

	if($show_pages == "yes" && $show_child_pages == "yes" && $page_hierarchy == "yes"){
		$parenttags = array();
		foreach($tags as $tag){
			if($tag->post_parent == 0){
				$parenttags[$tag->ID] = $tag;
			}
		}
		$tags = $parenttags;
	}
	
	/* === exclude tags === */
	/* spaces needed to be trim() - 11.19.18 */
	$ex = array();
	if($exclude != '' && $include === ''){
		$exclude = explode(',',$exclude);
		foreach($exclude as $e){
			$ex[] = trim($e);
		}
		$ex = implode(',',$ex);
		//print_r($ex);
		foreach($tags as $tag){
			$fl = mb_substr($tag->$arraypart ,0,1);
			$ll = mb_substr($tag->$arraypart ,1);
			$tag->$arraypart  = $fl.$ll;
			if (preg_match('/(?<=^|[^\p{L}\s])' . preg_quote($tag->$arraypart ,'/') . '(?=[^\p{L}\s]|$)/ui', $ex)) {
				unset($tag->$arraypart);

			}
		}
	}
	if(is_array($ex)){
		$exclude = implode($ex);
	} else {
		$exclude = $ex;
	}
	
	
	/* === include tags === */
	if($include != '' && $exclude === ''){
		foreach($tags as $tag){
			$fl = mb_substr($tag->$arraypart ,0,1);
			$ll = mb_substr($tag->$arraypart ,1);
			$tag->$arraypart  = $fl.$ll;
			if(preg_match('/(?<=^|[^\p{L}])' . preg_quote($tag->$arraypart ,'/') . '(?=[^\p{L}]|$)/ui', $include)) {
			} else {
				unset($tag->$arraypart );
			}
		}
	}

	/* ===== show only one tag ===== */ 
	if(strpos($exclude,'*!') !== false){
		foreach($tags as $tag){
			$exclude = str_replace('*!', '', $exclude);
			if(strpos($tag->name, $exclude) == false) {
				unset($tag->$arraypart);
			}
		}
	}
	
	

	/* ===== start grouping the tags ===== */ 
	
	/* == translate stuff == */
	if(isset($sort_alpha) && $sort_alpha != ''){
		$alc = preg_replace('/\d/', '', $sort_alpha);
		if(strpos($alc, ',') !== false){
			$alc = explode(',',$alc);
		} else {
			$len = mb_strlen($alc, 'UTF-8');
			$result = [];
			for ($i = 0; $i < $len; $i++) {
				$result[] = mb_substr($alc, $i, 1, 'UTF-8');
			}
			$alc = $result;
		}
		$strings = $alc; 
		$newStrings = array();
		foreach($strings as $string){
			 $newStrings[mb_strlen($string, "UTF-8")][] = $string;
		}
		//print_r($newStrings);
		$length = sizeof($newStrings);
	}
	/* == translate stuff == */
	
	$groups = array();
	if( $tags && is_array( $tags ) ) {
		foreach( $tags as $tag ) {	
			/* ===== exclude tags ===== */ 
			if(isset($tag->$arraypart)){	
				// added 09.02.11
				if (strlen(strstr($tag->$arraypart, $name_divider))>0) {
					$tag->$arraypart = preg_replace("/\s*([\\".$name_divider."])\s*/", "$1", $tag->$arraypart);
					$tagParts = explode($name_divider, $tag->$arraypart);
					$tag->$arraypart = $tagParts[1].', '.$tagParts[0];
				}
				$td = explode(',',preg_replace('/\s*,\s*/', ',', $title_divider));
				if ($title_divider != '') {
					$fw = strtok($tag->$arraypart, ' ');
					if (in_array($fw, $td)) {
						$tag->$arraypart = $tag->$arraypart;
						//echo $tag->$arraypart.'<br>';
						$tagParts = explode($fw, $tag->$arraypart);
						$tag->$arraypart = trim($tagParts[1].', '.$fw);
						$tag->first_word = $fw;
					}
				}
				if(function_exists('mb_strtoupper')) {
					/* https://stackoverflow.com/a/25229440 */
					if(!is_numeric($tag->$arraypart) && !preg_match('/[^\\p{Common}\\p{Latin}]/u', $tag->$arraypart)){
						if(isset($sort_alpha) && $sort_alpha != ''){
							for ($i = 1; $i <= $length; $i++) {
								if($i != 1){
									if(in_array(strtolower(mb_substr($tag->$arraypart,0,$i)), array_map('strtolower', $newStrings[$i]))){
										$first_letter = mb_strtoupper(mb_substr($tag->$arraypart,0,$i));
									} 
								}
								 else {
									$first_letter = mb_strtoupper(mb_substr($tag->$arraypart,0,1));
								}
							}
						} else {
							$first_letter = mb_strtoupper(mb_substr($tag->$arraypart,0,1));
						}
					} else {
						$first_letter = mb_strtoupper(mb_substr($tag->$arraypart,0,1));
					}
				} else {
					if(!is_numeric($tag->$arraypart) && !preg_match('/[^\\p{Common}\\p{Latin}]/u', $tag->$arraypart)){
						if(isset($sort_alpha) && $sort_alpha != ''){
							$length = count($newStrings);
							for ($i = 1; $i <= $length; $i++) {
								if($i != 1){
									if(in_array(strtolower(substr($tag->$arraypart,0,$i)), array_map('strtolower', $newStrings[$i]))){
										$first_letter = strtoupper(mb_substr($tag->$arraypart,0,$i));
									} 
								} else {
									$first_letter = strtoupper(substr($tag->$arraypart,0,1));
								}
							}
						} else {
							$first_letter = strtoupper(substr($tag->$arraypart,0,1));
						}
					} else {
						$first_letter = strtoupper(substr($tag->$arraypart,0,1));
					}
				}
				$groups[$first_letter][] = $tag;
				ksort($groups, SORT_STRING);
				$fl_array[] = $first_letter;
			}
		}
		//print_r($groups);
		
		/* remove all non-latin ['names'] */
		/*
		if(isset($sort_alpha) && $sort_alpha != ''){
			foreach($groups as $keys => $key){
				foreach($key as $k => $val){
					if(preg_match('/[^\\p{Common}\\p{Latin}]/u', $val->name)){
						unset($groups[$keys][$k]);
					}
				}
			}
			//print_r($groups); die();
		}	*/
		
		$sag2 = array();
		if($sort_alpha_groups != ''){
			$sag = explode(',', mb_strtoupper($sort_alpha_groups));
			foreach($sag as $sags){
				$sagarr[] = explode('|', $sags);
			}
			foreach($sagarr as $key => $val) {
			   $sag2[$val[0]] = $val[1];
			}
			foreach($sag2 as $s2 => $val){
				if(is_array($groups[$s2]) && is_array($groups[$val])){
					$groups[$s2] = array_merge($groups[$s2], $groups[$val]);
					unset($groups[$val]);
				}
			}
		}

/* == translate stuff == */
		$alpha_groups = array();
		if(isset($sort_alpha) && $sort_alpha != ''){
			if(!function_exists('str_split_unicode')){
			function str_split_unicode($str, $l = 0) {
				if ($l > 0) {
					$ret = array();
					$len = mb_strlen($str, "UTF-8");
					for ($i = 0; $i < $len; $i += $l) {
						$ret[] = mb_substr($str, $i, $l, "UTF-8");
					}
					return $ret;
				}
				if(strpos($str, ',') !== false){
					return preg_split('/,/', $str, 0, PREG_SPLIT_NO_EMPTY);
				} else {
					return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
				}
			}
			}			
			$alpha_characters = mb_strtoupper($sort_alpha);
			// 'ABcdEFG1HIJKLMNOPQRSTUVwXyzÃ¦Ã¸Ã¥'
			$alpha_characters = preg_replace('/\d/', '', $alpha_characters);
			if(strpos($alpha_characters, ',') !== false){
				$alpha_numbers = ',0,1,2,3,4,5,6,7,8,9';
			} else {
				$alpha_numbers = '0123456789';
			}
			$alphabet = $alpha_characters.$alpha_numbers;
			if($numbers_first == 'yes'){
				$alphabet = $alpha_numbers.$alpha_characters;
			}
			$sort_by = str_split_unicode($alphabet);
			//print_r($sort_by);
			$temp_arr = array();
			foreach ($sort_by as $key) {
				if(is_array($groups[$key])){
					$temp_arr[$key] = $groups[$key];
				}
				/* un comment for prod! */
			}
			$alpha_groups = $temp_arr;
			//print_r($alpha_groups);
		}
		$non_alpha_groups = array_diff_assoc($groups, $alpha_groups);
		if($sort_alpha_extras == 'yes'){
			$groups = $alpha_groups+$non_alpha_groups;
		} else {
			if(isset($alpha_groups) && !empty($alpha_groups)){
				$groups = $alpha_groups;
			} else {
				$groups = $groups;
			}
		}
		if($sort_alpha_numbers == 'no'){
			foreach ($groups as $key => $value) {
				if (is_int($key)) {
					unset($groups[$key]);
				}
			}
		}
		//print_r($groups);
		


/* == /translate stuff == */		

		
		/* ==== resort numbers so 0 doesn't mess it all up ==== */
		if($numbers_first != "yes"){
			foreach ($groups as $key => $value) {
				if(is_int($key) || preg_match('[pL]', $key)){ /* \W */
					if(preg_match('[\pL]', $key)){
						$scarr[$key] = $groups[$key];
						unset($groups[$key]);
					} else {
						$numar = $groups[$key];
						unset($groups[$key]);
						$groups[$key] = $numar;
					}
				}
			}
		}
		//print_r($groups);
		if($scarr){
			/* thanks to @uncovery */
			$groups += $scarr;
		}
				
		/* ===== group numbers ===== */ 
		if($group_numbers == 'yes'){
			$numericArray = array_filter(array_keys($groups), 'is_numeric');
			$ed = array_keys($groups);
			$d = array_diff_assoc($ed, $numericArray);
			$numGroups = $groups;
			foreach($d as $dd){
				$numGroups[$dd] = "";
			}
			ksort($numGroups);		
			if(!function_exists('mctm_flatten')) {
				function mctm_flatten($arr, $base = "", $divider_char = "/") {
					$ret = array();
					if(is_array($arr)) {
						foreach($arr as $k => $v) {
							if(is_array($v)) {
								$tmp_array = mctm_flatten($v, $base.$k.$divider_char, $divider_char);
								$ret = array_merge($ret, $tmp_array);
							} else {
								$ret[$base.$k] = $v;
							}
						}
					}
					return $ret;
				}
			}
	
			$numbersArray = array_filter(array_values(mctm_flatten($numGroups)));
			
			$groups = array_map('unserialize', array_diff(array_map('serialize', $groups), array_map('serialize', $numGroups)));
			

			/* make the numbers in order - finally */
			if(strtoupper($order) == 'DESC'){
				usort($numbersArray, function($b, $a) {
					return (int)$a->slug - (int)$b->slug;
				});
			} else {
				usort($numbersArray, function($a, $b) {
					return (int)$a->slug - (int)$b->slug;
				});
			}
			
			if(!empty($numbersArray)){	
				//$numbersArray = array_reverse($numbersArray);
				$nums = array($denote_numbers => $numbersArray);
				if($numbers_first == "yes"){
					$groups = array_merge($nums, $groups);
				} else {
					$groups = array_merge($groups, $nums);
				}
			} 
		}
		
		/* ===== create the navigation ===== */ 
		if($show_navigation == "yes"){
			$list .= '<div id="mcTagMapNav">'."\n";
			/* ===== force_first ===== */
			if($force_first != "" && $force_first_nav == 'yes' && $group_numbers != 'yes'){
				$force_first = strtoupper($force_first);
				$groups = array($force_first => $groups[$force_first]) + $groups;
			}
		
			foreach( array_keys($groups) as $fl ) {
				if(strlen($fl) > 1){
					$fl = mb_convert_case($fl, MB_CASE_TITLE, "UTF-8");
				}
				$flc = '';
				if(is_array($sag2) && array_key_exists($fl,$sag2)){
					$group_letter = $sag2[$fl];
					if(in_array($group_letter, $fl_array)){
						$flc = ', '.$group_letter;
					}
				}
				if($multi_page == "yes"){
					$list .= '<a href="?mctm-page='.mb_strtoupper($fl).'">'.$fl.$flc.'</a>'."\n";
				} else {
					$list .= '<a href="#mctm-mctmcounter-'.mb_strtoupper($fl).'">'.$fl.$flc.'</a>'."\n";
				}
			}
			$list .= '</div>'."\n";
		}
		
		/* ====== multi page ======== */
		if($multi_page == "yes"){
			$allowed = array();
			if(isset($_REQUEST['mctm-page']) && $_REQUEST['mctm-page'] != ''){
				$mctm_page = $_REQUEST['mctm-page'];
				array_push($allowed, $mctm_page);
			} else {
				$ak0 = array_keys($groups);
				array_push($allowed, $ak0[0]);
			}
			$groups = array_intersect_key($groups, array_flip($allowed));
		}
		$group_length = count($groups);
	
	/* ===== build columns ===== */ 	
	if( !empty ( $groups ) ) {	
			
		$count = 0;
		$howmany = count($groups);
		
		/* ===== two columns ===== */ 
		if ($columns == 2){
			$firstrow = ceil($howmany * 0.5);
	   	 $secondrow = ceil($howmany * 1);
	    	$firstrown1 = ceil(($howmany * 0.5)-1);
	    	$secondrown1 = ceil(($howmany * 1)-0);
		}
		
		/* ===== three columns ===== */ 
		if ($columns == 3){
	    	$firstrow = ceil($howmany * 0.33);
	    	$secondrow = ceil($howmany * 0.66);
	    	$firstrown1 = ceil(($howmany * 0.33)-1);
	    	$secondrown1 = ceil(($howmany * 0.66)-1);
		}
		
		/* ===== four columns ===== */ 
		if ($columns == 4){
	    	$firstrow = ceil($howmany * 0.25);
	    	$secondrow = ceil(($howmany * 0.5)+1);
	    	$firstrown1 = ceil(($howmany * 0.25)-1);
	    	$secondrown1 = ceil(($howmany * 0.5)-0);
			$thirdrow = ceil(($howmany * 0.75)-0);
	    	$thirdrow1 = ceil(($howmany * 0.75)-1);
		}
		
		/* ===== five columns ===== */ 
		if ($columns == 5){
	    	$firstrow = ceil($howmany * 0.2);
	    	$firstrown1 = ceil(($howmany * 0.2)-1);
	    	$secondrow = ceil(($howmany * 0.4));
			$secondrown1 = ceil(($howmany * 0.4)-1);
			$thirdrow = ceil(($howmany * 0.6)-0);
	    	$thirdrow1 = ceil(($howmany * 0.6)-1);
			$fourthrow = ceil(($howmany * 0.8)-0);
	    	$fourthrow1 = ceil(($howmany * 0.8)-1);
		}
		
		if($multi_page == "yes"){
			$mpclass = ' mctmmultipage';
		} else {
			$mpclass = '';
		}		
		
		$list .= '<div class="holdinner'.$mpclass.'">'."\n";
		
		if($responsive == "yes" && $basic != "yes" && $manual == '' && $multi_page != "yes"){
			$list .= '<div class="responsive">'."\n";
		}
		
		if(!$manual && $basic == "no"){
		/* ===== display columns ===== */ 

		/* ===== force_first ===== */
		if($force_first != "" && $group_numbers != 'yes'){
			$force_first = strtoupper($force_first);
			$groups = array($force_first => $groups[$force_first]) + $groups;
		}
		
		foreach( $groups as $letter => $tags ) { 
			if($css3 == "no" || preg_match('/(?i)msie [5-9]/',$_SERVER['HTTP_USER_AGENT']) && $ie9 == "yes"){
				if($responsive != "yes"){
					if ($columns == 2){
						if ($count == 0 || $count == $firstrow || $count ==  $secondrow) { 
							if ($count == $firstrow){
								$list .= "\n<div class='holdleft noMargin' ". $tugPPTwidth .">\n";
								$list .="\n";
							} else {
								$list .= "\n<div class='holdleft' ". $tugPPTwidth .">\n";
								$list .="\n";
							}
						}
					}
					if ($columns == 3){
						if ($count == 0 || $count == $firstrow || $count ==  $secondrow) { 
							if ($count == $secondrow){
								$list .= "\n<div class='holdleft noMargin' ". $tugPPTwidth .">\n";
								$list .="\n";
							} else {
								$list .= "\n<div class='holdleft' ". $tugPPTwidth .">\n";
								$list .="\n";
							}
						}
					}
					if ($columns == 4){				
						if ($count == 0 || $count == $firstrow || $count ==  $secondrow || $count == $thirdrow) { 
							if ($count == $thirdrow){
								$list .= "\n<div class='holdleft noMargin' ". $tugPPTwidth .">\n";
								$list .="\n";
							} else {
								$list .= "\n<div class='holdleft' ". $tugPPTwidth .">\n";
								$list .="\n";
							}
						}
					}
					if ($columns == 5){
						if ($count == 0 || $count == $firstrow || $count ==  $secondrow || $count == $thirdrow || $count == $fourthrow ) { 
							if ($count == $fourthrow){
								$list .= "\n<div class='holdleft noMargin' ". $tugPPTwidth .">\n";
								$list .="\n";
							} else {
								$list .= "\n<div class='holdleft' ". $tugPPTwidth .">\n";
								$list .="\n";
							}
						}
					}
				}
			}
			/* =====  start bulding the individual lists for each letter ===== */ 
			$list .= "\n".'<div class="tagindex">';
			$list .="\n";
			if(strlen($letter) > 1){
				$letter = mb_convert_case($letter, MB_CASE_TITLE, "UTF-8");
			}
			$flc = '';
			if(is_array($sag2) && array_key_exists($letter,$sag2)){
				$group_letter = $sag2[$letter];
				if(in_array($group_letter, $fl_array)){
					$flc = ', '.$group_letter;
				}
			}
			//$list .='<h4 id="mctm-mctmcounter-'.strtoupper($letter).'">' . apply_filters( 'the_title', $letter, '' ) .$flc.'</h4>';
			$list .='<h4 id="mctm-mctmcounter-'.strtoupper($letter).'">' . $letter .$flc.'</h4>';
			$list .="\n";
			if($responsive == "yes" && $multi_page == "yes"){ ?>
				<style>
				#mcTagMap .tagindex ul, #sc_mcTagMap .tagindex ul {
					-webkit-columns: <?php echo $columns; ?> <?php echo $width; ?>;
					-moz-columns: <?php echo $columns; ?> <?php echo $width; ?>;
					columns: <?php echo $columns; ?> <?php echo $width; ?>;
				}
				</style>
			<?php }
			$list .= '<ul class="links">';
			$list .="\n";			
			$i = 0;
	
			/* ===== this helps sort non-english characters ===== */ 
			if($letter != $denote_numbers || is_numeric($letter)){ /* don't resort numbers */
				if($show_pages == "yes" || $show_posts == "yes"){
					if(strtoupper($order) == 'DESC'){
						usort($tags, function ($b, $a) {
							return strnatcasecmp($a->post_title, $b->post_title);
						});
					} else {
						usort($tags, function ($a, $b) {
							return strnatcasecmp($a->post_title, $b->post_title);
						});
					}
					if($sort_alpha_groups != ''){
						if(strtoupper($order) == 'DESC'){
							usort($tags, function ($b,$a) {
								return strnatcasecmp($a->post_name, $b->post_name);
							});
						} else {
							usort($tags, function ($a,$b) {
								return strnatcasecmp($a->post_name, $b->post_name);	
							});
						}
					}
				} elseif($show_authors == 'yes'){
					if(strtoupper($order) == 'DESC'){
						usort($tags, function ($b,$a) {
							return strnatcasecmp($a->display_name, $b->display_name);
						});
					} else {
						usort($tags, function ($a,$b) {
							return strnatcasecmp($a->display_name, $b->display_name);
						});
					}
				} else {
					if(strtoupper($order) == 'DESC'){
						usort($tags, function ($b,$a) {
							return strnatcasecmp($a->name, $b->name);
						});
					} else {
						usort($tags, function ($a,$b) {
							return strnatcasecmp($a->name, $b->name);
						});
					}						
				}
				if($sort_alpha_groups != ''){
					if(strtoupper($order) == 'DESC'){
						usort($tags, function ($b,$a) {
							return strnatcasecmp($a->slug, $b->slug);
						});
					} else {
						usort($tags, function ($a,$b) {
							return strnatcasecmp($a->slug, $b->slug);
						});
					}
				}
			} /* don't resort numbers */
			//print_r($tags);
			if($count_order != '' && $show_pages != "yes" && $show_posts != "yes"){
				if(strtoupper($count_order) == 'ASC'){
					if($show_authors == "yes"){
						array_multisort(array_column($tags, 'count'), SORT_ASC, array_column($tags, 'display_name'), SORT_ASC, $tags);
					} else {
						array_multisort(array_column($tags, 'count'), SORT_ASC, array_column($tags, 'slug'), SORT_ASC, $tags);
					}
				} else {
					if($show_authors == "yes"){
						array_multisort(array_column($tags, 'count'), SORT_DESC, array_column($tags, 'display_name'), SORT_ASC, $tags);
					} else {
						array_multisort(array_column($tags, 'count'), SORT_DESC, array_column($tags, 'slug'), SORT_ASC, $tags);
					}
				}
			}

			foreach( $tags as $tag ) {
				/* =====  exclude tags ===== */ 
				if(isset($tag->$arraypart)){
					/* =====  tag count ===== */ 
					if($tag_count == "yes" && $show_pages != "yes" && $show_authors != "yes"){
						$mctagmap_count = ' <span class="mctagmap_count">('.$tag->count.')</span>';
					}
					if($show_authors == "yes" && $tag_count == "yes"){
						$mctagmap_count = ' <span class="mctagmap_count">('.count_user_posts($tag->ID).')</span>';
					}

					if($taxonomy){
						$fromtaxx = preg_replace('/\s+/', '', explode(',',$taxonomy));
						foreach($fromtaxx as $taxx){
							$url = get_term_link($tag, $taxx);
							if($search == 'yes'){
								$url = site_url().'?s='.$tag->name;
							}
						}
						//$url = get_term_link($tag->slug, $taxonomy);
					} elseif($show_categories == "yes"){
						$url = get_category_link($tag->term_id); 
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->name;
						}
					} elseif($show_pages == "yes" || $show_posts == "yes"){
						$url = get_permalink($tag->ID); 
						$pex = mctm_get_the_excerpt_here($tag->ID);
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->post_title;
						}
					} elseif($from_category){
						$url = esc_attr( get_tag_link( $tag->term_id ) ).'?mctmCatId='.$from_category.'&mctmTag='.$tag->slug; 
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->name;
						}
					} elseif($show_authors != "no"){
						$url = get_author_posts_url($tag->ID);
						if($authors_sort_last == "yes"){
							$arraypart2 = ", ".$tag->first_name;
						}
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->display_name;
						}
					} else {
						$url = esc_attr( get_tag_link( $tag->term_id ) ); 
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->name;
						}
					}
					//$name = apply_filters( 'the_title', $tag->$arraypart.$arraypart2, '' );
					$name = $tag->$arraypart.$arraypart2;
					if(isset($tag->first_word)){
						$tap  = explode(',',$tag->$arraypart);
						//$name = apply_filters( 'the_title', $tag->first_word.' '.$tap[0].$arraypart2, '' );
						$name = $tag->first_word.' '.$tap[0].$arraypart2;
					}
					
					/* =====  show descriptions / excerpts ===== */ 
					if($descriptions == "yes"){
						$mctagmap_description = '<span class="tagDescription">' . $tag->description . '</span>';
					}
					if($page_excerpt == "yes"){
						$mctagmap_description = '<span class="tagDescription">' . $pex . '</span>';
					}
					if($author_bio == "yes"){
						$mctagmap_description = '<span class="tagDescription">' .nl2br(get_the_author_meta('description', $tag->ID)) . '</span>';
					}

					$i++;
					$counti = $i;
					
					
					/* === thumbnails === */
					$thumb1 = '';
					$thumb2 = '';
					if($thumbnail != '' && $thumbnail_linked == "no"){
						$thumb1 = get_the_post_thumbnail($tag->ID, $thumbnail);
					}
					if($thumbnail != '' && $thumbnail_linked == "yes"){
						$thumb2 = get_the_post_thumbnail($tag->ID, $thumbnail);
					}
					
					if($show_authors != "no"){
						$avatar_size = '96';
						if(is_numeric($author_avatar)){
							$avatar_size = $author_avatar;
						}
						if($author_avatar != '' && $author_avatar_linked == "no"){
							$thumb1 = get_avatar($tag->ID, $avatar_size);
						}
						if($author_avatar != '' && $author_avatar_linked == "yes"){
							$thumb2 = get_avatar($tag->ID, $avatar_size);
						}
					}
					
					
					/* =====  if hide = yes ===== */ 
					if ($hide == "yes"){
						$num2show = $num_show;
						$num2show1 = ($num_show +1);
						if ($i != 0 and $i <= $num2show) {
							$list .= '<li>'.$thumb1.'<a title="' . $name . '" href="' . $url . '">' . $thumb2 . $name . '</a>'. $mctagmap_count . $mctagmap_description;
						}
						if ($i > $num2show && $i == $num2show1 && $toggle == "no") {
							$list .=  "<li class=\"morelink\">"."<a href=\"#x\" class=\"more\">".$more."</a>"."</li>"."\n";
						}
						if ($i >= $num2show1){
               				$list .= '<li class="hideli">'.$thumb1.'<a title="' . $name . '" href="' . $url . '">' . $thumb2 . $name . '</a>' . $mctagmap_count . $mctagmap_description;
						}
					} else {
						$list .= '<li>'.$thumb1.'<a title="' . $name . '" href="' . $url . '">' . $thumb2 . $name .' '.$id.'</a>' . $mctagmap_count . $mctagmap_description;
					}
						if($show_pages == "yes" && $show_child_pages == "yes" && $page_hierarchy == "yes"){
							if(count(get_pages('child_of='.$tag->ID)) > 0){
								$list .= "\n\t".'<ul>'."\n\t\t".wp_list_pages('echo=0&title_li=&child_of='.$tag->ID)."\t".'</ul>'."\n";
							}
						}
						$list .= '</li>'."\n";
					}	
				}
				/* =====  toggle link ===== */ 
			if ($hide == "yes" && $toggle != "no" && $i == $counti && $i > $num2show) {
				$list .=  "<li class=\"morelink\">"."<a href=\"#x\" class=\"more\">".$more."</a>"."<a href=\"#x\" class=\"less\">".$toggle."</a>"."</li>"."\n";
			}	 
		 
			$list .= '</ul>';
			$list .="\n";
			$list .= '</div>';
			
			/* =====  close the columns ===== */ 
			if($css3 == "no" || preg_match('/(?i)msie [5-9]/',$_SERVER['HTTP_USER_AGENT']) && $ie9 == "yes"){
			if($responsive != "yes"){
				$list .="\n\n";
				if ($columns == 3 || $columns == 2){
					if ( $count == $firstrown1 || $count == $secondrown1) { 
						$list .= "</div>"; 
					}	
				}
				if ($columns == 4){
					if ( $count == $firstrown1 || $count == $secondrown1 || $count == $thirdrow1) { 
						$list .= "</div>"; 
					}	
				}
				if ($columns == 5){		
					if ( $count == $firstrown1 || $count == $secondrown1 || $count == $thirdrow1 || $count == $fourthrow1) { 
						$list .= "</div>"; 
					}	
				}
			}
			}
			$count++;
		} 
			if($group_length > 1 && $css3 != 'css3' && $responsive == "no"){
				$list .="</div>"."\n";
			}
		}
		
	}	

/* ==================== manual  settings ==================== */
	if($manual && $basic == "no" && $responsive == "yes"){
		$list .= '<p><strong>NOTE: <em>manual</em> and <em>responsive="yes"</em> do not work together. Use <em>columns</em> instead.</strong></p>';
		$list .= '<p><strong>See the <a href="https://wordpress.org/plugins/multi-column-tag-map/#installation">documentaion</a></strong></p>';
	}
	if($manual && $basic == "no" && $responsive != "yes"){
		$list .= "\n<div class='holdleft' ". $tugPPTwidth .">\n";
		$manualCount = 1;
		foreach( $groups as $letter => $tags ) {	
			foreach(array(strtoupper(apply_filters('the_title', $letter))) as $qw) { 
				if(in_array($qw, $manualArray)){
					if($manualCount == count($manualArray)){
						$marginEh = "noMargin";
						$endManual = '</div>';
					}
					$list .= "</div>\n<div class='holdleft ". $marginEh ."' ". $tugPPTwidth . ">\n";
					$manualCount++;
				}			
			}
		$list .= "\n".'<div class="tagindex">';
		$list .="\n";
		$list .='<h4 id="mctm-mctmcounter-'.strtoupper($letter).'">' . apply_filters( 'the_title', $letter, '' ) . '</h4>';
		$list .="\n";
		$list .= '<ul class="links">';
		$list .="\n";			
		$i = 0;
		
		/* ===== this helps sort non-english characters ===== */ 
		if($letter != $denote_numbers || is_numeric($letter)){ /* don't resort numbers */
			if($show_pages == "yes" || $show_posts == "yes"){
				if(strtoupper($order) == 'DESC'){
					usort($tags, function ($b, $a) {
						return strnatcasecmp($a->post_title, $b->post_title);
					});
				} else {
					usort($tags, function ($a, $b) {
						return strnatcasecmp($a->post_title, $b->post_title);
					});
				}
			} else {
				if(strtoupper($order) == 'DESC'){
					usort($tags, function ($b,$a) {
						return strnatcasecmp($a->name, $b->name);
					});
				} else {
					usort($tags, function ($a,$b) {
						return strnatcasecmp($a->name, $b->name);
					});
				}						
			}
		}
		


		foreach( $tags as $tag ) {
			/* =====  exclude tags ===== */ 
			if(isset($tag->$arraypart)){
			if($tag_count == "yes" && $show_pages != "yes"){
				$mctagmap_count = ' <span class="mctagmap_count">('.$tag->count.')</span>';
			}
		
					if($taxonomy){
						$fromtaxx = preg_replace('/\s+/', '', explode(',',$taxonomy));
						foreach($fromtaxx as $taxx){
							$url = get_term_link($tag, $taxx);
							if($search == 'yes'){
								$url = '?s='.$tag->name;
							}
						}
						//$url = get_term_link($tag->slug, $taxonomy);
					} elseif($show_categories == "yes"){
						$url = get_category_link($tag->term_id); 
						if($search == 'yes'){
							$url = '?s='.$tag->name;
						}
					} elseif($show_pages == "yes" || $show_posts == "yes"){
						$url = get_permalink($tag->ID); 
						$pex = mctm_get_the_excerpt_here($tag->ID);
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->post_title;
						}
					} elseif($from_category){
						$url = esc_attr( get_tag_link( $tag->term_id ) ).'?mctmCatId='.$from_category.'&mctmTag='.$tag->slug; 
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->name;
						}
					} elseif($show_authors != "no"){
						$url = get_author_posts_url($tag->ID);
						if($authors_sort_last == "yes"){
							$arraypart2 = ", ".$tag->first_name;
						}
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->display_name;
						}
					} else {
						$url = esc_attr( get_tag_link( $tag->term_id ) ); 
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->name;
						}
					}
		
			$name = apply_filters( 'the_title', $tag->$arraypart, '' );
			
			/* =====  show descriptions / excerpts ===== */ 
			if($descriptions == "yes"){
				$mctagmap_description = '<span class="tagDescription">' . $tag->description . '</span>';
			}
			if($show_pages == "yes" && $page_excerpt == "yes"){
				$mctagmap_description = '<span class="tagDescription">' . $pex. '</span>';
			}
			$i++;
			$counti = $i;
			if ($hide == "yes"){
				$num2show = $num_show;
				$num2show1 = ($num_show +1);
				if ($i != 0 and $i <= $num2show) {
					$list .= '<li><a title="' . $name . '" href="' . $url . '">' . $name . '</a>'. $mctagmap_count . $mctagmap_description;
					$list .="\n";
				}
				if ($i > $num2show && $i == $num2show1 && $toggle == "no") {
					$list .=  "<li class=\"morelink\">"."<a href=\"#x\" class=\"more\">".$more."</a>"."</li>"."\n";
				}
				if ($i >= $num2show1){
               		$list .= '<li class="hideli"><a title="' . $name . '" href="' . $url . '">' . $name . '</a>' . $mctagmap_count . $mctagmap_description;
			   		$list .="\n";
				}
			} else {
				$list .= '<li><a title="' . $name . '" href="' . $url . '">' . $name . '</a>' . $mctagmap_count . $mctagmap_description;
				$list .="\n";
			}	
			if($show_pages == "yes" && $show_child_pages == "yes" && $page_hierarchy == "yes"){
				if(count(get_pages('child_of='.$tag->ID)) > 0){
					$list .= "\n\t".'<ul>'."\n\t\t".wp_list_pages('echo=0&title_li=&child_of='.$tag->ID)."\t".'</ul>'."\n";
				}
			}
			$list .= '</li>'."\n";
		}	
	}
		if ($hide == "yes" && $toggle != "no" && $i == $counti && $i > $num2show) {
			$list .=  "<li class=\"morelink\">"."<a href=\"#x\" class=\"more\">".$more."</a>"."<a href=\"#x\" class=\"less\">".$toggle."</a>"."</li>"."\n";
		}	 
			$list .= '</ul>';
			$list .="\n";
			$list .= '</div>';
		}
		$list .= $endManual;
	}

/* =============== basic settings  ================= */ 
	if($basic == "yes" && $responsive == "yes"){
		$list .= '<p><strong>NOTE: <i>basic="yes"</i> and <i>responsive="yes"</i> do not work together. Use <em>columns</em> instead.</strong></p>';
		$list .= '<p><strong>See the <a href="https://wordpress.org/plugins/multi-column-tag-map/#installation">documentaion</a></strong></p>';
	}
	if($basic == "yes" && $responsive != "yes"){
		$sum = 0 - count(explode(',', $exclude));
		
		if($show_pages == "yes" && $show_child_pages == "yes" && $page_hierarchy == "yes"){
			$parenttags = array();
			foreach($tags as $tag){
				if($tag->post_parent == 0){
					$parenttags[$tag->ID] = $tag;
				}
			}
			$tags = $parenttags;
		}
		//foreach($tags as $tag){
			$sum += count($tags);
		//}
		$basicCount = 1;
		if($responsive != "yes"){
			$list .= "\n<div class='holdleft' ". $tugPPTwidth .">\n";
		}
		if($responsive == "yes"){
			$list .= '<div class="tagindex responsive">';
		} else {
			$list .= '<div class="tagindex">';
		}
		$list .="\n";	
		foreach( $groups as $letter => $tags ) {
			if($basic_heading == 'yes'){
				$list .='<h4 id="mctm-mctmcounter-'.strtoupper($letter).'">' . apply_filters( 'the_title', $letter, '' ) . '</h4>'."\n";
			}
			$list .= "\t".'<ul class="links">'."\n";
	
			/* ===== this helps sort non-english characters ===== */ 
			if($letter != $denote_numbers || is_numeric($letter)){ /* don't resort numbers */
				if($show_pages == "yes" || $show_posts == "yes"){
					if(strtoupper($order) == 'DESC'){
						usort($tags, function ($b, $a) {
							return strnatcasecmp($a->post_title, $b->post_title);
						});
					} else {
						usort($tags, function ($a, $b) {
							return strnatcasecmp($a->post_title, $b->post_title);
						});
					}
				} else {
					if(strtoupper($order) == 'DESC'){
						usort($tags, function ($b,$a) {
							return strnatcasecmp($a->name, $b->name);
						});
					} else {
						usort($tags, function ($a,$b) {
							return strnatcasecmp($a->name, $b->name);
						});
					}						
				}
			}
			
			//print_r($tags);
			foreach($tags as $tag){
				if(isset($tag->$arraypart)){
					if($tag_count == "yes" && $show_pages != "yes"){
						$mctagmap_count = ' <span class="mctagmap_count">('.$tag->count.')</span>';
					}
				
					if($taxonomy){
						$fromtaxx = preg_replace('/\s+/', '', explode(',',$taxonomy));
						foreach($fromtaxx as $taxx){
							$url = get_term_link($tag, $taxx);
							if($search == 'yes'){
								$url = '?s='.$tag->name;
							}
						}
						//$url = get_term_link($tag->slug, $taxonomy);
					} elseif($show_categories == "yes"){
						$url = get_category_link($tag->term_id); 
						if($search == 'yes'){
							$url = '?s='.$tag->name;
						}
					} elseif($show_pages == "yes" || $show_posts == "yes"){
						$url = get_permalink($tag->ID); 
						$pex = mctm_get_the_excerpt_here($tag->ID);
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->post_title;
						}
					} elseif($from_category){
						$url = esc_attr( get_tag_link( $tag->term_id ) ).'?mctmCatId='.$from_category.'&mctmTag='.$tag->slug; 
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->name;
						}
					} elseif($show_authors != "no"){
						$url = get_author_posts_url($tag->ID);
						if($authors_sort_last == "yes"){
							$arraypart2 = ", ".$tag->first_name;
						}
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->display_name;
						}
					} else {
						$url = esc_attr( get_tag_link( $tag->term_id ) ); 
						if($search == 'yes'){
							$url = site_url().'?s='.$tag->name;
						}
					}
		
					$name = apply_filters( 'the_title', $tag->$arraypart, '' );
					if($descriptions == "yes"){
						$mctagmap_description = '<span class="tagDescription">' . $tag->description . '</span>';
					}
					if($show_pages == "yes" && $page_excerpt == "yes"){
						$mctagmap_description = '<span class="tagDescription">' . $pex. '</span>';
					}
					$list .= "\t\t".'<li><a title="' . $name . '" href="' . $url . '">' . $name . '</a>' . $mctagmap_count . $mctagmap_description;
						if($show_pages == "yes" && $show_child_pages == "yes" && $page_hierarchy == "yes"){
							if(count(get_pages('child_of='.$tag->ID)) > 0){
								$list .= "\n\t\t\t".'<ul>'."\n\t\t\t\t".wp_list_pages('echo=0&title_li=&child_of='.$tag->ID)."\t\t\t".'</ul>'."\n\t\t";
							}
						}
					$list .= '</li>'."\n";
					if($basicCount == ceil($sum/$columns) + 1 ){
						$list .= "\t".'</ul> <!-- ends ul.links first one -->';
						$list .="\n";
						$list .= '</div> <!-- end tagindex -->'."\n";
						$list .= '</div> <!-- end holdleft -->'."\n";
						$list .= "\n<div class='holdleft' ". $tugPPTwidth .">\n";				
						$list .= '<div class="tagindex">';
						$list .="\n";
						if($columns % 2 != 0){
							$list .= "\t".'<ul class="links">'."\n";
						}
						$basicCount = 0;
					}	
					$basicCount++;
				}	
			}
			if($basicCount > 1 ){
			$list .= "\t".'</ul> <!-- end ul.links -->'."\n";
			}
		} 
		if($columns % 2 != 0){
			$list .= '</ul> <!-- ends ul.links second one -->'."\n";
		}
		$list .= '</div> <!-- end tagindex -->'."\n";
		$list .= '</div> <!-- end holdleft -->'."\n";
	}

/* ===== wrap it all up ===== */ 
	if($responsive == "yes" && $basic != "yes" && $manual == "" && $multi_page != "yes"){
		$list .= "</div> <!-- end responsive -->"."\n";
		if($width == ''){
			$width = '190px';
		}
		$list .= '<script> tagindexwidth = "'.$width.'"; ';
		$list .= 'maxColumns = "'.$columns.'"; </script>'."\n";
	}
	$list .= "</div> <!-- end hold inner -->"."\n";
	$list .= "<div style='clear: both;'></div>"."\n"."</div><!-- end list -->";
	}
	else $list .= '<p>Sorry, but no tags were found</p>';
	
	$mctmarr = get_option('mctagmapoptions');
	if(isset($mctmarr['use_custom']) && $mctmarr['use_custom']=='yes'){
		echo '<style>'."\n";
		echo esc_html(strip_tags(stripslashes($mctmarr['mctm_css_custom'])));
		echo "\n".'</style>'."\n";
	}
	if(isset($mctmarr['use_conditional']) && $mctmarr['use_conditional']=='yes'){
		echo $mctmarr['mctm_css_conditional']."\n";
	}
?>