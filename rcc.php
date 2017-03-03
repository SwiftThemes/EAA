<?php

/*
Plugin Name: Easy AdSense Ads & Scripts Manager
Plugin URI: http://swiftthemes.com/eaa
Description: Enables custom content areas on home page and between posts, where you can have different content for mobiles and desktops.
Ideally used for advertisements.
Version: 0.1
Author: Satish Gandham <hello@satishgandham.com>
Author URI: http://satishgandham.com
License: GPL2
*/
if ( ! class_exists( 'RCC' ) ) {

	class RCC {

		public $post_meta;
		public $mobile_detect;

		public function __construct() {
			add_action( 'plugins_loaded', array( $this, 'constants' ), - 95 );
			add_action( 'plugins_loaded', array( $this, 'core' ), - 90 );
			add_action( 'plugins_loaded', array( $this, 'admin' ), - 90 );
			add_action( 'plugins_loaded', array( $this, 'load_mobile_detect' ), 95 );
//
//			add_action( 'admin_print_styles', array( $this, 'load_meta_admin' ), 999 );
//			add_action( 'wp_print_styles', array( $this, 'load_meta' ), 999 );

			add_action( 'wp_print_styles', array( $this, 'load_options' ), - 95 );

//			delete_transient( 'page-speed_' . 'sass_combined' );

		}

		public function core() {
			require_once( RCC_INC . 'custom-content.php' );
			require_once( RCC_INC . 'hook-the_content.php' );
			require_once( RCC_INC . 'hook-loop_start.php' );
			require_once( RCC_INC . 'hook-header-footer.php' );
			require_once( RCC_INC . 'utilities.php' );
			require_once( RCC_INC . 'shortcodes.php' );
		}

		public function constants() {
			define( 'RCC_DIR', trailingslashit( dirname( __FILE__ ) ) );
			define( 'RCC_INC', trailingslashit( RCC_DIR . 'inc' ) );
			define( 'RCC_ADMIN', trailingslashit( RCC_DIR . 'admin' ) );
			define( 'RCC_VENDOR', trailingslashit( RCC_DIR . 'vendor' ) );

			define( 'RCC_URI', plugin_dir_url( __FILE__ ) );

		}

		public function admin() {
			require_once( RCC_ADMIN . 'control-responsive-content.php' );
			require_once( RCC_ADMIN . 'meta-boxes.php' );
			require_once( RCC_ADMIN . 'load-customizer-styles.php' );
		}

		public function load_mobile_detect() {
			if ( ! class_exists( 'Mobile_Detect' ) ) {
				require_once( RCC_VENDOR . 'Mobile_Detect.php' );
			}
			$this->mobile_detect = new Mobile_Detect();
		}

		public function is_mobile() {
			return $this->mobile_detect->isMobile() && ! $this->mobile_detect->isTablet();
		}

		public function is_tablet() {
			return $this->mobile_detect->isTablet();
		}

//
//		/**
//		 * Loads the post meta on single post and pages
//		 */
//		public function load_meta() {
//			if ( is_single() ) {
//				global $post;
//				$this->post_meta = get_post_meta( $post->ID, '_rcc', true );
//			}
//		}
//
//		/**
//		 * Loads the post meta for use in meta boxes when on edit post screen.
//		 */
//		public function load_meta_admin() {
//			$screen = get_current_screen();
//			if ( 'post' === $screen->post_type || 'page' === $screen->post_type ) {
//				global $post;
//				$this->post_meta = get_post_meta( $post->ID, '_rcc', true );
//			}
//		}

		/**
		 * Returns the post/page meta value of the given key.
		 *
		 * @param string $key key of the meta.
		 *
		 * @return mixed
		 */
		public function get_meta( $key = null ) {
			global $post;
			$meta = get_post_meta( $post->ID, '_rcc', true );
			if ( $key ) {
				return isset( $meta[ $key ] ) ? $meta[ $key ] : null;
			} else {
				return $meta;
			}
		}


		/**
		 * Should I rewrite this as below?
		 * Is $temp destroyed after the function returns?
		 */

		public function get_option( $key = null, $default = null ) {
			$temp = get_option( 'rcc' );

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

$rcc = new RCC();

GLOBAL $rcc;