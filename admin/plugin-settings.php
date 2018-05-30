<?php

function eaa_settings_init() {
	add_settings_section(
		'eaa_advanced',
		__( 'Basic Settings', 'eaa' ),
		'eaa_advanced_options_section_callback',
		'eaa-settings'
	);
	add_settings_section(
		'eaa_super_advanced',
		__( 'Advanced Settings', 'eaa' ),
		'eaa_advanced_options_section_callback',
		'eaa-settings'
	);
	add_settings_section(
		'eaa_plugin_compatibility',
		__( 'Plugin Compatibility', 'eaa' ),
		'eaa_advanced_options_section_callback',
		'eaa-settings'
	);

	add_settings_section(
		'eaa_helpers',
		__( 'Advanced helpers', 'eaa' ),
		'eaa_advanced_options_section_callback',
		'eaa-settings'
	);

//	add_settings_field(
//		'disable_ads_on_home_page',
//		__( 'Disable ads on home page', 'eaa' ),
//		'eaa_disable_ads_on_home_page_callback',
//		'eaa-settings',
//		'eaa_advanced'
//	);
	add_settings_field(
		'enable_advanced_options',
		__( 'Enable advanced options', 'eaa' ),
		'eaa_enable_advanced_options_callback',
		'eaa-settings',
		'eaa_super_advanced'
	);
	add_settings_field(
		'disable_ads_on_taxonomy_archives',
		__( 'Disable ads on taxonomy archives', 'eaa' ),
		'eaa_disable_ads_on_taxonomy_archives_callback',
		'eaa-settings',
		'eaa_super_advanced'
	);

	add_settings_field(
		'disable_ads_on_taxonomies',
		__( 'Disable ads on post types in these taxonomies', 'eaa' ),
		'eaa_disable_ads_on_taxonomies_callback',
		'eaa-settings',
		'eaa_super_advanced'
	);

	add_settings_field(
		'set_the_content_hook_priority',
		__( 'the_content hook priority', 'eaa' ),
		'eaa_set_the_content_hook_priority_callback',
		'eaa-settings',
		'eaa_plugin_compatibility'
	);

	add_settings_field(
		'disable_wpautop',
		__( 'Disable wpautop filter selectively', 'eaa' ),
		'eaa_disable_wpautop_callback',
		'eaa-settings',
		'eaa_helpers'
	);

	add_settings_field(
		'enable_debug_mode',
		__( 'Enable debug mode', 'eaa' ),
		'eaa_enable_debug_mode',
		'eaa-settings',
		'eaa_advanced'
	);

	add_settings_field(
		'enable_between_content_ads_on',
		__( 'Enable Between Content Ads on', 'eaa' ),
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


function eaa_disable_ads_on_home_page_callback() {
	$settings = get_option( 'eaa_settings' );
	?>
    <label>
        <input type="checkbox" name="eaa_settings[disable_ads_on_home_page]" value=true
			<?php checked( $settings['disable_ads_on_home_page'] ); ?>/>
		<?php _e( 'Disable ads between posts on home page', 'eaa' ); ?>
    </label>
    <p class="description"><?php _e( 'Check this option if you wan\'t to keep the home page clean without any ads while continuing to show ads on other archive pages.', 'eaa' ) ?></p>
	<?php
}

function eaa_enable_advanced_options_callback() {
	$settings = get_option( 'eaa_settings' );
	?>
    <label>
        <input type="checkbox" name="eaa_settings[enable_advanced_options]" value=true
			<?php checked( isset( $settings['enable_advanced_options'] ) && $settings['enable_advanced_options'] ); ?>/>
		<?php _e( '', 'eaa' ); ?>
    </label>
	<?php
}

function eaa_disable_ads_on_taxonomy_archives_callback() {
	$settings             = get_option( 'eaa_settings' );
	$disable_other_ads_on = isset( $settings['disable_ads_on_taxonomy_archives'] ) && $settings['disable_ads_on_taxonomy_archives'] ? $settings['disable_ads_on_taxonomy_archives'] : array();
	$taxonomies           = get_terms( array( 'hide_empty' => false, 'orderby' => 'taxonomy' ) );
	?>
    <label>
		<?php _e( 'Select the categories, tags and custom terms where you don\'t want to display ads', 'eaa' ); ?>
        <br>
        <select name="eaa_settings[disable_ads_on_taxonomy_archives][]" multiple class="eaa-select">
			<?php
			foreach ( $taxonomies as $taxonomy ) :
				$selected = in_array( $taxonomy->term_taxonomy_id, $disable_other_ads_on ) ? 'selected' : '';
				echo "<option value='{$taxonomy->term_taxonomy_id}' {$selected}>{$taxonomy->name} ({$taxonomy->taxonomy})</option>";
			endforeach;
			?>
        </select>
    </label>
    <p class="description">Default: None selected<br>
        Use this option to selectively disable ads on category and tag archives which might violate the advertisers
        terms of service.
    </p>

	<?php
}

function eaa_disable_ads_on_taxonomies_callback() {
	$settings             = get_option( 'eaa_settings' );
	$disable_other_ads_on = isset( $settings['disable_ads_on_taxonomies'] ) && $settings['disable_ads_on_taxonomies'] ? $settings['disable_ads_on_taxonomies'] : array();
	$taxonomies           = get_terms( array( 'hide_empty' => false, 'orderby' => 'taxonomy' ) );
	?>
    <label>
		<?php _e( 'Disable ads on posts and post types in these categories, tags or custom terms', 'eaa' ); ?>
        <br>
        <select name="eaa_settings[disable_ads_on_taxonomies][]" multiple class="eaa-select">
			<?php
			foreach ( $taxonomies as $taxonomy ) :
				$selected = in_array( $taxonomy->term_taxonomy_id, $disable_other_ads_on ) ? 'selected' : '';
				echo "<option value='{$taxonomy->term_taxonomy_id}' {$selected}>{$taxonomy->name} ({$taxonomy->taxonomy})</option>";
			endforeach;
			?>
        </select>
    </label>
    <p class="description">Default: None selected
        <br>
        Use this option to selectively disable ads on posts in categories and tags which might violate the advertisers
        terms of service.
    </p>
	<?php
}


function eaa_enable_amp_support_callback() {
	$settings = get_option( 'eaa_settings' );
	?>
    <label>
        <input type="checkbox" name="eaa_settings[enable_amp_support]" value=true
			<?php checked( isset( $settings['enable_amp_support'] ) && $settings['enable_amp_support'] ); ?>/>
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
			<?php checked( isset( $settings['enable_w3tc_ua_groups'] ) && $settings['enable_w3tc_ua_groups'] ); ?>/>
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

function eaa_disable_wpautop_callback() {
	$settings = get_option( 'eaa_settings' );
	?>
    <label>
        <input type="checkbox" name="eaa_settings[disable_wpautop]" value=true
			<?php checked( $settings['disable_wpautop'] ); ?>/>
		<?php _e( 'Enable custom tag to disable wpautop', 'eaa' ); ?>
    </label>
    <p class="description">
		<?php _e( 'If you are adding AdSense ads or other ads to your post content directly, 
		you will notice that sometimes WordPress truncates the code by adding line breaks between them.', 'eaa' ) ?>
        <br>
		<?php _e( 'You can avoid that by enabling this option and wrapping your code in noformat tags like below ', 'eaa' ) ?>
    <pre>&lt;!-- noformat on --&gt;JavaScript ad code here&lt;!-- noformat on --&gt;</pre>
    </p>

	<?php
}

function eaa_enable_debug_mode() {
	$settings = get_option( 'eaa_settings' );
	?>
    <label>
        <input type="checkbox" name="eaa_settings[enable_debug_mode]" value=true
			<?php checked( $settings['enable_debug_mode'] ); ?>/>
		<?php _e( 'Enable debug mode', 'eaa' ); ?>
    </label>
    <p class="description">
		<?php _e( 'Will highlight all the ad codes with a red border so that you know if the ad code is inserted properly. [Visible only to the admins]', 'eaa' ) ?>
        <br>
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
	$disable_other_ads_on = isset( $settings['disable_other_ads_on'] ) && $settings['disable_other_ads_on'] ? $settings['disable_other_ads_on'] : array();
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
                name="eaa_settings[custom_locations]"><?php echo esc_attr( $settings['custom_locations'] ) ?></textarea>
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
    // prefixed with my_, my_ is a keyword/namespacing to make sure your custom locations won't conflict with other locations.
    echo eaa_get_ad( 'my_above_header' );
?&gt;
		</pre>
    –– OR ––
    <br>
    <br>
    If you are using the ads in some places where shortcodes are enabled then you can use

    <pre>[eaa_show_ad ad="my_above_header"]
    </pre>
    </p>

    If you are not comfortable editing theme files, drop us an email at
    <a href="mailto:satish@swiftthemes.com?Subject=Question%20about%20EAA"
       target="_top"><strong>satish@SwiftThemes.com</strong></a> we can do it for a nominal fee.
	<?php
}

function eaa_set_the_content_hook_priority_callback() {
	$settings = get_option( 'eaa_settings' );


	?>
    <label>
        <input type="number" name="eaa_settings[the_content_hook_priority]" min="0"
               value="<?php echo intval( $settings['the_content_hook_priority'] ) ?>">
        <br>
        <p class="description">
			<?php _e( 'Set the priority at which EAA should hook into the_content to inject 
			ads on posts and pages. ', 'eaa' ) ?>
            <br>
			<?php _e( 'A lower number implies ads are injected earlier.', 'eaa' ) ?>
            <br>
			<?php _e( 'Default value', 'eaa' ) ?>: 11
        </p>
    </label>
    <p class="description">

    </p>

	<?php
}

function eaa_options_page() {
	?>
    <div class="wrap">
        <h1>Easy AdSense Ads Manager</h1>
        <hr>
		<?php eaa_marketing() ?>
        <form method="post" action="options.php" style="overflow: hidden;border-right: solid 1px #DDD">
			<?php settings_fields( 'eaa-settings' ); ?>
			<?php do_settings_sections( 'eaa-settings' ); ?>
			<?php submit_button(); ?>

        </form>
    </div>
<?php }

function eaa_sanitize_settings( $input ) {
	//@todo Avoid pass.
	$options   = array(
		'enable_amp_support'               => 'eaa_sanitize_boolean',
		'enable_w3tc_ua_groups'            => 'eaa_sanitize_boolean',
		'enable_between_content_ads_on'    => 'eaa_sanitize_pass',
		'disable_other_ads_on'             => 'eaa_sanitize_pass',
		'custom_locations'                 => 'esc_attr',
		'disable_ads_on_home_page'         => 'eaa_sanitize_boolean',
		'enable_advanced_options'          => 'eaa_sanitize_boolean',
		'disable_ads_on_taxonomies'        => 'eaa_sanitize_pass',
		'disable_ads_on_taxonomy_archives' => 'eaa_sanitize_pass',
		'the_content_hook_priority'        => 'intval',
		'activated_on'                     => 'intval',
		'disable_wpautop'                  => 'eaa_sanitize_boolean',
		'enable_debug_mode'                => 'eaa_sanitize_boolean',
	);
	$sanitized = array();
	foreach ( $options as $key => $func ) {
		if ( isset( $input[ $key ] ) ) {
			$sanitized[ $key ] = $func( $input[ $key ] );
		}
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
	$excluded   = array(
		'revision',
		'nav_menu_item',
		'custom_css',
		'customize_changeset',
		'deprecated_log',
		'wpcf7_contact_form',
	);
	$post_types = get_post_types();

	return array_diff( $post_types, $excluded );
}

function eaa_get_taxonomy_types() {
	get_terms( array(
		'hide_empty' => false,
	) );
}