<?php
add_action( 'wp_head', 'eaa_header_scripts' );

function eaa_header_scripts() {
	global $eaa;
	echo stripslashes( $eaa->get_option( 'header_scripts' ) );
}

add_action( 'wp_footer', 'eaa_footer_scripts' );

function eaa_footer_scripts() {
	global $eaa;
	echo stripslashes( $eaa->get_option( 'footer_scripts' ) );
}


add_action( 'wp_head', 'eaa_add_styles', 9 );

if ( ! function_exists( 'eaa_add_styles' ) ) {
	function eaa_add_styles() {
		global $eaa;
		// If using sticky ads, we use stylesheet instead of inline styles.
		if ( $eaa->get_option( 'sticky_ad_top_enable' ) || $eaa->get_option( 'sticky_ad_bottom_enable' ) ) {
		    return;
		}
			?>
        <style>
            .eaa-clean {
                padding: 0 !important;
                border: none !important;
            }

            .eaa-ad.alignleft {
                margin-right: 10px;
            }

            .eaa-ad.alignright {
                margin-left: 10px;
            }
            .eaa-ad.debug{
                background:peachpuff;
                border:solid 2px #FF0000;
                box-sizing: border-box;
            }

        </style>


		<?php
	}
}

add_action( 'wp_enqueue_scripts', 'eaa_load_scripts', 9 );

if ( ! function_exists( 'eaa_load_scripts' ) ) {
	function eaa_load_scripts() {
		global $eaa;
		if ( $eaa->get_option( 'sticky_ad_top_enable' ) || $eaa->get_option( 'sticky_ad_bottom_enable' ) ) {

			wp_register_script( 'eaa-scripts', EAA_URI . 'assets/js/eaa-scripts.js', [ 'jquery' ] );
			wp_enqueue_script( 'eaa-scripts' );

			wp_enqueue_style( 'eaa-styles', EAA_URI . 'assets/css/eaa-styles.css', false );


		}

	}


}