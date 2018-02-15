<?php
add_action( 'admin_menu', 'eaa_admin_menu' );

function eaa_admin_menu() {
	add_menu_page(
		'Easy AdSense Ads & Scripts Manager',
		'EasyAdSense Ads',
		'manage_options',
		'eaa',
		'eaa_info_page',
		'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHg9IjBweCIgeT0iMHB4IiB2aWV3Qm94PSIwIDAgMTAwIDEwMCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTAwIDEwMDsiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIGZpbGw9ImF1dG8iIGQ9Ik02My45LDIwbC0yMCw2MEgyMmwxOS4xLTU3LjNjMC41LTEuNiwyLjEtMi43LDMuOC0yLjdINjMuOXogTTcyLjUsNTBINTYuMWwtMTAsMzBINjhsOC4yLTI0LjdDNzcuMSw1Mi43LDc1LjIsNTAsNzIuNSw1MHoiLz48L3N2Zz4='
	);
	add_submenu_page(
		'eaa',
		'Easy AdSense Ads & Scripts Manager',
		'EAA ' . __( 'Help', 'eaa' ),
		'manage_options',
		'eaa',
		'eaa_info_page',
		EAA_URI . 'assets/favicon.png'
	);


	add_submenu_page( 'eaa', 'EAA ' . __( 'Settings', 'eaa' ), 'EAA ' . __( 'Settings', 'eaa' ), 'manage_options', 'eaa-settings', 'eaa_options_page' );
}

function eaa_info_page() {
	include EAA_ADMIN . 'help.php';
}

