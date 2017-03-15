<?php
add_action( 'admin_menu', 'eaa_admin_menu' );

function eaa_admin_menu() {
	add_options_page(
		'Easy AdSense Ads & Scripts Manager',
		'EAA & Scripts',
		'manage_options',
		'eaa-help.php',
		'eaa_info_page'
	);
}

function eaa_info_page(){
	include EAA_ADMIN.'help.php';
}