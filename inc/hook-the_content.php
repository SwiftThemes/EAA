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
	if ( ! is_single() || is_attachment() || $eaa->get_meta( 'disable_content_ads' ) || $eaa->get_meta( 'disable_all_ads' ) ) {
		return $content;
	}


	if ( $eaa->is_mobile() ) {
		$suffix = '_mobile';
	} else {
		$suffix = '_desktop';
	}


	$below_title = $after_first_p = $after_first_img = $between_post = $after_post = null;

	if ( $eaa->get_option( 'post_below_title_enable' ) ) {
		$below_title = '<div class="eaa-ad ' . $eaa->get_option( 'post_below_title_align_desktop' ) . '">' . $eaa->get_option( 'post_below_title' . $suffix ) . '</div>';
	}

	if ( $eaa->get_option( 'post_after_first_p_enable' ) ) {
		$after_first_p = '<div class="eaa-ad ' . $eaa->get_option( 'post_after_first_p_align_desktop' ) . '">' . $eaa->get_option( 'post_after_first_p' . $suffix ) . '</div>';
	}

	if ( $eaa->get_option( 'post_after_first_img_enable' ) ) {
		$after_first_img = '<div class="eaa-ad ' . $eaa->get_option( 'post_after_first_img_align_desktop' ) . '">' . $eaa->get_option( 'post_after_first_img' . $suffix ) . '</div>';
	}

	if ( $eaa->get_option( 'post_between_content_enable' ) ) {
		$between_post = '<div class="eaa-ad ' . $eaa->get_option( 'post_between_content_align_desktop' ) . '">' . $eaa->get_option( 'post_between_content' . $suffix ) . '</div>';
	}

	if ( $eaa->get_option( 'post_after_content_enable' ) ) {
		$after_post = '<div class="eaa-ad ' . $eaa->get_option( 'post_after_content_align_desktop' ) . '">' . $eaa->get_option( 'post_after_content' . $suffix ) . '</div>';
	}

	// Advanced ad
	$nth_p = absint($eaa->get_option( 'show_after_nth_p' ));

	var_dump($nth_p);

	if ( $eaa->get_option( 'after_nth_p_enable' ) && $eaa->get_option( 'show_after_nth_p' ) !== 0 ) {
		$after_nth_p = '<div class="eaa-ad ' . $eaa->get_option( 'after_nth_p_desktop' ) . '">' . $eaa->get_option( 'after_nth_p' . $suffix ) . '</div>';
	}

	var_dump($after_nth_p);

	if ( $between_post || $after_first_p || $after_nth_p ) {
		$temp      = explode( '</p>', $content );
		$add_after = (int) ( count( $temp ) / 2 );
		$content   = '';
		$count     = count( $temp );

		$add_at_the_end = true;


		for ( $i = 0; $i < $count; $i ++ ) {
			$content .= $temp[ $i ] . '</p>';
			if ( $between_post && ( $i + 1 == $add_after ) ) {
				$content .= do_shortcode( stripslashes( $between_post ) );
			}

			// If between post and nth_p are not same
			if ( !$between_post || $add_after !== $nth_p && $i+1 == $nth_p){
				var_dump('Inside');
				var_dump($nth_p);
				var_dump($add_after);
				$content .= do_shortcode( stripslashes( $after_nth_p ) );

				$add_at_the_end = false;
			}

			if ( 0 == $i && $after_first_p ) {
				$content .= do_shortcode( stripslashes( $after_first_p ) );
			}
		}
		$content .= do_shortcode( stripslashes( $after_nth_p ) );

	}

	if ( $below_title ) {
		$content = do_shortcode( stripslashes( $below_title ) ) . $content;
	}

	if ( $after_post ) {
		$content = $content . do_shortcode( stripslashes( $after_post ) );
	}

	if ( $after_first_img ) {

		$s    = '/(<a [^>]*>[\s]*<img[^>]*><\/a>|<figure[^>]*>.*<\/figure>)/';
		$temp = preg_split( $s, $content, 2, PREG_SPLIT_DELIM_CAPTURE );
		if ( 1 !== count( $temp ) ) {
			$content = $temp[0] . $temp[1] . do_shortcode( stripslashes( $after_first_img ) ) . $temp[2];
		}
	}

	return $content;
}

?>