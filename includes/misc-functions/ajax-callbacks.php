<?php 

//Ajac function which is used to dismiss messages to the user
function mp_knapstack_dismiss_notice(){
	
	$post_id = $_POST['post_id'];
	$notice_name = $_POST['notice_name'];
	
	//Save this notice name as false so that we know not to show it
	update_post_meta( $post_id, $notice_name, 'dismissed' );
			
}
add_action( 'wp_ajax_mp_knapstack_dismiss_notice', 'mp_knapstack_dismiss_notice' );
add_action( 'wp_ajax_no_priv_mp_knapstack_dismiss_notice', 'mp_knapstack_dismiss_notice' );