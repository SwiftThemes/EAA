<?php

add_action( 'loop_start', 'eaa_loop_start' );

function eaa_loop_start( $query ) {

	if(is_feed()){
		return;
	}


	GLOBAL $eaa;

	// Disable ads on home page
	if ( is_home() && $eaa->get_option('disable_ads_between_posts_on_home_page')  ) {
		return;
	}



	$taxonomy_id = $query->queried_object?$query->queried_object->term_taxonomy_id:null;
	$settings    = get_option( 'eaa_settings' );

	if (
		isset($settings['enable_advanced_options']) &&
		$settings['enable_advanced_options'] &&
		isset($settings['disable_ads_on_taxonomy_archives']) &&
		$settings['disable_ads_on_taxonomy_archives'] &&
		$taxonomy_id &&
		in_array( $taxonomy_id, $settings['disable_ads_on_taxonomy_archives'] )

	) {
		return;
	}
	if ( $query->is_main_query() && ! is_singular() ) {
		add_action( 'the_post', 'eaa_the_post' );
		add_action( 'loop_end', 'eaa_loop_end' );
	} else {
		remove_action( 'the_post', 'eaa_the_post', 10 );
	}
}

function eaa_the_post() {
	if ( is_single() ) {
		return;
	}
	GLOBAL $eaa;

	if ( ! $eaa->get_option( 'home_between_posts_content_enable' ) ) {
		return;
	}
	static $count = 0;
	static $repeated = 0;

	$every       = $eaa->get_option( 'home_between_posts_content_repeat_every', 2 );
	$repeat      = $eaa->get_option( 'home_between_posts_content_repeat_for', 3 );
	$start_after = $eaa->get_option( 'home_between_posts_content_start_after', 1 );


	$content = eaa_get_ad( 'home_between_posts_content' );

	if (
		$count >= $start_after &&
		0 === ( $count - $start_after ) % $every &&
		$repeated < $repeat
	) {
		echo do_shortcode( stripslashes( $content ) );
		$repeated ++;
	}
	$count ++;
}

function eaa_loop_end() {
	remove_action( 'the_post', 'eaa_the_post', 10 );
}
