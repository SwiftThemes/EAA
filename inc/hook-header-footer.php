<?php
add_action( 'wp_head', 'rcc_header_scripts' );

function rcc_header_scripts() {
	global $rcc;
	echo stripslashes( $rcc->get_option( 'header_scripts' ) );
}

add_action( 'wp_footer', 'rcc_footer_scripts' );

function rcc_footer_scripts() {
	global $rcc;
	echo stripslashes( $rcc->get_option( 'footer_scripts' ) );
}