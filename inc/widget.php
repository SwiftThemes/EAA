<?php
/**
 * Widget API: WP_Widget_Text class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Text widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class EAA_Widget_Text extends WP_Widget {

	/**
	 * Sets up a new Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops  = array(
			'classname'                   => 'widget_text eaa __eaa__',
			'description'                 => __( 'AdSense ads, arbitrary text, HTML or JS.', 'eaa' ),
			'customize_selective_refresh' => true,
		);
		$control_ops = array( 'width' => 400, 'height' => 350 );
		parent::__construct( 'eaa', __( 'Easy AdSense Ads & Scripts', 'eaa' ), $widget_ops, $control_ops );
	}

	/**
	 * Outputs the content for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Text widget instance.
	 */
	public function widget( $args, $instance ) {

		global $eaa;

		if ( $eaa->get_meta( 'disable_all_ads' ) ) {
			return;
		}
		$settings             = get_option( 'eaa_settings' );
		$disable_other_ads_on = isset( $settings['disable_other_ads_on'] ) && $settings['disable_other_ads_on'] ? $settings['disable_other_ads_on'] : array();
		global $post;

		if ( is_singular() && in_array( $post->post_type, $disable_other_ads_on ) ) {
			return false;
		}

		if ( isset( $settings['enable_advanced_options'] ) &&
		     $settings['enable_advanced_options'] &&
		     isset( $settings['disable_ads_on_taxonomies'] ) &&
		     $settings['disable_ads_on_taxonomies'] ) {


			if ( is_singular() ) {
				$post_terms   = eaa_get_term_ids( $post->ID );
				$intersection = array_intersect( $post_terms, $settings['disable_ads_on_taxonomies'] );
				if ( count( $intersection ) ) {
					return;
				}
			} else if ( is_category() || is_tag() || is_tax() ) {
				$queried_object = get_queried_object();
				if ( array_search( (string) $queried_object->term_id, $settings['disable_ads_on_taxonomy_archives'] ) !== false ) {
					return;
				}
			}
		}



		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );


		if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() && $settings['enable_amp_support'] ) {
			$widget_text = ! empty( $instance['text_amp'] ) ? $instance['text_amp'] : '';
		} elseif ( $eaa->is_mobile() ) {
			$widget_text = ! empty( $instance['text_mobile'] ) ? $instance['text_mobile'] : '';
		} else {
			$widget_text = ! empty( $instance['text_desktop'] ) ? $instance['text_desktop'] : '';
		}


		if ( ! $widget_text ) {
			return;
		}
		/**
		 * Filters the content of the Text widget.
		 *
		 * @since 2.3.0
		 * @since 4.4.0 Added the `$this` parameter.
		 *
		 * @param string $widget_text The widget content.
		 * @param array $instance Array of settings for the current widget.
		 * @param WP_Widget_Text $this Current Text widget instance.
		 */


		$text = apply_filters( 'widget_text', $widget_text, $instance, $this );


		if ( $instance['no_padding'] ) {
			$args['before_widget'] = str_replace( '__eaa__', 'eaa-clean', $args['before_widget'] );
		}


		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
        <div class="textwidget"><?php echo ! empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating settings for the current Text widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Settings to save or bool false to cancel saving.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['text_desktop'] = $new_instance['text_desktop'];
			$instance['text_mobile']  = $new_instance['text_mobile'];
			$instance['text_amp']     = $new_instance['text_amp'];
		} else {
			$instance['text_desktop'] = wp_kses_post( $new_instance['text_desktop'] );
			$instance['text_mobile']  = wp_kses_post( $new_instance['text_mobile'] );
			$instance['text_amp']     = wp_kses_post( $new_instance['text_amp'] );
		}
		$instance['filter']     = ! empty( $new_instance['filter'] );
		$instance['no_padding'] = ! empty( $new_instance['no_padding'] );

		return $instance;
	}

	/**
	 * Outputs the Text widget settings form.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance   = wp_parse_args( (array) $instance, array(
			'title'        => '',
			'text_desktop' => '',
			'text_mobile'  => '',
		) );
		$filter     = isset( $instance['filter'] ) ? $instance['filter'] : 0;
		$no_padding = isset( $instance['no_padding'] ) ? $instance['no_padding'] : 0;
		$title      = sanitize_text_field( $instance['title'] );
		?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'eaa' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>"/></p>

        <p><label
                    for="<?php echo $this->get_field_id( 'text_desktop' ); ?>"><?php _e( 'For desktops and tablets', 'eaa' ); ?></label>
            <textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id( 'text_desktop' ); ?>"
                      name="<?php echo $this->get_field_name( 'text_desktop' ); ?>"><?php echo esc_textarea( $instance['text_desktop'] ); ?></textarea>
        </p>
        <p><label for="<?php echo $this->get_field_id( 'text_mobile' ); ?>"><?php _e( 'For mobile:', 'eaa' ); ?></label>
            <textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id( 'text_mobile' ); ?>"
                      name="<?php echo $this->get_field_name( 'text_mobile' ); ?>"><?php echo esc_textarea( $instance['text_mobile'] ); ?></textarea>
        </p>

        <p><label for="<?php echo $this->get_field_id( 'text_amp' ); ?>"><?php _e( 'For AMP:', 'eaa' ); ?></label>
            <textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id( 'text_amp' ); ?>"
                      name="<?php echo $this->get_field_name( 'text_amp' ); ?>"><?php echo esc_textarea( $instance['text_amp'] ); ?></textarea>
        </p>

        <p><input id="<?php echo $this->get_field_id( 'filter' ); ?>"
                  name="<?php echo $this->get_field_name( 'filter' ); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label
                    for="<?php echo $this->get_field_id( 'filter' ); ?>"><?php _e( 'Automatically add paragraphs', 'eaa' ); ?></label>
        </p>

        <p><input id="<?php echo $this->get_field_id( 'no_padding' ); ?>"
                  name="<?php echo $this->get_field_name( 'no_padding' ); ?>"
                  type="checkbox"<?php checked( $no_padding ); ?> />&nbsp;<label
                    for="<?php echo $this->get_field_id( 'no_padding' ); ?>"><?php _e( 'Remove default padding and border.', 'eaa' ); ?></label>
        </p>
		<?php
	}
}


/**
 * Register the widgets.
 *
 * @since 0.1
 */
function eaa_widgets_init() {
	register_widget( 'EAA_Widget_Text' );
}

add_action( 'widgets_init', 'eaa_widgets_init', 1 );