<?php
/**
 * Add meta box
 *
 * @param post $post The post object
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function rcc_add_meta_boxes( $post ) {
	add_meta_box( 'food_meta_box', __( 'RCC Options', 'rcc' ), 'rcc_build_meta_box', null, 'side', 'high' );
}

add_action( 'add_meta_boxes_post', 'rcc_add_meta_boxes' );


function rcc_build_meta_box() {
	global $rcc;
	wp_nonce_field( basename( __FILE__ ), "meta-box-nonce" );
	?>

	<label>
		<input type="checkbox"
		       name="disable_content_ads"
		       value="true" <?php checked( $rcc->get_meta( 'disable_content_ads' ), true ) ?>><?php _e( 'Disable custom content/ads in the post.', 'rcc' ) ?>
	</label>
	<!--
	<br>
	<label>
		<input type="checkbox"
		       name="disable_all_ads"
		       value="true" <?php checked( $rcc->get_meta( 'disable_all_ads' ), true ) ?>><?php _e( 'Disable all custom content/ads.', 'rcc' ) ?>
	</label>
	-->
	<?php
}

function rcc_save_meta_box( $post_id ) {

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


	global $rcc;
	$sanitized = $rcc->get_meta();


	$sanitized['disable_content_ads'] = isset( $_POST['disable_content_ads'] ) ? true : false;
	$sanitized['disable_all_ads']     = isset( $_POST['disable_all_ads'] ) ? true : false;

	update_post_meta( $post_id, '_rcc', $sanitized );

}

add_action( "save_post", "rcc_save_meta_box", 10, 3 );
