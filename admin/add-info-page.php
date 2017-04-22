<?php
add_action( 'admin_menu', 'eaa_admin_menu' );

function eaa_admin_menu() {
	add_menu_page(
		'Easy AdSense Ads & Scripts Manager',
		'EAA Help',
		'manage_options',
		'eaa-help',
		'eaa_info_page',
		EAA_URI . 'assets/favicon.png'
	);


	add_submenu_page( 'eaa-help', 'EAA Settings', 'EAA Settings', 'manage_options', 'eaa-settings', 'eaa_options_page' );
}

function eaa_info_page() {
	include EAA_ADMIN . 'help.php';
}

