<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 07/05/17
 * Time: 5:50 PM
 */

add_action( 'admin_init', 'eaa_migrations' );

function eaa_migrations() {

	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$settings_changed = false;
	//0.2.6 => 0.2.7
	//Set the default settings so that ads won't stop showing up
	$settings = get_option( 'eaa_settings', array() );
	if ( ! $settings ) {
		$settings = array();
	}
	if ( ! isset( $settings['enable_between_content_ads_on'] ) ) {
		$settings['enable_between_content_ads_on'] = array(
			'post',
			'page',
		);
		$settings_changed                          = true;
	}


	//0.34 ==> 0.35
	//Disable ads from on home page setting was moved from settings page to customizer.
	if ( isset( $settings['disable_ads_on_home_page'] ) && $settings['disable_ads_on_home_page'] ) {
		$ads                                           = get_option( 'eaa' );
		$ads['disable_ads_between_posts_on_home_page'] = true;
		update_option( 'eaa', $ads );
	}

	//0.37 ==> 0.38

	if ( ! isset( $settings['the_content_hook_priority'] ) ) {
		$settings['the_content_hook_priority'] = 11;
		$settings_changed                      = true;
	}


	//0.39 ==> 0.40

	if ( ! isset( $settings['disable_wpautop'] ) ) {
		$settings['disable_wpautop'] = false;
		$settings_changed            = true;
	}

	//0.44 ==>0.45
	if ( ! isset( $settings['activated_on'] ) ) {

		//Plugin is already in use
		if ( get_option( 'eaa' ) ) {
			$settings['activated_on'] = time() - 10 * 86400;
		} else {
			//Plugin was just installed but, activation hook failed.
			$settings['activated_on'] = time();
		}

		$settings_changed = true;


	}

	if ( $settings_changed ) {
		update_option( 'eaa_settings', $settings );
	}

}