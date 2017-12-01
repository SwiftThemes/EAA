<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 01/12/17
 * Time: 10:09 AM
 */


add_action( 'wp_footer', 'eaa_sticky_ads' );

function eaa_sticky_ads() {
	echo eaa_get_content_ad( 'sticky_ad_top' );
	echo eaa_get_content_ad( 'sticky_ad_bottom' );
}