<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 07/05/17
 * Time: 5:50 PM
 */

add_action( 'admin_init', 'eaa_migrations' );

function eaa_migrations() {

	//0.2.6 => 0.2.7
	//Set the default settings so that ads won't stop showing up
	$settings = get_option( 'eaa_settings', array() );
	$changed  = false;

	if ( ! isset( $settings['enable_between_content_ads_on'] ) ) {
		$settings['enable_between_content_ads_on'] = array(
			'post',
			'page',
		);
		$changed                                   = true;
	}
	if ( $changed ) {
		update_option( 'eaa_settings', $settings );
	}
}