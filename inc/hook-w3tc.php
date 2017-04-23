<?php

/**
 * Custom user agent groups that match the Mobile Detect PHP script.
 * Not used for now.
 *
 * @param $w3tc_groups
 *
 * @return array
 */
function eaa_w3tc_mobile_groups( $w3tc_groups ) {
	$settings = get_option( 'eaa_settings' );
	if ( $settings ['enable_w3tc_ua_groups'] ) {
		return $w3tc_groups;
	}
	// any operations
	// clear all groups example
	$w3tc_groups = array();
	// delete all groups and add new example
	//$w3tc_groups = array(....);
	// merge groups example:
	$theme = wp_get_theme();

	$w3tc_groups = array_merge( $w3tc_groups, array(
		'mobiles' => array(
			'theme'    => $theme->template . '/' . $theme->stylesheet,
			'enabled'  => true,
			'redirect' => '',
			'agents'   => array(
				'(iPhone.*Mobile|iPod|iTunes)',
				'BlackBerry|rim[0-9]+',
				'HTC|Desire',
				'Nexus\ One|Nexus\ S',
				'Dell\ Streak',
				'\bDroid\b.*Build|HRI39|MOT\-',
				'Samsung|GT\-P1000|SGH\-T959D|GT\-I9100|GT\-I9000',
				'E10i',
				'Asus.*Galaxy',
				'PalmSource|Palm',
				'(mmp|pocket|psp|symbian|Smartphone|smartfon|treo|up.browser|up.link|vodafone|wap|nokia|Series40|Series60|S60|SonyEricsson|N900|\bPPC\b|MAUI.*WAP.*Browser|LG\-P500)',
			),
		),
		'tablets' => array(
			'theme'    => $theme->template . '/' . $theme->stylesheet,
			'enabled'  => true,
			'redirect' => '',
			'agents'   => array(
				'PlayBook|RIM\ Tablet',
				'iPad.*Mobile',
				'Kindle|Silk.*Accelerated',
				'SCH\-I800|GT\-P1000|Galaxy.*Tab',
				'xoom|sholest',
				'Transformer|TF101',
				'NookColor|nook\ browser|BNTV250A|LogicPD\ Zoom2',
				'Tablet|ViewPad7|LG\-V909|MID7015|BNTV250A|LogicPD\ Zoom2|\bA7EB\b|CatNova8|A1_07|CT704|CT1002|\bM721\b',
			),
		),
	) );

	return $w3tc_groups;
}

add_filter( 'w3tc_mobile_groups', 'eaa_w3tc_mobile_groups', 999 );
