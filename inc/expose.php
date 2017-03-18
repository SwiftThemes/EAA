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
		return;
	}


	if ( ! $eaa->get_option( $location . '_enable' ) ) {
		return;
	}


	$platform = $eaa->is_mobile() ? 'mobile' : 'desktop';

	$ad = $eaa->get_option( $location . '_' . $platform );


	if ( ! $ad ) {
		return;
	}
	$defaults = array(
		'before_ad' => sprintf( '<div class="eaa-wrapper eaa_%s eaa_%s">', $location, $platform ),
		'after_ad'  => '</div>',
	);

	$args = wp_parse_args( $args, $defaults );

	echo $args['before_ad'];
	echo '<div class="eaa-ad ' . $eaa->get_option( $location . '_align_desktop' ) . '">' . stripslashes( $ad ) . '</div>';
	echo $args['after_ad'];

}


