<?php

/**
 * If there isn't a Stack on a Page which is using the Stack Template (Default for Knapstack), give admins the ability change that page template to be the 1100px template
 * With a single click
 */ 
function mp_knapstack_no_stack_change_template(){	
		
		//If the user logged in is the administrator
	if ( current_user_can( 'manage_options' ) ) {
		
		global $wp_query;
		
		$post_id = isset( $wp_query->queried_object_id ) ? $wp_query->queried_object_id : NULL;
		
		if ( empty( $post_id ) ){
			return;	
		}
		
		$post_object = get_post($post_id);
		$post_content = isset( $post_object->post_content ) ? $post_object->post_content : NULL;
	
		if ( empty( $post_content ) ){
			return;	
		}
		
		//If there is NOT a stack on this page, automatically change the page template to the 600px with sidebar template.
		if ( !has_shortcode( $post_content, 'mp_stack' ) ) { 
			
			$post_type = get_post_type( $post_id );
					
			//If this is a page
			if ( $post_type == 'page' ){
				
				$page_template = get_post_meta( $post_id, '_wp_page_template', true );
								
				//If the page template is using the 100% width one for MP Stacks but there's no Stack on the page, auto change it to the 600px one.
				if ( $page_template == 'default' || empty( $page_template ) ){
										
					//Change the page template	 to the default 600px wide one that comes with Knapstack.
					update_post_meta( $post_id, '_wp_page_template', 'templates/page-title-600px.php' );
				}
			}
			
		}
		
	}
}
add_action( 'wp', 'mp_knapstack_no_stack_change_template' );