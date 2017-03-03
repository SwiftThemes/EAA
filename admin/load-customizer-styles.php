<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 25/01/17
 * Time: 12:43 AM
 */


/**
 * Enqueue the stylesheet.
 */
function eaa_enqueue_customizer_stylesheet() {
	wp_register_style( 'eaa-customizer-css', EAA_URI . 'assets/css/customizer.css', null, null, 'all' );
	wp_enqueue_style( 'eaa-customizer-css' );

}

add_action( 'customize_controls_print_styles', 'eaa_enqueue_customizer_stylesheet' );

?>