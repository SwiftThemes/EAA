<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 15/03/17
 * Time: 5:29 PM
 */

add_action( 'wp_ajax_eaa_send_email', 'eaa_send_email' );

function eaa_send_email() {

	$form = array();
	foreach ( $_POST['formData'] as $input ) {
		$form[ $input['name'] ] = $input['value'];
	}

	check_ajax_referer( 'eaa-help-nonce', 'nonce' );

	$subject = 'Query from ' . $form['name'] . ' through #EAA';

	$message = '';
	$headers = array();

	$to        = array( 'satish@swiftthemes.com' );
	$message   .= 'User: ' . $form['name'] . "\n\n";
	$message   .= 'Email: ' . $form['email'] . "\n\n";
	$headers[] = 'Reply-To:' . $form['email'];
	$headers[] = 'Bcc:satish.iitg@gmail.com';
	$headers[] = 'From:' . $form['name'] . ' <' . eaa_get_from_email_header( $form['name'] ) . '>';


	if ( $form['cc'] ) {
		$headers[] = 'Cc:' . $form['email'];
	}

	$message .= 'URL: ' . esc_url( home_url() ) . "\n\n";
	$message .= 'Plugin Version: ' . EAA_VERSION . "\n\n";
	$message .= 'Message: ' . "\n\n";
	$message .= esc_html( $form['message'] );

	if ( wp_mail( $to, $subject, $message, $headers ) ) {
		$return = array(
			'type'    => 'Success',
			'message' => __( 'Email Sent Successfully!!', 'eaa' ),
		);
	} else {
		$return = array(
			'type'    => 'Error',
			'message' => __( 'Unable to send email :-(', 'eaa' ),
		);
	}

	wp_send_json( $return );
	wp_die();
}

function eaa_get_from_email_header( $name = 'EAA' ) {

	$sitename = strtolower( $_SERVER['SERVER_NAME'] );
	if ( substr( $sitename, 0, 4 ) == 'www.' ) {
		$sitename = substr( $sitename, 4 );
	}
	// Strip spaces in name
	$name = str_replace( ' ', '', $name );

	return $from_email = $name . '@' . $sitename;

}


add_action( 'wp_ajax_eaa_dismiss_admin_notice', 'eaa_dismiss_admin_notice' );

function eaa_dismiss_admin_notice() {
	$temp = get_option( 'eaa_notices' );
	$temp = is_array( $temp ) ? $temp : array();

	$id   = sanitize_text_field( $_POST['id'] );
	$days = absint( $_POST['show_next'] );

	$temp[ $id ] = array( 'show_next' => time() + 86400 * $days );


	update_option( 'eaa_notices', $temp, false );


	$return = array(
		'type'    => 'Success',
		'message' => __( 'Email Sent Successfully!!', 'eaa' ),
	);
	wp_send_json( $return );

	wp_die();

}