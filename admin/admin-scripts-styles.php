<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 13/03/17
 * Time: 6:20 PM
 */

add_action( 'admin_enqueue_scripts', 'eaa_admin_scripts' );

function eaa_admin_scripts($hook) {
	wp_enqueue_script( 'eaa-admin-scripts', EAA_URI . 'assets/js/admin.js' );
	wp_enqueue_style( 'eaa-admin-styles', EAA_URI . 'assets/css/forms.css' );
	wp_enqueue_style( 'eaa-admin-styles', EAA_URI . 'assets/css/admin.css' );
}