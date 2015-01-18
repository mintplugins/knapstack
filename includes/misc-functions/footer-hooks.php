<?php

/**
 * Footer Stack
 */
function mp_knapstack_footer_stack_callback(){
	
	$footer_stack_id = get_theme_mod('mp_stacks_footer_stack'); 
	
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
