<?php

add_action( 'loop_start', 'rcc_loop_start' );

function rcc_loop_start( $query ) {
	if ( $query->is_main_query() ) {
		add_action( 'the_post', 'rcc_the_post' );
		add_action( 'loop_end', 'rcc_loop_end' );
	}
}

function rcc_the_post() {
	if ( is_single() ) {
		return;
	}
	GLOBAL $rcc;

	if ( ! $rcc->get_option( 'home_between_posts_content_enable' ) ) {
		return;
	}
	static $count = 0;
	static $repeated = 0;

	$every       = $rcc->get_option( 'home_between_posts_content_repeat_every' );
	$repeat      = $rcc->get_option( 'home_between_posts_content_repeat_for' );
	$start_after = $rcc->get_option( 'home_between_posts_content_start_after' );


	if ( $rcc->is_mobile() ) {
		$content = $rcc->get_option( 'home_between_posts_content_mobile' );
	} else {
		$content = $rcc->get_option( 'home_between_posts_content_desktop' );
	}

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

function rcc_loop_end() {
	remove_action( 'the_post', 'rcc_the_post' );
}
