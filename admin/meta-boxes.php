<?php
/**
 * Add meta box
 *
 * @param post $post The post object
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function eaa_add_meta_boxes( $post ) {
	add_meta_box( 'food_meta_box', __( 'EAA Options', 'eaa' ), 'eaa_build_meta_box', null, 'side', 'high' );
}

add_action( 'add_meta_boxes_post', 'eaa_add_meta_boxes' );


function eaa_build_meta_box() {
	global $eaa;
	wp_nonce_field( basename( __FILE__ ), "meta-box-nonce" );
	?>

	<label>
		<input type="checkbox"
		       name="disable_content_ads"
		       value=1 <?php checked( $eaa->get_meta( 'disable_content_ads' ) ) ?>><?php _e( 'Disable custom content/ads in the post.', 'eaa' ) ?>
	</label>
	<br>
	<label>
		<input type="checkbox"
		       name="disable_all_ads"
		       value=1 <?php checked( $eaa->get_meta( 'disable_all_ads' ) ) ?>><?php _e( 'Disable all custom content/ads.', 'eaa' ) ?>
	</label>
	<?php
}

function eaa_save_meta_box( $post_id ) {

	if ( ! isset( $_POST["meta-box-nonce"] ) || ! wp_verify_nonce( $_POST["meta-box-nonce"], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	if ( ! current_user_can( "edit_post", $post_id ) ) {
		return $post_id;
	}

	if ( defined( "DOING_AUTOSAVE" ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

//
//	$slug = "post";
//	if ( $slug != $post->post_type ) {
//		return $post_id;
//	}


	global $eaa;
	$sanitized = $eaa->get_meta();


	$sanitized['disable_content_ads'] = isset( $_POST['disable_content_ads'] ) ? true : false;
	$sanitized['disable_all_ads']     = isset( $_POST['disable_all_ads'] ) ? true : false;

	update_post_meta( $post_id, '_eaa', $sanitized );

}

add_action( "save_post", "eaa_save_meta_box", 10, 3 );
