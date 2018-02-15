<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 13/03/17
 * Time: 6:20 PM
 */

add_action( 'admin_enqueue_scripts', 'eaa_admin_scripts',100 );

function eaa_admin_scripts($hook) {
	wp_enqueue_script( 'eaa-admin-notices', EAA_URI . 'assets/js/admin-notices.js',array( 'jquery'),'',true );
	wp_enqueue_script( 'eaa-admin-scripts', EAA_URI . 'assets/js/admin.js' );
	wp_enqueue_style( 'eaa-admin-styles_', EAA_URI . 'assets/css/forms.css' );
	wp_enqueue_style( 'eaa-admin-styles', EAA_URI . 'assets/css/admin.css' );

	wp_enqueue_script(
		'eaa-customizer',			//Give the script an ID
		EAA_URI.'assets/js/customizer.js',//Point to file
		array( 'jquery','customize-preview' ),	//Define dependencies
		'',						//Define a version (optional)
		true						//Put script in footer?
	);
}