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
				$output = '<span class="customize-control-title rc">' . $this->label . '</span><div class="clear"></div><br><div class="responsive-content">';
				if ( isset( $this->settings[0] ) ) {
					$value = $this->settings[0]->value();
				} else {
					$value = '';
				}

				$output .= '<label><input  type="checkbox" ' . checked( $value, 1, false ) . $this->get_link( 0 ) . '><span>' . __( 'Enable this content area/ad', 'eaa' ) . '</span></label>';


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
				</select><div class="clear"></div>';

				if ( isset( $this->settings[1] ) ) {
					$value = $this->settings[1]->value();
				} else {
					$value = '';
				}
				$output .= '<div class="textarea desktop"><textarea type="number" ' . $this->get_link( 1 ) . ' placeholder="' . __( 'For desktops,laptops and tablets', 'eaa' ) . '" >' . $value . '</textarea></div>';

				if ( isset( $this->settings[2] ) ) {
					$value = $this->settings[2]->value();
				} else {
					$value = '';
				}
				$output .= '<div class="textarea mobile"><textarea type="number" ' . $this->get_link( 2 ) . ' placeholder="' . __( 'For mobiles', 'eaa' ) . '" >' . $value . '</textarea></div></div>';


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


				$output .= '<label>Margin in pixels without units<input  type="number" value="' . $margin . '"  class="" ' . $this->get_link( 4 ) . ' ></label>';


				$output .= '<br><label>Inline styles<input  value="' . $styles . '" type="text" class="" ' . $this->get_link( 5 ) . ' ></label>';
				$output .= '</div></div>';
				echo $output;
			}

		}
	}

}


