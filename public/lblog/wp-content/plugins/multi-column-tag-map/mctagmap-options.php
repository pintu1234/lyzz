<style>
#mctmo textarea {
	width: 88%;
	height: 300px;
}

#mctmo h3 small {
	font-weight: 400;
}

#mctmo #ccex { display: none; }

#mctmo .donate { background: #fff; border-left: 4px solid #23282d; padding: 10px; }
</style>

<div class="wrap" id="mctmo">

<?php
//echo wp_list_categories('product_cat');
/*
foreach ( get_post_types('', 'names') as $post_type ) {
	$customPostTaxonomies = get_object_taxonomies($post_type);

	if(count($customPostTaxonomies) > 0)
	{
		 foreach($customPostTaxonomies as $tax)
		 {
			 $args = array(
				  'orderby' => 'name',
				  'hide_empty' => 0,
				  'taxonomy' => $tax,
				  'title_li' => $tax,
				);

			 wp_list_categories( $args );
		 }
	}
}
*/
?>

	<div class="updated mctm-donate-notice notice is-dismissible honesty" id="mctm-donate-notice">
		<?php  if(stripos(json_encode($activeplugins = get_option('active_plugins')),'woocommerce') !== false) {  ?>
		<p>It appears you are using WooCommerce. I hope my plugin helps your customers find the products they need.</p>
		<?php } else { ?>
		<p>Thank you for using my plugin. I hope it helps.</p>
		<?php } ?>
		<p>Have you considered <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GX8RH7F2LR74J" class="mctmpaid" target="_blank">donating to Multi-column Tag Map development?</a></p>
		<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
	</div>



	<h2>Multi-Column Tag Map Options</h2>
	<p>Please read the instructions <a href="https://wordpress.org/plugins/multi-column-tag-map">here</a></p>

<?php


	 
	if(isset($_POST["submit"])){ 
		update_option('mctagmapoptions', $_POST);
		//update_option('h2b_exempt', cleanEncoding(trim($_POST['h2b_exempt'])));
		 
		echo '<div id="message" class="updated fade"><p>Options Saved</p></div>';
	}
	
	$mctmarr = get_option('mctagmapoptions');
	//print_r($mctmarr['h2b_exempt']);
	
	$defaultcss = '#mcTagMap .holdinner {
	clear: both;
}

#mcTagMap .tagindex, #sc_mcTagMap .tagindex { 
	padding: 6px 0 10px 0; 
}

#mcTagMap .tagindex h4, #sc_mcTagMap .tagindex h4 { 
	border-bottom: 1px solid #000; 
	padding: 0 0 4px 0; 
	margin: 2px 0 4px 0; 
}

#mcTagMap .tagindex ul, #sc_mcTagMap .tagindex ul { 
	list-style: none; 
	padding: 1px 0; 
	margin: 0; 
}

#mcTagMap .tagindex ul li, #sc_mcTagMap .tagindex ul li { 
	list-style: none; 
	padding: 2px 0; 
	margin: 0; 
}

#mcTagMap .holdleft, #sc_mcTagMap .holdleft { 
	width: 190px; 
	display: inline; 
	margin: 0 20px 0 0; 
	float: left;
	text-align: left;
}

#mcTagMap .noMargin, #sc_mcTagMap .noMargin {
margin: 0 0 0 0;
}

#mcTagMap .morelink, #sc_mcTagMap .morelink { 
	display: none; 
}

#mcTagMap .tagDescription {
	display: block; 
	font-size: 90%;
	line-height: 1;
	font-style: italic;
}

#mcTagMap #mcTagMapNav {
	display: block;
	background: #eee;
	float: left;
	width: 100%;
	text-align: center;
	padding: 5px 0;
	border: 1px solid #888;
}

#mcTagMap #mcTagMapNav a {
	text-decoration: none;
	padding: 3px 2px 3px 6px;
	border-left: 1px solid #888;
}

#mcTagMap #mcTagMapNav a:first-child {
	border-left: none;
}';
	
?>

		
		<form method="post" action=""> 			
			<div class="custom-div fl">
				<legend><h3>Custom CSS including Media Queries <small><em>(This will be wrapped in &lt;style&gt; tags and embedded)</em></small></h3></legend>
<textarea name="mctm_css_custom"><?php if($mctmarr['mctm_css_custom']){ echo esc_html(strip_tags(stripslashes($mctmarr['mctm_css_custom']))); } else { echo $defaultcss; } ?></textarea>
			</div>
			
			<div class="custom-div fl">
				<p><input type="checkbox" class="" name="use_custom" value="yes" <?php echo ($mctmarr['use_custom']=='yes' ? 'checked' : '');?>/> Use this CSS instead of the default</span></legend></p>
				<p><br /></p>
			</div>
			
			<div class="custom-div fl">
				<legend><h3>Conditional CSS <small><em>(You will need to provide the conditional comment and all style tags, these will be embedded)</em></small></h3></legend>
				<p><a href="#o" class="ccex">Conditional Comment Example</a></p>
				<div id="ccex">
<pre>
&lt;!--[if lte IE 9]>
   &lt;style>
      /* your specific styles here */
   &lt;/style>
&lt;![endif]-->
</pre>
				</div>
<textarea name="mctm_css_conditional"><?php if($mctmarr['mctm_css_conditional']){ echo esc_html($mctmarr['mctm_css_conditional']); } else { echo ''; } ?></textarea>
			</div>
		
			<div class="resources">
				<p>With the addition of the css3 and ie9 variables, you can now easily use CSS Flex and Columns. These have caveats to some browsers most notably, older versions of IE. Here are some resources:</p>
				<ul>
					<li><a href="https://msdn.microsoft.com/en-us/library/ms537512%28v=vs.85%29.aspx" target="_blank">Conditional Comments</a></li>
					<li><a href="http://caniuse.com/#feat=multicolumn" target="_blank">CSS Columns</a></li>
					<li><a href="http://caniuse.com/#feat=flexbox" target="_blank">CSS Flex</a></li>
				</ul>
			</div>
			
			<div class="custom-div fl">
				<p><input type="checkbox" class="" name="use_conditional" value="yes" <?php echo ($mctmarr['use_conditional']=='yes' ? 'checked' : '');?>/> Use the conditional CSS</span></legend></p>
			</div>
			
			<div class="custom-div fl donate">
				<p style="clear: both;">If you are using this plugin and enjoy it or if you are including it in a theme you are selling, have you considered <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GX8RH7F2LR74J" target="_blank">donating to Multi-column Tag Map development?</a> </p>
			</div>
		
			<div class="custom-div fl">
				<p style="clear: both;">
					<input type="submit" value="Save CSS" class="button button-primary" name="submit" />
				</p>
			</div>
		</form>

</div>

<script>
$ = jQuery;
var explode = function(){
	$('.updated.fade').fadeOut(400);
};
setTimeout(explode, 2000);

$(document).ready(function() {
	$('.ccex').on('click', function(e){
		e.preventDefault();
		$('#ccex').fadeIn(400);
	});
});

</script>