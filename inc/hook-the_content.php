<?php

add_filter( 'the_content', 'eaa_single_ads', 11 );
/**
 *
 * Inserts the ads in post content
 *
 * @param unknown_type $content
 */
function eaa_single_ads( $content ) {
	global $eaa;

	/*
	 * Don't execute the hook on
	 * - Archives
	 * - Attachment
	 * - If ad's are disabled for this post
	 */
	if ( ! is_singular() || is_attachment() || $eaa->get_meta( 'disable_content_ads' ) || $eaa->get_meta( 'disable_all_ads' ) ) {
			return $content;
	}


	if ( $eaa->is_mobile() ) {
		$suffix = '_mobile';
	} else {
		$suffix = '_desktop';
	}


	$below_title = $after_first_p = $after_first_img = $after_second_img = $between_post = $after_post = $after_nth_p = $after_nth_p_1 = $after_nth_p_2 = null;

	if ( $eaa->get_option( 'post_below_title_enable' ) ) {
		$below_title = eaa_wrap_ad( 'post_below_title' );
	}

	if ( $eaa->get_option( 'post_after_first_p_enable' ) ) {
		$after_first_p = eaa_wrap_ad( 'post_after_first_p' );
	}

	if ( $eaa->get_option( 'post_after_first_img_enable' ) ) {
		$after_first_img = eaa_wrap_ad( 'post_after_first_img' );
	}
	if ( $eaa->get_option( 'post_after_second_img_enable' ) ) {
		$after_second_img = eaa_wrap_ad( 'post_after_second_img' );
	}

	if ( $eaa->get_option( 'post_between_content_enable' ) ) {
		$between_post = eaa_wrap_ad( 'post_between_content' );
	}

	if ( $eaa->get_option( 'post_after_content_enable' ) ) {
		$after_post = eaa_wrap_ad( 'post_after_content' );
	}

	// Advanced ad
	$nth_p   = $eaa->get_option( 'show_after_nth_p' ) ? absint( $eaa->get_option( 'show_after_nth_p' ) ) : false;
	$nth_p_1 = $eaa->get_option( 'show_after_nth_p_1' ) ? absint( $eaa->get_option( 'show_after_nth_p_1' ) ) : false;
	$nth_p_2 = $eaa->get_option( 'show_after_nth_p_2' ) ? absint( $eaa->get_option( 'show_after_nth_p_2' ) ) : false;


	if ( $eaa->get_option( 'after_nth_p_enable' ) && $nth_p !== false ) {
		$after_nth_p = eaa_wrap_ad( 'after_nth_p' );
	}
	if ( $eaa->get_option( 'after_nth_p_1_enable' ) && $nth_p_1 !== false ) {
		$after_nth_p_1 = eaa_wrap_ad( 'after_nth_p_1' );
	}
	if ( $eaa->get_option( 'after_nth_p_2_enable' ) && $nth_p_2 !== false ) {
		$after_nth_p_2 = eaa_wrap_ad( 'after_nth_p_2' );
	}


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
				$content .= do_shortcode( stripslashes( $after_nth_p ) );
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

			if ( 0 == $i && $after_first_p ) {
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

		$s    = '/(<a [^>]*>[\s]*<img[^>]*><\/a>|<figure[^>]*>.*<\/figure>)/';
		$temp = preg_split( $s, $content, 3, PREG_SPLIT_DELIM_CAPTURE );

		if ( 1 !== count( $temp ) ) {
			$content = $temp[0] . $temp[1];
			if ( $after_first_img ) {
				$content .= do_shortcode( stripslashes( $after_first_img ) );
			}

			if ( $after_second_img && count( $temp ) === 5 ) {
				$content .= $temp[2] . $temp[3] . do_shortcode( stripslashes( $after_second_img ) ) . $temp[4];
			} else {
				$content .= $temp[2] . $temp[3] . $temp[4];
			}
		}
	}

	return $content;
}

?>