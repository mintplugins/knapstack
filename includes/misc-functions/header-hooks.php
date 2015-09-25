<?php

 /**
 * Output the Header Stack HTML in the header area.
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    void
 * @return   void
 */
function mp_knapstack_header_stack_callback(){
	
	$header_stack_id = get_theme_mod('mp_stacks_header_stack'); 
	
	//Check if a footer has been saved to the 'mp_stacks_header_stack' theme mod
	if ( !empty( $header_stack_id  ) && $header_stack_id != 'none' ){
		echo mp_stack( $header_stack_id );
	}
	
}
add_action('mp_knapstack_header_stack', 'mp_knapstack_header_stack_callback');

/**
 * Output the Header Stack CSS in the document head.
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/
 * @see      function_name()
 * @param    void
 * @return   void
 */
function mp_knapstack_header_stack_css(){
	//Header Stack
	$header_stack_id = get_theme_mod('mp_stacks_header_stack'); 
	
	//Check if a header has been saved to the 'mp_stacks_header_stack' theme mod
	if ( !empty( $header_stack_id  ) && $header_stack_id != 'none' ){
		
		//The footer stack CSS
		mp_stack_css( $header_stack_id, true ); 
		
		//Reset the post data for the header
		wp_reset_postdata();
	}
}
add_action( 'wp_enqueue_scripts', 'mp_knapstack_header_stack_css' );
