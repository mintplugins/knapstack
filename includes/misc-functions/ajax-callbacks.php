<?php 

//Ajax function which is used to get the list of page templates and show them to use user on the front end
function mp_knapstack_get_page_templates(){
	
	$post_type = $_POST['post_type'];
	
	//If this is a page
	if ( $post_type == 'page' ){
		echo '<option value="default">' . __( 'MP Stack - 100% Width', 'mp_knapstack' ) . '</option>';	
		$templates = get_page_templates();
		
		foreach ( $templates as $template_name => $template_filename ) {
			echo '<option value="' . $template_filename . '">' . $template_name . '</option>';
		}
	
	
	}
	//If this is something else like an EDD Download or a WooCommerce Product
	else{
		$templates = get_theme_support( 'post-formats' );
		$templates = $templates[0];
		foreach ( $templates as $template_name => $template_filename ) {
			echo '<option value="' . $template_filename . '">' . apply_filters( 'mp_knapstack_rename_gallery', ucfirst( $template_filename ) ) . '</option>';
		}
		echo '<option value="0">' . __( 'Standard', 'mp_knapstack' ) . '</option>';	
	}

	die();
			
}
add_action( 'wp_ajax_mp_knapstack_get_page_templates', 'mp_knapstack_get_page_templates' );
add_action( 'wp_ajax_no_priv_mp_knapstack_get_page_templates', 'mp_knapstack_get_page_templates' );

//Ajax function which is used change the page template
function mp_knapstack_set_page_template(){
		
	//Check the nonce
	wp_verify_nonce( $_POST['nonce'], 'mp-knapstack-change-template-' . $_POST['post_id'] );
	
	//If this is a page
	if ( $_POST['post_type'] == 'page' ){
		//Change the page template	
		update_post_meta( $_POST['post_id'], '_wp_page_template', $_POST['template_filename'] );
	}
	//If this is something other than a page (EDD Download or WooCommerce Product)
	else{
		//Change the post format
		set_post_format( $_POST['post_id'], $_POST['template_filename'] );
		update_post_meta( $_POST['post_id'], 'post_format', $_POST['template_filename'] );
	}
	
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