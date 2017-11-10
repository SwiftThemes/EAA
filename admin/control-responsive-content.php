<?php
/**
 * The image size customize control extends the WP_Customize_Control class.
 *
 * This class allows you to show two textareas. One for mobile, and the other for tablets and desktops.
 *
 *
 * @package    Helium
 * @subpackage Customize
 * @author     Satish Gandham <hello@SatishGandham.Com>
 * @copyright  Copyright (c) 2017 - 2017, Satish Gandham
 */


add_action( 'customize_register', 'eaa_responsive_content_control_register', 1 );

function eaa_responsive_content_control_register( $wp_customize ) {

	if ( ! class_exists( 'Eaa_Customize_Control_Responsive_Content' ) ) {

		class Eaa_Customize_Control_Responsive_Content extends WP_Customize_Control {

			public function render_content() {
				$settings  = get_option( 'eaa_settings' );
				$amp_class = isset( $settings['enable_amp_support'] ) && $settings['enable_amp_support'] ? 'amp-enabled' : 'amp-disabled';
				$output    = '<div class="eaa-ad-unit-container"><span class="customize-control-title rc">' . $this->label . '</span><div class="clear"></div><br><div class="eaa-ad-unit"><div class="responsive-content  ' . $amp_class . '">';
				$output .='<span class="help">'. $this->description .'</span><div class="clear"></div> ';
				if ( isset( $this->settings[0] ) ) {
					$value = $this->settings[0]->value();
				} else {
					$value = '';
				}

				$output .= '<label><input  type="checkbox" ' . checked( $value, 1, false ) . $this->get_link( 0 ) . '>' . __( 'Enable this content area/ad', 'eaa' ) . '</label>';


				if ( isset( $this->settings[3] ) ) {
					$value = $this->settings[3]->value();
				} else {
					$value = '';
				}

				$id = eaa_random_string();

				$output .= '
<br />
<br />
				<label for="' . $id . '" class="alignleft">Alignment</label>
<select class="alignleft" type="text" value="' . $value . '" ' . $this->get_link( 3 ) . '  id="' . $id . '">
				<option value="" ' . checked( $value, '', false ) . '>None (Default)</option>
				<option value="alignleft" ' . checked( $value, 'alignleft', false ) . '>Left</option>
				<option value="alignright" ' . checked( $value, 'alignright', false ) . '>Right</option>
				</select>
				<div class="clear"></div>
				<p class="help">' . __( 'If you are using responsive ad units from AdSense, set the alignment to None.','eaa' ) . '
				</p>';

				if ( isset( $this->settings[1] ) ) {
					$value = $this->settings[1]->value();
				} else {
					$value = '';
				}
				$output .= '<div class="textarea desktop"><textarea type="" ' . $this->get_link( 1 ) . ' placeholder="' . __( 'For desktops,laptops and tablets', 'eaa' ) . '" >' . $value . '</textarea></div>';


				$output .= '<p class="help">' . __(
						'If you wan\'t to show same ad on mobiles and desktop, paste the above code below', 'eaa' ) . '

</p>';
				if ( isset( $this->settings[2] ) ) {
					$value = $this->settings[2]->value();
				} else {
					$value = '';
				}
				$output .= '<div class="textarea mobile"><textarea type="" ' . $this->get_link( 2 ) . ' placeholder="' . __( 'For mobiles', 'eaa' ) . '" >' . $value . '</textarea></div>';


				if ( isset( $this->settings[6] ) ) {
					$value = $this->settings[6]->value();
				} else {
					$value = '';
				}
				$output .= '<div class="textarea amp"><textarea type="" ' . $this->get_link( 6 ) . ' placeholder="' . __( 'For Accelerated Mobile Pages', 'eaa' ) . '" >' . $value . '</textarea></div></div>';


				if ( isset( $this->settings[4] ) ) {
					$margin = $this->settings[4]->value();
				} else {
					$margin = '';
				}


				if ( isset( $this->settings[5] ) ) {
					$styles = $this->settings[5]->value();
				} else {
					$styles = '';
				}

				if ( $margin || $styles ) {
					$advanced_class = 'show';
				} else {
					$advanced_class = 'hide';
				}

				$output .= '<div><button style="" class="eaa-advanced-toggle">' . __( 'Advanced Options', 'eaa' ) . '</button>';
				$output .= '<div class="advanced ' . $advanced_class . '">';


				$output .= '<label>' . __( 'Margin around the ad in pixels without units', 'eaa' ) . '<input  type="number" value="' . $margin . '"  class="" ' . $this->get_link( 4 ) . ' ></label>';


				$output .= '<br><label>Inline styles<input  value="' . $styles . '" type="text" class="" ' . $this->get_link( 5 ) . ' ></label>';
				$output .= '</div></div></div></div>';
				echo $output;
			}

		}
	}

}


