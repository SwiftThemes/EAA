<?php

/**
 * Show the ad unit.
 *
 * Shows the ad unit for the corresponding ad platform if the ads on the page aren't disabled.
 *
 *
 * @param $location string add location name
 * @param $args array Array with named argments 'before_ad' and 'after_ad'
 *
 * @return string Ad content
 */

function eaa_get_ad( $location, $args = array() ) {
	global $eaa;

	if ( $eaa->get_meta( 'disable_all_ads' ) ) {
		return false;
	}

	if ( ! $eaa->get_option( $location . '_enable' ) ) {
		return false;
	}


	$settings             = get_option( 'eaa_settings' );
	$disable_other_ads_on = isset( $settings['disable_other_ads_on'] ) && $settings['disable_other_ads_on'] ? $settings['disable_other_ads_on'] : array();
	global $post;

	if ( is_singular() && in_array( $post->post_type, $disable_other_ads_on ) ) {
		return false;
	}


	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() && $settings['enable_amp_support'] ) {
		$platform = 'amp';
	} else {
		$platform = $eaa->is_mobile() ? 'mobile' : 'desktop';
	}

	$ad = do_shortcode( $eaa->get_option( $location . '_' . $platform ) );


	if ( ! $ad ) {
		return false;
	}

	$before_ad = sprintf( '<div id="eaa_%s" class="eaa-wrapper eaa_%s eaa_%s">', $location, $location, $platform );
	$before_ad = isset( $args['before_ad'] ) ? $args['before_ad'] . $before_ad : $before_ad;
	$after_ad  = isset( $args['after_ad'] ) ? $args['after_ad'] . '</div>' : '</div>';

	$defaults = array(
		'before_ad' => $before_ad,
		'after_ad'  => $after_ad,
		'class'     => '',
	);


	$style = 'style="';
	if ( $eaa->get_option( $location . '_margin_desktop' ) ) {
		$style .= 'margin:' . $eaa->get_option( $location . '_margin_desktop' ) . 'px;';
	}
	$style .= $eaa->get_option( $location . '_style_desktop' ) . '"';


	$args = wp_parse_args( $args, $defaults );
	$out  = $args['before_ad'];


	if ( isset($settings ['enable_debug_mode' ]) && $settings ['enable_debug_mode' ] && current_user_can( 'administrator' ) ) {
		$args['class'] .= ' debug';
	}

	if ( $eaa->is_mobile() ) {
		$out .= sprintf( '<div class="eaa-ad %s %s">%s</div>', $eaa->get_option( $location . '_align_desktop' ), $args['class'], stripslashes( $ad ) );
	} else {
		$out .= sprintf( '<div class="eaa-ad %s %s" %s>%s</div>', $eaa->get_option( $location . '_align_desktop' ), $args['class'], $style, stripslashes( $ad ) );
	}
	$out .= $args['after_ad'];

	return $out;

}

/*
Duplicated the function since there is no way to know where it is called from

@todo find a way to consolidate the two functions
*/
function eaa_get_content_ad( $location, $args = array() ) {
	global $eaa;

	if ( $eaa->get_meta( 'disable_all_ads' ) ) {
		return false;
	}

	if ( ! $eaa->get_option( $location . '_enable' ) ) {
		return false;
	}


	$settings = get_option( 'eaa_settings' );


	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() && $settings['enable_amp_support'] ) {
		$platform = 'amp';
	} else {
		$platform = $eaa->is_mobile() ? 'mobile' : 'desktop';
	}

	$ad = $eaa->get_option( $location . '_' . $platform );


	if ( ! $ad ) {
		return false;
	}

	$before_ad = sprintf( '<div id="eaa_%s" class="eaa-wrapper eaa_%s eaa_%s">', $location, $location, $platform );
	$before_ad = isset( $args['before_ad'] ) ? $args['before_ad'] . $before_ad : $before_ad;
	$after_ad  = isset( $args['after_ad'] ) ? $args['after_ad'] . '</div>' : '</div>';

	$defaults = array(
		'before_ad' => $before_ad,
		'after_ad'  => $after_ad,
		'class'     => '',
	);


	$style = 'style="';
	if ( $eaa->get_option( $location . '_margin_desktop' ) ) {
		$style .= 'margin:' . $eaa->get_option( $location . '_margin_desktop' ) . 'px;';
	}
	$style .= $eaa->get_option( $location . '_style_desktop' ) . '"';


	$args = wp_parse_args( $args, $defaults );
	$out  = $args['before_ad'];

	if ( isset($settings ['enable_debug_mode' ]) && $settings ['enable_debug_mode' ] && current_user_can( 'administrator' ) ) {
		$args['class'] .= ' debug';
	}



	if ( $eaa->is_mobile() ) {
		$out .= sprintf( '<div class="eaa-ad %s %s">%s</div>', $eaa->get_option( $location . '_align_desktop' ), $args['class'], stripslashes( $ad ) );
	} else {
		$out .= sprintf( '<div class="eaa-ad %s %s" %s>%s</div>', $eaa->get_option( $location . '_align_desktop' ), $args['class'], $style, stripslashes( $ad ) );
	}
	$out .= $args['after_ad'];

	return $out;

}



