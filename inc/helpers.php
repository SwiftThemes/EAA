<?php
/**
 * Created by PhpStorm.
 * User: satish
 * Date: 23/03/17
 * Time: 5:13 PM
 */

function eaa_wrap_ad( $name ) {
	global $eaa;
	if ( $eaa->is_mobile() ) {
		$suffix = '_mobile';
	} else {
		$suffix = '_desktop';
	}

	$style = 'style="';
	if ( $eaa->get_option( $name . '_margin_desktop' ) ) {
		$style .= 'margin:' . $eaa->get_option( $name . '_margin_desktop' ) . 'px;';
	}
	$style .= $eaa->get_option( $name . '_style_desktop' ) . '"';

	if ( $eaa->is_mobile() ) {
		return sprintf( '<div class="eaa-ad %s">%s</div>', $eaa->get_option( $name . '_align_desktop' ), stripslashes( $eaa->get_option( $name . $suffix ) ) );
	} else {
		return sprintf( '<div class="eaa-ad %s" %s>%s</div>', $eaa->get_option( $name . '_align_desktop' ), $style, stripslashes( $eaa->get_option( $name . $suffix ) ) );
	}

}


function eaa_get_term_ids( $post_id ) {
	$terms    = get_terms( array( 'object_ids' => $post_id ) );
	$term_ids = array();

	foreach ( $terms as $term ) {
		$term_ids[] = $term->term_id;
	}
	return $term_ids;
}