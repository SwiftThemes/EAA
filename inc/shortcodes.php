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


if ( ! function_exists( 'eaa_rotate_content' ) ) {
	/**
	 * Splits the content at <!-- next_ad --> and returns a random part.
	 *
	 * @param $attr
	 * @param $content
	 *
	 * @return string
	 */
	function eaa_rotate_content( $attr, $content ) {
		if ( ! empty( $content ) ) {
			$ads = explode( '<!-- next_ad -->', $content );

			return do_shortcode( $ads[ array_rand( $ads ) ] );
		}
	}
}
add_shortcode( 'ads', 'eaa_rotate_content' );
add_shortcode( 'eaa_ads', 'eaa_rotate_content' );
add_shortcode( 'eaa_rotate_ads', 'eaa_rotate_content' );

if ( ! function_exists( 'eaa_show_ad_short_code' ) ) {

	function eaa_show_ad_short_code( $attr, $content ) {
		$ad = $attr['ad'];
		if ( $ad ) {
			return eaa_get_ad( $ad );
		} else {
			return '';
		}
	}
}

add_shortcode( 'eaa_show_ad', 'eaa_show_ad_short_code' );