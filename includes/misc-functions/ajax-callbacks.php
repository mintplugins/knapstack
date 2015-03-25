<?php 

//Ajax function which is used to get the list of page templates and show them to use user on the front end
function mp_knapstack_get_page_templates(){
		
	$templates = get_page_templates();
	
	echo '<option value="default">' . __( 'MP Stack - 100% Width', 'mp_knapstack' ) . '</option>';
	
	foreach ( $templates as $template_name => $template_filename ) {
		echo '<option value="' . $template_filename . '">' . $template_name . '</option>';
	}
	
	die();
			
}
add_action( 'wp_ajax_mp_knapstack_get_page_templates', 'mp_knapstack_get_page_templates' );
add_action( 'wp_ajax_no_priv_mp_knapstack_get_page_templates', 'mp_knapstack_get_page_templates' );

//Ajax function which is used change the page template
function mp_knapstack_set_page_template(){
		
	//Check the nonce
	wp_verify_nonce( $_POST['nonce'], 'mp-knapstack-change-template-' . $_POST['post_id'] );
	
	//Change the page template	
	update_post_meta( $_POST['post_id'], '_wp_page_template', $_POST['template_filename'] );
	
	echo json_encode( array( true ) );
	
	die();
			
}
add_action( 'wp_ajax_mp_knapstack_set_page_template', 'mp_knapstack_set_page_template' );
add_action( 'wp_ajax_no_priv_mp_knapstack_set_page_template', 'mp_knapstack_set_page_template' );

//Ajax function which is used to dismiss messages to the user
function mp_knapstack_dismiss_notice(){
	
	$post_id = $_POST['post_id'];
	$notice_name = $_POST['notice_name'];
	
	//Save this notice name as false so that we know not to show it
	update_post_meta( $post_id, $notice_name, 'dismissed' );
	
	die();
			
}
add_action( 'wp_ajax_mp_knapstack_dismiss_notice', 'mp_knapstack_dismiss_notice' );
add_action( 'wp_ajax_no_priv_mp_knapstack_dismiss_notice', 'mp_knapstack_dismiss_notice' );