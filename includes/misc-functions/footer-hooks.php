<?php

/**
 * Output the Footer Stack HTML in the footer area.
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    void
 * @return   void
 */
function mp_knapstack_footer_stack_callback(){
	
	$footer_stack_id = get_theme_mod('mp_stacks_footer_stack'); 
	
	//If the footer is set to be none
	if ( $footer_stack_id == 'none' ){
		return NULL;	
	}
	
	//Check if a footer has been saved to the 'mp_stacks_footer_stack' theme mod
	if ( !empty( $footer_stack_id  ) && $footer_stack_id != 'none' ){
		echo mp_stack( $footer_stack_id );
	}
	//If no footer was saved there, check if one was saved to mp_knapstack_footer_stack (for backwards compaitibility before this option was changed to 'mp_stacks_footer_stack')
	else{
		$footer_stack_id = get_theme_mod('mp_knapstack_footer_stack'); 	
		
		if ( !empty( $footer_stack_id  ) && $footer_stack_id != 'none' ){
			echo mp_stack( $footer_stack_id );
		}
	}
}
add_action('mp_knapstack_footer_stack', 'mp_knapstack_footer_stack_callback');

/**
 * Output the Footer Stack CSS in the head.
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    void
 * @return   void
 */
function mp_knapstack_footer_stack_css(){
	
	//Footer Stack
	$footer_stack_id = get_theme_mod('mp_stacks_footer_stack'); 
	
	//Check if a footer has been saved to the 'mp_stacks_footer_stack' theme mod
	if ( !empty( $footer_stack_id  ) && $footer_stack_id != 'none' ){
		
		//The footer stack CSS
		mp_stack_css( $footer_stack_id, true ); 
		
		//Reset the post data for the footer
		wp_reset_postdata();
	}
	//If no footer was saved there, check if one was saved to mp_knapstack_footer_stack (for backwards compaitibility before this option was changed to 'mp_stacks_footer_stack')
	else{
		$footer_stack_id = get_theme_mod('mp_knapstack_footer_stack'); 	
		if ( !empty( $footer_stack_id  ) && $footer_stack_id != 'none' ){
			
			//The footer stack CSS
			mp_stack_css( $footer_stack_id, true ); 
			
			//Reset the post data for the footer
			wp_reset_postdata();
		
		}
	}
}
add_action( 'wp_enqueue_scripts', 'mp_knapstack_footer_stack_css' );
