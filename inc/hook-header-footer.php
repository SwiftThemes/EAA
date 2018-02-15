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

            #eaa_sticky_ad_bottom {
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 999;
            }

            #eaa_sticky_ad_top {
                top: 0;
                position: fixed;
                z-index: 999;

                width: 100%;
            }

            .eaa-ad {
                position: relative;
                margin: auto
            }

            #eaa_sticky_ad_top .eaa-close,
            #eaa_sticky_ad_bottom .eaa-close {
                content: 'X';
                width: 24px;
                height: 24px;
                text-align: center;
                position: absolute;
                top: 0;
                bottom: 0;
                right: -24px;
                color: #e2585b;
                margin: auto;
                background: rgba(240, 240, 240, .9);
                border-top-right-radius: 8px;
                border-bottom-right-radius: 8px;
                font: 20px/24px sans-serif;
                box-shadow: 4px 0 4px -3px #666;
            }

            @media screen and (max-width: 640px) {
                #eaa_sticky_ad_top .eaa-ad,
                #eaa_sticky_ad_bottom .eaa-ad {margin-right: 24px}
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

		}
	}
}