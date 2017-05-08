<?php
add_action( 'admin_menu', 'eaa_admin_menu' );

function eaa_admin_menu() {
	add_menu_page(
		'Easy AdSense Ads & Scripts Manager',
		'Easy AdSense Ads',
		'manage_options',
		'eaa',
		'eaa_info_page',
		EAA_URI . 'assets/favicon.png'
	);
	add_submenu_page(
		'eaa',
		'Easy AdSense Ads & Scripts Manager',
		'EAA Help',
		'manage_options',
		'eaa',
		'eaa_info_page',
		EAA_URI . 'assets/favicon.png'
	);


	add_submenu_page( 'eaa', 'EAA Settings', 'EAA Settings', 'manage_options', 'eaa-settings', 'eaa_options_page' );
}

function eaa_info_page() {
	include EAA_ADMIN . 'help.php';
}

