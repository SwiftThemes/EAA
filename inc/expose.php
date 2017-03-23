<?php


/**
 * Show the add unit.
 *
 * Shows the ad unit for the corresponding ad platform if the ads on the page aren't disabled.
 *
 *
 * @param $location string add location name
 * @param $args array Array with named argments 'before_ad' and 'after_ad'
 */
function eaa_show_ad( $location, $args = array() ) {
	global $eaa;


	if ( $eaa->get_meta( 'disable_all_ads' ) ) {
		return false;
	}


	if ( ! $eaa->get_option( $location . '_enable' ) ) {
		return false;
	}


	$platform = $eaa->is_mobile() ? 'mobile' : 'desktop';

	$ad = $eaa->get_option( $location . '_' . $platform );


	if ( ! $ad ) {
		return false;
	}
	$defaults = array(
		'before_ad' => sprintf( '<div class="eaa-wrapper eaa_%s eaa_%s">', $location, $platform ),
		'after_ad'  => '</div>',
		'class'     => '',
	);


	$style = 'style="';
	if ( $eaa->get_option( $location . '_margin_desktop' ) ) {
		$style .= 'margin:' . $eaa->get_option( $location . '_margin_desktop' ) . 'px;';
	}
	$style .= $eaa->get_option( $location . '_style_desktop' ) . '"';


	$args = wp_parse_args( $args, $defaults );
	$out  = $args['before_ad'];

	if ( $eaa->is_mobile() ) {
		$out .= sprintf( '<div class="eaa-ad %s %s">%s</div>', $eaa->get_option( $location . '_align_desktop' ), $args['class'], stripslashes( $ad ) );
	} else {
		$out .= sprintf( '<div class="eaa-ad %s %s" %s>%s</div>', $eaa->get_option( $location . '_align_desktop' ), $args['class'], $style, stripslashes( $ad ) );
	}
	$out .= $args['after_ad'];

	return $out;

}



