<?php

$settings = get_option( 'eaa_settings' );
$priority = isset( $settings['the_content_hook_priority'] ) && $settings['the_content_hook_priority'] ? $settings['the_content_hook_priority'] : 11;
add_filter( 'the_content', 'eaa_single_ads', $priority );
/**
 *
 * Inserts the ads in post content
 *
 * @param unknown_type $content
 */
function eaa_single_ads( $content ) {

	if ( is_feed() ) {
		return $content;
	}


	global $eaa;
	global $post;


	$settings                      = get_option( 'eaa_settings' );
	$enable_between_content_ads_on = $settings['enable_between_content_ads_on'] ? $settings['enable_between_content_ads_on'] : array();

	if ( ! is_singular() || ! in_array( $post->post_type, $enable_between_content_ads_on ) || $eaa->get_meta( 'disable_content_ads' ) || $eaa->get_meta( 'disable_all_ads' ) ) {
		return $content;
	}


	if ( isset( $settings['enable_advanced_options'] ) &&
	     $settings['enable_advanced_options'] &&
	     isset( $settings['disable_ads_on_taxonomies'] ) &&
	     $settings['disable_ads_on_taxonomies'] ) {
		$post_terms   = eaa_get_term_ids( $post->ID );
		$intersection = array_intersect( $post_terms, $settings['disable_ads_on_taxonomies'] );
		if ( count( $intersection ) ) {
			return $content;
		}
	}

	if ( $eaa->is_mobile() ) {
		$suffix = '_mobile';
	} else {
		$suffix = '_desktop';
	}


	$below_title = $after_first_p = $after_first_img = $after_second_img = $between_post = $after_post = $after_nth_p = $after_nth_p_1 = $after_nth_p_2 = null;

	if ( $eaa->get_option( 'post_below_title_enable' ) ) {
		$below_title = eaa_get_content_ad( 'post_below_title' );
	}

	if ( $eaa->get_option( 'post_after_first_p_enable' ) ) {
		$after_first_p = eaa_get_content_ad( 'post_after_first_p' );
	}

	if ( $eaa->get_option( 'post_after_first_img_enable' ) ) {
		$after_first_img = eaa_get_content_ad( 'post_after_first_img' );
	}
	if ( $eaa->get_option( 'post_after_second_img_enable' ) ) {
		$after_second_img = eaa_get_content_ad( 'post_after_second_img' );
	}

	if ( $eaa->get_option( 'post_between_content_enable' ) ) {
		$between_post = eaa_get_content_ad( 'post_between_content' );
	}

	if ( $eaa->get_option( 'post_after_content_enable' ) ) {
		$after_post = eaa_get_content_ad( 'post_after_content' );
	}

	// Advanced ad
	$nth_p   = $eaa->get_option( 'show_after_nth_p' ) ? absint( $eaa->get_option( 'show_after_nth_p' ) ) : false;
	$nth_p_1 = $eaa->get_option( 'show_after_nth_p_1' ) ? absint( $eaa->get_option( 'show_after_nth_p_1' ) ) : false;
	$nth_p_2 = $eaa->get_option( 'show_after_nth_p_2' ) ? absint( $eaa->get_option( 'show_after_nth_p_2' ) ) : false;


	if ( $eaa->get_option( 'after_nth_p_enable' ) && false !== $nth_p ) {
		$after_nth_p = eaa_get_content_ad( 'after_nth_p' );
	}
	if ( $eaa->get_option( 'after_nth_p_1_enable' ) && false !== $nth_p_1 ) {
		$after_nth_p_1 = eaa_get_content_ad( 'after_nth_p_1' );
	}
	if ( $eaa->get_option( 'after_nth_p_2_enable' ) && false !== $nth_p_2 ) {
		$after_nth_p_2 = eaa_get_content_ad( 'after_nth_p_2' );
	}


	//@todo move do_shortcode to the get ad function.
	if ( $between_post || $after_first_p || $after_nth_p || $after_nth_p_1 || $after_nth_p_2 ) {
		$temp      = explode( '</p>', $content );
		$add_after = (int) ( count( $temp ) / 2 );
		$content   = '';
		$count     = count( $temp );

		$add_at_the_end = $eaa->get_option( 'show_after_nth_at_the_end' );


		for ( $i = 0; $i < $count; $i ++ ) {
			if ( $between_post && ( $i == $add_after ) ) {
				$content .= do_shortcode( stripslashes( $between_post ) );
			}

			// If between post and nth_p are not same
			if ( ( ! $between_post || $add_after !== $nth_p ) && $i == $nth_p ) {
				$content        .= do_shortcode( stripslashes( $after_nth_p ) );
				$add_at_the_end = false;
			}

			// If between post and nth_p are not same
			if ( ( ! $between_post || $add_after !== $nth_p_1 ) && $i == $nth_p_1 ) {
				$content .= do_shortcode( stripslashes( $after_nth_p_1 ) );
			}

			// If between post and nth_p are not same
			if ( ( ! $between_post || $add_after !== $nth_p_2 ) && $i == $nth_p_2 ) {
				$content .= do_shortcode( stripslashes( $after_nth_p_2 ) );
			}

			if ( 1 == $i && $after_first_p ) {
				$content .= do_shortcode( stripslashes( $after_first_p ) );
			}
			$content .= $temp[ $i ] . '</p>';

		}
		if ( $add_at_the_end && isset( $after_nth_p ) ) {
			$content .= do_shortcode( stripslashes( $after_nth_p ) );
		}

	}

	if ( $below_title ) {
		$content = do_shortcode( stripslashes( $below_title ) ) . $content;
	}

	if ( $after_post ) {
		$content = $content . do_shortcode( stripslashes( $after_post ) );
	}

	if ( $after_first_img || $after_second_img ) {

		$s    = '/(<a [^>]*>[\s]*<img[^>]*><\/a>|<figure[^>]*>.*<\/figure>|<img[^>]*>)/';
		$temp = preg_split( $s, $content, 3, PREG_SPLIT_DELIM_CAPTURE );

//		if ( count( $temp ) === 1 ) {
//			$s    = '/(<img[^>]*>)/';
//			$temp = preg_split( $s, $content, 3, PREG_SPLIT_DELIM_CAPTURE );
//		}

		/**
		 * 0 --> Content before the image
		 * 1 --> First image
		 * 2 --> Content between first and second image, if there is no image, remaining content.
		 * 3 -->  Second image
		 * 4 --> Content after second image.
		 */

		if ( 1 !== count( $temp ) ) {
			$content = $temp[0] . $temp[1];
			if ( $after_first_img ) {
				$content .= do_shortcode( stripslashes( $after_first_img ) );
			}
			// Content between first and second image or the end.
			$content .= $temp[2];

			if ( count( $temp ) === 5 ) {
				//There is a second image
				if ( $after_second_img ) {
					$content .= $temp[3] . do_shortcode( stripslashes( $after_second_img ) ) . $temp[4];
				} else {
					$content .= $temp[3] . $temp[4];
				}
			}
		}
	}

	return $content;
}

?>