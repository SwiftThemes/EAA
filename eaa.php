<?php

/*
Plugin Name: Easy AdSense Ads & Scripts Manager
Plugin URI: http://swiftthemes.com/eaa
Description: A very simple, complete and easy to use ads and scripts manager with well thought out ad placements that will easily double your revenue.
Version: 0.1
Author: Satish Gandham <hello@satishgandham.com>
Author URI: http://satishgandham.com
License: GPL2
*/
if ( ! class_exists( 'EAA' ) ) {

	class EAA {

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
			require_once( EAA_INC . 'custom-content.php' );
			require_once( EAA_INC . 'hook-the_content.php' );
			require_once( EAA_INC . 'hook-loop_start.php' );
			require_once( EAA_INC . 'hook-header-footer.php' );
			require_once( EAA_INC . 'utilities.php' );
			require_once( EAA_INC . 'shortcodes.php' );
		}

		public function constants() {
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

//
//		/**
//		 * Loads the post meta on single post and pages
//		 */
//		public function load_meta() {
//			if ( is_single() ) {
//				global $post;
//				$this->post_meta = get_post_meta( $post->ID, '_eaa', true );
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
//				$this->post_meta = get_post_meta( $post->ID, '_eaa', true );
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
			$meta = get_post_meta( $post->ID, '_eaa', true );
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