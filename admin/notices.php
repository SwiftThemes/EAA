<?php
function eaa_admin_notice__success() {


	if ( eaa_can_show_notice( 'page_speed_promo', true ) ):
		?>

        <div class="notice ps page-speed-promo is-dismissible" data-id="page_speed_promo" data-show_next="60"
             data-dismissible="eaa-theme-promo">
            <div>
                <p><strong>Need more ad locations?</strong> Our free WordPress theme PageSpeed has EAA integration
                    adding <strong>5 more ad
                        locations</strong>.<br/>
                    <a href="<?php echo admin_url( 'theme-install.php?search=page-speed' ) ?>"
                       class="green-btn"><span class="dashicons dashicons-admin-appearance"></span> Get Page
                        Speed</a><br/>
                    <small>Did we tell you that Page Speed is super fast, responsive and easily customizable?</small>

                </p>
            </div>
        </div>
		<?php
		return;
	endif;
}

add_action( 'admin_notices', 'eaa_admin_notice__success' );


function eaa_can_show_notice( $notice_id, $delay ) {
	$now = time();
	if ( $delay ) {
		$settings  = get_option( 'eaa_settings' );
		$activated = $settings['activated_on'];
		if ( $now - $activated < 7 * 86400 ) {
            return false;
		}
	}


	/**
	 * Notice structure
	 * id: Unique id for the notice.
	 * show_next: When to show the notice again.
	 */
	$notices = get_option( 'eaa_notices' );
	$notice  = isset( $notices[ $notice_id ] ) ? $notices[ $notice_id ] : false;

	//Not dismissed yet, so show.
	if ( ! $notice ) {
		return true;
	}

	$show_next = $notice['show_next'];

	$datediff = $show_next - $now;


	if ( $datediff < 0 ) {
		return true;
	} else {
		false;
	}
}