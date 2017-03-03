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
function rcc_enqueue_customizer_stylesheet() {
	wp_register_style( 'rcc-customizer-css', RCC_URI . 'assets/css/customizer.css', null, null, 'all' );
	wp_enqueue_style( 'rcc-customizer-css' );

}

add_action( 'customize_controls_print_styles', 'rcc_enqueue_customizer_stylesheet' );

?>