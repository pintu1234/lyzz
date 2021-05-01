<?php

add_action( 'cs_init', array( 'CustomSidebarsCheckupNotification', 'instance' ) );

/**
 * Extends the widgets section to add the advertisements.
 *
 * @since 3.0.0
 */
class CustomSidebarsCheckupNotification extends CustomSidebars {

	private $dismiss_name = 'custom_sidebars_checkup_notification_dismiss';
	private $nonce_name = 'custom_sidebars_checkup_notification_nonce';

	/**
	 * Returns the singleton object.
	 *
	 * @since 3.0.0
	 */
	public static function instance() {
		static $instance = null;

		if ( null === $instance ) {
			$instance = new CustomSidebarsCheckupNotification();
		}

		return $instance;
	}

	/**
	 * Constructor is private -> singleton.
	 *
	 * @since 3.0.0
	 */
	private function __construct() {
		if ( ! is_admin() ) {
			return;
		}
		//add_action( 'admin_head', array( $this, 'init_admin_head' ) );
		add_action( 'admin_head-widgets.php', array( $this, 'init_admin_head_in_widgets' ) );
		add_action( 'wp_ajax_custom_sidebars_checkup_notification_dismiss', array( $this, 'dismiss' ) );
	}

	/**
	 * Save dismiss decision, no more show it.
	 *
	 * @since 3.0.0
	 */
	public function dismiss() {
		/**
		 * Check: is nonce send?
		 */
		if ( ! isset( $_GET['_wpnonce'] ) ) {
			die;
		}
		/**
		 * Check: is user id send?
		 */
		if ( ! isset( $_GET['user_id'] ) ) {
			die;
		}
		/**
		 * Check: nonce
		 */
		$nonce_name = $this->nonce_name . $_GET['user_id'];
		if ( ! wp_verify_nonce( $_GET['_wpnonce'], $nonce_name ) ) {
			die;
		}
		/**
		 * save result
		 */
		$result = add_user_meta( $_GET['user_id'], $this->dismiss_name, true, true );
		if ( false == $result ) {
			update_user_meta( $_GET['user_id'], $this->dismiss_name, true );
		}
		die;
	}

	/**
	 * Admin header
	 *
	 * @since 3.0.0
	 */
	public function init_admin_head() {
	}

	/**
	 * Admin header
	 *
	 * @since 3.0.1
	 */
	public function init_admin_head_in_widgets() {
		add_action( 'admin_notices', array( $this, 'admin_notices' ) );
	}

	/**
	 * Admin notice!
	 *
	 * @since 3.0.0
	 */
	public function admin_notices() {
		wp_enqueue_script( 'wp-util' );
		$this->show_box( 'wf_ads' );
	}

	/**
	 * Show box.
	 *
	 * @since 3.0.4
	 *
	 * @param string $template_name Template name.
	 */
	private function show_box( $template_name ) {
		$method = sprintf( 'show_box_%s', $template_name );
		if ( ! method_exists( $this, $method ) ) {
			return;
		}
?>
<script type="text/javascript">
	jQuery(document).ready( function() {
		setTimeout( function() {
			var template = wp.template('custom-sidebars-<?php echo $template_name; ?>');
			jQuery(".sidebars-column-1 .inner").append( template() );
		}, 1000);
	});
</script>
<script type="text/html" id="tmpl-custom-sidebars-<?php echo $template_name; ?>">
<?php
		$this->$method();
?>
</script>
<?php
	}

	/**
	 * Show ads for other plugins box.
	 *
	 * @since 3.0.4
	 */
	private function show_box_wf_ads() {
?>
<div class="custom-sidebars-box custom-sidebars-checkup">
	<div class="cs-inner">
		<h4 class="textcenter">Need to make any element on your site sticky?<br>Header menu, a widget, or an image?</h4>
		<div class="sticky-logo"><a target="_blank" href="<?php echo admin_url('plugin-install.php?s=webfactory%20sticky&tab=search&type=term'); ?>"><img src="<?php echo CSB_IMG_URL; ?>/wp-sticky.png" alt="WP Sticky Anything" title="WP Sticky Anything"></a></div>
		<div class="textcenter"><a target="_blank" href="<?php echo admin_url('plugin-install.php?s=webfactory%20sticky&tab=search&type=term'); ?>" class="button-primary">Install the free WP Sticky plugin</a></div>
	</div>
</div>
<?php
	}

	private function show_box_upfront() {
		$url = add_query_arg(
			array(
				'utm_source' => 'custom_sidebar_uf_ad',
				'utm_campaign' => 'custom_sidebar_plugin_uf_ad',
				'utm_medium' => 'Custom Sidebars Plugin',
			),
			'https://premium.wpmudev.org/projects/category/themes/'
		);
?>
<div class="custom-sidebars-box custom-sidebars-upfront">
	<div class="cs-inner">
		<p><?php esc_html_e( 'Don’t just replace sidebars. Add new sidebars and footers anywhere with Upfront.', 'custom-sidebars' ); ?></p>
		<p><a class="button" href="<?php echo esc_url( $url ); ?>"><?php esc_html_e( 'get Upfront free', 'custom-sidebars' ); ?></a></p>
	</div>
</div>
<?php
	}
};
