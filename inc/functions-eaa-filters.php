<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 07/05/17
 * Time: 1:04 PM
 */

add_filter( 'eaa_ad_locations', 'eaa_add_user_locations' );

function eaa_add_user_locations( $ad_locations ) {

	$settings = get_option( 'eaa_settings' );

	$locations = sanitize_text_field( $settings['custom_locations'] );

	if ( $locations ) {
		//1. Split locations by comma
		$locations = preg_split( "/,/", $locations, null, PREG_SPLIT_NO_EMPTY );
		//2. Loop over the list
		foreach ( $locations as $location ) {
			//3. Trim spaces at the ends
			//4. esc_attr
			$location = esc_attr( trim( $location ) );
			//5. add to the array
			$ad_locations[ 'my_' . $location ] = array(
				'label'   => str_replace( '_', ' ', $location ),
				'section' => 'user_locations',
			);
		}
	}

	return $ad_locations;
}
