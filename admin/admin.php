<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 21/11/17
 * Time: 5:14 PM
 */

add_filter( 'plugin_action_links_easy-adsense-ads-scripts-manager/eaa.php', 'eaa_action_links' );

function eaa_action_links ( $links ) {
	$mylinks = array(
		'<a href="https://forums.swiftthemes.com/c/plugins/eaa/"><span class=" dashicons-editor-help" style="font-family: dashicons;font-size: 18px;line-height: 20px;margin-right: 2px;display: inline;position: relative;top:4px"></span>'.__('Support Forum','eaa').'</a>',
		'<a href="' . admin_url( 'admin.php?page=eaa-settings' ) . '"><span class=" dashicons-admin-settings"  style="font-family: dashicons;font-size: 18px;line-height: 20px;margin-right: 2px;display: inline;position: relative;top:4px"></span>'.__('Settings','eaa').'</a>',
		'<a href="' . admin_url( 'customize.php' ) . '"><span class=" dashicons-layout"  style="font-family: dashicons;font-size: 18px;line-height: 20px;margin-right: 2px;display: inline;position: relative;top:4px"></span>'.__('Place Ads','eaa').'</a>',
	);
	return array_merge( $links, $mylinks );
}