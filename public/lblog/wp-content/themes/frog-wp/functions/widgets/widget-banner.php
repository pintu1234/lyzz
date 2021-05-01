<?php
// ------------------------------------------------------
// ------ Widget Banner  -------------------------------
// ------ by AnThemes.net -------------------------------
//        http://themeforest.net/user/An-Themes/portfolio
//        http://themeforest.net/user/An-Themes/follow 
// ------------------------------------------------------

class anthemes_300px extends WP_Widget {
     function __construct() {
	    $widget_ops = array('description' => __('Advertisement - Paste your HTML or JavaScript code.', 'anthemes'));
        parent::__construct(false, $name = ''. __('Custom: Advertisement 300px', 'anthemes') .'',$widget_ops); 
    }

   function widget($args, $instance) {  
		extract( $args );
		$title_tw = $instance['title_tw'];
		$bcode = $instance['bcode'];
?>		
 
<?php echo $before_widget; ?>	
<?php if ( $title_tw ) echo $before_title . esc_attr( $title_tw ) . $after_title; ?>

<div class="img-300"><?php echo stripslashes_deep($bcode); // esc_attr() if is added will be shown as a text ?></div>

  <?php echo $after_widget; ?>
  
<?php
    }

     function update($new_instance, $old_instance) {				
			$instance = $old_instance;
			$instance['title_tw'] = strip_tags($new_instance['title_tw']);
			$instance['bcode'] = stripslashes($new_instance['bcode']);
     return $instance;
    }

 	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance );
?>

        <p>
          <label for="<?php echo $this->get_field_id('bcode'); ?>"><?php _e( 'Paste your HTML or JavaScript code here:', 'anthemes' ); ?></label>      
          <textarea style="height:100px;" class="widefat" id="<?php echo $this->get_field_id('bcode'); ?>" name="<?php echo $this->get_field_name('bcode'); ?>" ><?php if( isset($instance['bcode']) ) echo stripslashes($instance['bcode']); ?></textarea>
        </p> 

<?php  } }

// register widget
function anthemes_300px_init_widget () {
    return register_widget('anthemes_300px');
  }
add_action ('widgets_init', 'anthemes_300px_init_widget');
?>