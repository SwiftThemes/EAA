<?php

function eaa_settings_init() {
	add_settings_section(
		'eaa_advanced',
		__( 'Advanced Settings', 'eaa' ),
		'eaa_advanced_options_section_callback',
		'eaa-settings'
	);

	add_settings_field(
		'enable_between_content_ads_on',
		__( 'Enable Between Content Ads on' ),
		'eaa_enable_between_content_ads_on_callback',
		'eaa-settings',
		'eaa_advanced'
	);

	add_settings_field(
		'disable_other_ads_on',
		__( 'Disable ads widget and theme location ads on' ),
		'eaa_disable_other_ads_on_callback',
		'eaa-settings',
		'eaa_advanced'
	);


	add_settings_field(
		'enable_amp_support',
		__( 'AMP (Accelerated Mobile Pages)' ),
		'eaa_enable_amp_support_callback',
		'eaa-settings',
		'eaa_advanced'
	);
	add_settings_field(
		'w3tc_support',
		__( 'W3TC Separate Caches for Desktops, Mobiles and Tablets' ),
		'eaa_settings_field_callback',
		'eaa-settings',
		'eaa_advanced'
	);
	add_settings_field(
		'custom_locations',
		__( 'Add Your Own Ad Locations' ),
		'eaa_custom_locations_callback',
		'eaa-settings',
		'eaa_advanced'
	);
	register_setting( 'eaa-settings', 'eaa_settings', 'eaa_sanitize_settings' ); //@todo write sanitization function
}

add_action( 'admin_init', 'eaa_settings_init' );

function eaa_advanced_options_section_callback() {
	?>
	<style>
		.eaa-select {
			border: solid 1px #CCC;
			width: 240px;
			height: 360px;
			border-radius: 3px;
			font-size: 16px;
			font-weight: 300;
		}

		.eaa-select option {
			padding: 5px 2px;
			border-bottom: dashed 1px #EEE;
			text-transform: capitalize
		}

		textarea {
			width: 240px;
			font: monospace, serif;
			border-radius: 3px;
			margin: 10px 0;
		}
	</style>
	<?php
}


function eaa_enable_amp_support_callback() {
	$settings = get_option( 'eaa_settings' );
	?>
	<label>
		<input type="checkbox" name="eaa_settings[enable_amp_support]" value=true
			<?php checked( $settings['enable_amp_support'] ); ?>/>
		<?php _e( 'Enable AMP support', 'eaa' ); ?>
	</label>
	<p class="description">
		<?php _e( 'Will add an additional text box to insert AMP ads.', 'eaa' ) ?>
	</p>

	<?php
}

function eaa_settings_field_callback() {
	$settings = get_option( 'eaa_settings' );
	?>
	<label>
		<input type="checkbox" name="eaa_settings[enable_w3tc_ua_groups]" value=true
			<?php checked( $settings['enable_w3tc_ua_groups'] ); ?>/>
		<?php _e( 'Automatically create user agent groups for W3TC', 'eaa' ); ?>
	</label>
	<p class="description">
		<?php _e( 'Since EAA displays different ads for (Desktops, Tablets) & Mobiles,
		if you are using a caching plugin, a page cached for desktop may be shown for a user on mobile device and vice versa.
		Checking this option will create different user agent groups in w3tc settings.
		You just have to goto w3tc user agents group page and click on the save changes button.', 'eaa' ) ?>
	</p>

	<?php
}

function eaa_enable_between_content_ads_on_callback() {
	$settings                      = get_option( 'eaa_settings' );
	$enable_between_content_ads_on = $settings['enable_between_content_ads_on'] ? $settings['enable_between_content_ads_on'] : array();
	$post_types                    = eaa_get_post_types();
	?>
	<label>
		<?php _e( 'Select the post types on which you would like to show ads within content.', 'eaa' ); ?>
		<br>
		<select name="eaa_settings[enable_between_content_ads_on][]" multiple class="eaa-select">
			<?php
			foreach ( $post_types as $post_type ) :
				$selected = in_array( $post_type, $enable_between_content_ads_on ) ? 'selected' : '';
				echo "<option value='{$post_type}' {$selected}>{$post_type}</option>";
			endforeach;
			?>
		</select>
	</label>
	<p class="description">Default: Post, Page</p>

	<?php
}

function eaa_disable_other_ads_on_callback() {
	$settings             = get_option( 'eaa_settings' );
	$disable_other_ads_on = $settings['disable_other_ads_on'] ? $settings['disable_other_ads_on'] : array();
	$post_types           = eaa_get_post_types();
	?>
	<label>
		<?php _e( 'Select the post types on which you would like to disable ads widget, theme location ads and any other custom ad locations you defined.', 'eaa' ); ?>
		<br>
		<select name="eaa_settings[disable_other_ads_on][]" multiple class="eaa-select">
			<?php
			foreach ( $post_types as $post_type ) :
				$selected = in_array( $post_type, $disable_other_ads_on ) ? 'selected' : '';
				echo "<option value='{$post_type}' {$selected}>{$post_type}</option>";
			endforeach;
			?>
		</select>
	</label>
	<p class="description">Default: None selected</p>

	<?php
}

function eaa_custom_locations_callback() {
	$settings = get_option( 'eaa_settings' );
	?>
	<label>
		<?php _e( 'Add comma separated list of custom ad locations.', 'eaa' ) ?>
		<br>
		<textarea
			name="eaa_settings[custom_locations]"><?php echo sanitize_text_field( $settings['custom_locations'] ) ?></textarea>
		<br>
	</label>
	<p class="description">
		<?php _e( 'Example: above_footer,below_header', 'eaa' ) ?><br><br>
		<?php _e( 'Locations defined here will show up at customizer -> EAA -> My Custom Locations.', 'eaa' ) ?><br>
		<br>
		<?php _e( 'To use the add, insert the following code in your theme files', 'eaa' ) ?>
		<br>
	<pre>
&lt;?php
    // Use the appropriate ad location name
    echo eaa_get_ad( 'ps_above_header' );
?&gt;
		</pre>
	</p>

	If you are uncomfortable editing theme files, drop us an email at
	<a href="mailto:satish@swiftthemes.com?Subject=Question%20about%20EAA" target="_top"><strong>satish@SwiftThemes.com</strong></a> we can do it for a nominal fee.
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
	$options   = array(
		'enable_amp_support'            => 'eaa_sanitize_boolean',
		'enable_w3tc_ua_groups'         => 'eaa_sanitize_boolean',
		'enable_between_content_ads_on' => 'eaa_sanitize_pass',
		'disable_other_ads_on'          => 'eaa_sanitize_pass',
		'custom_locations'              => 'sanitize_text_field',
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

function eaa_sanitize_pass( $val ) {
	return $val;
}


function eaa_get_post_types() {
	$excluded   = [
		'revision',
		'nav_menu_item',
		'custom_css',
		'customize_changeset',
		'deprecated_log',
		'wpcf7_contact_form',
	];
	$post_types = get_post_types();

	return array_diff( $post_types, $excluded );
}