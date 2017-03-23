<?php

add_action( 'loop_start', 'eaa_loop_start' );

function eaa_loop_start( $query ) {

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


	$content = eaa_wrap_ad('home_between_posts_content');

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
