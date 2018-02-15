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

	$locations = isset( $settings['custom_locations'] ) && $settings['custom_locations'] ? sanitize_text_field( $settings['custom_locations'] ) : false;

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


//@todo
//Give it a better place
// <!-- noformat on --> and <!-- noformat off --> functions

function eaa_autop( $text ) {
	$newtext = "";
	$pos     = 0;

	$tags   = array( '<!-- noformat on -->', '<!-- noformat off -->' );
	$status = 0;

	while ( ! ( ( $newpos = strpos( $text, $tags[ $status ], $pos ) ) === false ) ) {
		$sub = substr( $text, $pos, $newpos - $pos );

		if ( $status ) {
			$newtext .= $sub;
		} else {
			$newtext .= convert_chars( wptexturize( wpautop( $sub ) ) );
		}      //Apply both functions (faster)
		$pos    = $newpos + strlen( $tags[ $status ] );
		$status = $status ? 0 : 1;
	}

	$sub = substr( $text, $pos, strlen( $text ) - $pos );

	if ( $status ) {
		$newtext .= $sub;
	} else {
		$newtext .= convert_chars( wptexturize( wpautop( $sub ) ) );
	}      //Apply both functions (faster)

	//To remove the tags
	$newtext = str_replace( $tags[0], "", $newtext );
	$newtext = str_replace( $tags[1], "", $newtext );

	return $newtext;
}

function eaa_texturize( $text ) {
	return $text;
}

function eaa_convert_chars( $text ) {
	return $text;
}

$settings = get_option( 'eaa_settings' );
if(isset($settings['disable_wpautop']) && $settings['disable_wpautop']){

	remove_filter( 'the_content', 'wpautop' );
	add_filter( 'the_content', 'eaa_autop',9 );

	remove_filter( 'the_content', 'wptexturize' );
	add_filter( 'the_content', 'eaa_texturize' );

	remove_filter( 'the_content', 'convert_chars' );
	add_filter( 'the_content', 'eaa_convert_chars' );

}

