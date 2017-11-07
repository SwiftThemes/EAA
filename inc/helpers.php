<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/03/17
 * Time: 5:13 PM
 */

function eaa_get_term_ids( $post_id ) {
	$terms    = get_terms( array( 'object_ids' => $post_id ) );
	$term_ids = array();

	foreach ( $terms as $term ) {
		$term_ids[] = $term->term_id;
	}
	return $term_ids;
}


if ( ! function_exists( 'eaa_random_string' ) ) {

	function eaa_random_string( $length = 5 ) {
		return substr( str_shuffle( str_repeat( $x = 'abcdefghijklmnopqrstuvwxyz', ceil( $length / strlen( $x ) ) ) ), 1, $length );
	}
}