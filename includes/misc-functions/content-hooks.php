<?php

/**
 * If there isn't a Stack on a Page which is using the Stack Template (Default for Knapstack), give admins the ability change that page template to be the 1100px template
 * With a single click
 */
function mp_knapstack_no_stack_change_template_option( $post_id, $post_content ){	
	
	//If the user logged in is the administrator
	if ( current_user_can( 'manage_options' ) ) {
		
		//If there isn't a stack on this page, the user might be confused as to why it's 100% wide.
		if ( !has_shortcode( $post_content, 'mp_stack' ) ) { 
			
			$show_page_template_notice = mp_core_get_post_meta( $post_id, 'knapstack_page_template_notice', 'show' );
							
			//If the user hasn't dismissed this notice (through ajax)
			if ( $show_page_template_notice != 'dismissed' ){
				
				echo '<div class="knapstack-notice">';
					echo __( '<strong>Admin Notice:</strong> You don\'t have a Stack on this page. Would you like to change the page template?', 'mp_knapstack' );
					echo '<div id="mp_knapstack_pagetemplate_chooser_container">';
						echo '<select id="mp_knapstack_pagetemplate_chooser">';						
						echo '</select>';
						echo '<div id="mp_knapstack_pagetemplate_choose_button" post-type="' . get_post_type( $post_id ) . '" post-id="' . $post_id . '" nonce="' . wp_create_nonce( 'mp-knapstack-change-template-' . $post_id ) . '" class="button">' . __( 'Use Page-Template', 'mp_knapstack' ) . '</div>';
					echo '</div> ';
					echo '<div class="button knapstack-notice-hide">';
						echo __( 'Hide Notice', 'mp_knapstack' );
					echo '</div> ';
					echo '<div class="button knapstack-notice-dismiss" post-id="' . $post_id . '" knapstack-notice-name="knapstack_page_template_notice">';
						echo __( 'Dismiss Notice', 'mp_knapstack' );
					echo '</div>';
				echo '</div>';
			}
			
		}
		
	}
}
add_action('mp_knapstack_below_stack_content', 'mp_knapstack_no_stack_change_template_option', 10, 2);