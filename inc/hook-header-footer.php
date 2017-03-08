<?php
add_action( 'wp_head', 'eaa_header_scripts' );

function eaa_header_scripts() {
	global $eaa;
	echo stripslashes( $eaa->get_option( 'header_scripts' ) );
}

add_action( 'wp_footer', 'eaa_footer_scripts' );

function eaa_footer_scripts() {
	global $eaa;
	echo stripslashes( $eaa->get_option( 'footer_scripts' ) );
}