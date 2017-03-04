<?php
add_action( 'wp_head', 'eaa_add_styles' );

if ( ! function_exists( 'eaa_add_styles' ) ) {
	function eaa_add_styles() {
		?>
		<style>
			.eaa-clean {
				padding: 0 !important;
				border: none !important;
			}
		</style>
		<?php
	}
}