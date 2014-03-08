<?php

/**
 * Footer Stack
 */
function mp_knapstack_footer_stack_callback(){
	
	$footer_stack_id = get_theme_mod('mp_knapstack_footer_stack'); 
	
	if ( !empty( $footer_stack_id  ) && $footer_stack_id != 'none' ){
		echo mp_stack( get_theme_mod('mp_knapstack_footer_stack') );
	}
}
add_action('mp_knapstack_footer_stack', 'mp_knapstack_footer_stack_callback');
