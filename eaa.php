<?php

/*
Plugin Name: Easy AdSense Ads & Scripts Manager
Plugin URI: http://swiftthemes.com/eaa
Description: A very simple, complete and easy to use ads and scripts manager with well thought out ad placements that will help you increase your ad revenue multiple folds. Unlike other plugins out there, this integrates right into the WordPress **customizer** to give you instant preview of your changes.
Version: 0.44
Author: Satish Gandham <hello@satishgandham.com>
Author URI: http://satishgandham.com
License: GPL2
*/
if ( ! class_exists( 'EAA' ) ) {

	class EAA {

		public $mobile_detect;

		public function __construct() {
			add_action( 'plugins_loaded', array( $this, 'constants' ), - 95 );
			add_action( 'plugins_loaded', array( $this, 'core' ), - 90 );
			add_action( 'plugins_loaded', array( $this, 'admin' ), - 90 );
			add_action( 'plugins_loaded', array( $this, 'load_mobile_detect' ), 95 );
		}

		public function core() {
			require_once( EAA_INC . 'custom-content.php' );
			require_once( EAA_INC . 'hook-the_content.php' );
			require_once( EAA_INC . 'hook-loop_start.php' );
			require_once( EAA_INC . 'hook-w3tc.php' );
			require_once( EAA_INC . 'hook-header-footer.php' );
			require_once( EAA_INC . 'functions-eaa-filters.php' );
			require_once( EAA_INC . 'shortcodes.php' );
			require_once( EAA_INC . 'widget.php' );
			require_once( EAA_INC . 'hook-sticky-ads.php' );
			require_once( EAA_INC . 'expose.php' );
			require_once( EAA_INC . 'helpers.php' );
		}

		public function constants() {

			define( 'EAA_VERSION', '0.43' );
			define( 'EAA_DIR', trailingslashit( dirname( __FILE__ ) ) );
			define( 'EAA_INC', trailingslashit( EAA_DIR . 'inc' ) );
			define( 'EAA_ADMIN', trailingslashit( EAA_DIR . 'admin' ) );
			define( 'EAA_VENDOR', trailingslashit( EAA_DIR . 'vendor' ) );
			define( 'EAA_URI', plugin_dir_url( __FILE__ ) );

		}

		public function admin() {
			require_once( EAA_ADMIN . 'control-responsive-content.php' );
			require_once( EAA_ADMIN . 'meta-boxes.php' );
			require_once( EAA_ADMIN . 'load-customizer-styles.php' );
			require_once( EAA_ADMIN . 'add-info-page.php' );
			require_once( EAA_ADMIN . 'admin-scripts-styles.php' );
			require_once( EAA_ADMIN . 'admin-ajax.php' );
			require_once( EAA_ADMIN . 'plugin-settings.php' );
			require_once( EAA_ADMIN . 'updates-and-migrations.php' );
			require_once( EAA_ADMIN . 'admin.php' );
		}

		public function load_mobile_detect() {
			if ( ! class_exists( 'Mobile_Detect' ) ) {
				require_once( EAA_VENDOR . 'Mobile_Detect.php' );
			}
			$this->mobile_detect = new Mobile_Detect();
		}

		public function is_mobile() {
			return $this->mobile_detect->isMobile() && ! $this->mobile_detect->isTablet();
		}

		public function is_tablet() {
			return $this->mobile_detect->isTablet();
		}

		/**
		 * Returns the post/page meta value of the given key.
		 *
		 * @param string $key key of the meta.
		 *
		 * @return mixed
		 */
		public function get_meta( $key = null ) {

			if ( is_admin() && isset( $_GET['post'] ) && $_GET['post'] ) {
				$post_id = $_GET['post'];
			} else if ( is_singular() ) {
				global $post;
				$post_id = $post->ID;
			} else {
				return null;
			}

			$meta = get_post_meta( $post_id, '_eaa', true );

			if ( $key ) {
				return isset( $meta[ $key ] ) ? $meta[ $key ] : null;
			} else {
				return $meta;
			}
		}


		public function get_option( $key = null, $default = null ) {
			$temp = get_option( 'eaa' );

			/*
			 * If option is not defined or key is defined and option is not an array, bail.
			 */
			if ( ! $temp || $key && ! is_array( $temp ) ) {
				return $default;
			}
			if ( $key ) {
				// If a value with key doesn't exist, return default.
				return isset( $temp[ $key ] ) ? $temp[ $key ] : $default;
			} else {
				return $temp;
			}
		}

	}
}

$eaa = new EAA();

GLOBAL $eaa;


//
//add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'eaa_action_links' );
//
//function eaa_action_links ( $links ) {
//	$mylinks = array(
//		'<a href="https://forums.swiftthemes.com/c/plugins/eaa/">'.__('Support Forum','eaa').'</a>',
//	);
//	return array_merge( $links, $mylinks );
//}