<?php

function eaa_settings_init() {
	add_settings_section(
		'eaa_advanced',
		__( 'Advanced Settings', 'eaa' ),
		'eaa_advanced_options_section_callback',
		'eaa-settings'
	);

	add_settings_field(
		'eaa_settings',
		'W3TC Separate Caches for Mobiles',
		'eaa_settings_field_callback_',
		'eaa-settings',
		'eaa_advanced'
	);

	register_setting( 'eaa-settings', 'eaa_settings', 'eaa_sanitize_settings' ); //@todo write sanitization function
}

add_action( 'admin_init', 'eaa_settings_init' );

function eaa_advanced_options_section_callback() {
	echo '';
}

function eaa_settings_field_callback_() {
	$settings = get_option( 'eaa_settings' );
	?>
	<label>
		<input type="checkbox" name="eaa_settings[enable_w3tc_ua_groups]" value=true
			<?php checked( $settings[ 'enable_w3tc_ua_groups'] ); ?>/>
		<?php _e( 'Automatically create user agent groups for W3TC', 'eaa' ); ?>
	</label>
	<?php
}

function eaa_settings_field_callback() {
	global $eaa;
	?>
	<tr valign="top">
		<th scope="row">
			<label>
				<?php _e( 'Automatically create user agent groups for W3TC', 'eaa' ); ?>
			</label>
		</th>
		<td>
			<input type="checkbox" name="eaa[enable_w3tc_ua_groups]" value=true
				<?php checked( $eaa->get_option( 'enable_w3tc_ua_groups' ) ); ?>/>
		</td>
	</tr>

	<!--	<tr valign="top">-->
	<!--		<th scope="row">Some Other Option</th>-->
	<!--		<td><input type="text" name="some_other_option"-->
	<!--		           value="--><?php //echo esc_attr( get_option( 'some_other_option' ) ); ?><!--"/></td>-->
	<!--	</tr>-->
	<!---->
	<!--	<tr valign="top">-->
	<!--		<th scope="row">Options, Etc.</th>-->
	<!--		<td><input type="text" name="option_etc"-->
	<!--		           value="--><?php //echo esc_attr( get_option( 'option_etc' ) ); ?><!--"/></td>-->
	<!--	</tr>-->
	<?php
}

function eaa_options_page() {
	?>
	<div class="wrap">
		<h1>Easy AdSense Ads Manager</h1>
		<hr>
		<form method="post" action="options.php">
			<?php settings_fields( 'eaa-settings' ); ?>
			<?php do_settings_sections( 'eaa-settings' ); ?>
			<?php submit_button(); ?>

		</form>
	</div>
<?php }

function eaa_sanitize_settings( $input ) {
	$options  = array(
		'enable_w3tc_ua_groups' => 'eaa_sanitize_boolean',
	);
	$sanitized = array();
	foreach ( $options as $key => $func ) {
		$sanitized[ $key ] = $func( $input[ $key ] );
	}

	return $sanitized;
}

function eaa_sanitize_boolean( $val ) {
	return $val ? true : false;
}