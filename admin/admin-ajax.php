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

	$subject = 'Query from ' . $form['name'] . 'through #EAA';

	$message = '';
	$headers = array();

	$to = [ 'satish@swiftthemes.com' ];
	$message .= 'User: ' . $form['name'] . "\n\n";
	$message .= 'Email: ' . $form['email'] . "\n\n";
	$headers['Reply-To:'] = $form['email'];
	$headers['From:']     = $form['email'];
	$headers['Bcc:']      = 'satish.iitg@gmail.com';

	if ( $form['cc'] ) {
		$headers['Cc:'] = $form['email'];
	}

	$message .= 'URL: ' . esc_url( home_url() ) . "\n\n";
	$message .= 'Plugin Version: ' . EAA_VERSION . "\n\n";
	$message .= 'Message: ' . "\n\n\n\n";
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

}