<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 28/02/17
 * Time: 7:45 PM
 */


/* Responsive */
if ( ! function_exists( 'eaa_shortcode_rc' ) ) {

	function eaa_shortcode_rc( $attr, $content ) {
		GLOBAL $eaa;
		$show_on = explode( ",", $attr['show_on'] );
		if ( array_search( 'desktop', $show_on ) !== false && ! $eaa->is_mobile() ) {
			return $content;
		}
		if ( array_search( 'tablet', $show_on ) !== false && $eaa->is_tablet() ) {
			return $content;
		}
		if ( array_search( 'mobile', $show_on ) !== false && ! $eaa->is_tablet() && $eaa->is_mobile() ) {
			return $content;
		}
	}

}
add_shortcode( 'rc', 'eaa_shortcode_rc' );
add_shortcode( 'eaa', 'eaa_shortcode_rc' );