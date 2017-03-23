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



/**
 * Used by hook: 'customize_preview_init'
 *
 * @see add_action('customize_preview_init',$func)
 */
function eaa_customizer_scripts()
{
	wp_enqueue_script(
		'eaa-customizer',			//Give the script an ID
		EAA_URI.'assets/js/customizer.js',//Point to file
		array( 'jquery','customize-preview' ),	//Define dependencies
		'',						//Define a version (optional)
		true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'eaa_customizer_scripts' );
