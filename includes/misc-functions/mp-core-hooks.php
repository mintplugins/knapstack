<?php

/**
 * Set size for comment avatar
 */
function mp_knapstack_avatar_size(){
	return 60;
}
add_filter( 'mp_core_comment_avatar_size', 'mp_knapstack_avatar_size'); 

/**
 * Remove labels from Name Email and Website for comment form
 */
function mp_knapstack_comment_form_args($args, $commenter, $req, $aria_req){
	
	//Remove Name Label from Comment Form
	$args['fields']['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . __('Name', 'mp_knapstack') . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
	
	//Remove Email Label from Comment Form
	$args['fields']['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . __('Email', 'mp_knapstack') . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
	
	//Remove Website Label from Comment Form
	$args['fields']['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . __('Website', 'mp_knapstack') . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>' ;
	
	//Remove notes after comment
	$args['comment_notes_after'] = NULL;
	
	//Remove Comment label before the comment textarea
	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . __('Comment', 'mp_knapstack') . '" aria-required="true"></textarea></p>';
	
	return $args;
}
add_filter( 'mp_core_comment_form_args', 'mp_knapstack_comment_form_args', 10, 4); 

//Include Move Plugins font with Move Plugins Logo
function mp_knapstack_moveplugins_font_enqueue(){
	
	//Enqueue Font Awesome CSS
	wp_enqueue_style( 'mp_core_moveplugins_font', MP_CORE_PLUGIN_URL . 'includes/fonts/movepluginsfont.css' );
	
}
add_action( 'wp_enqueue_scripts', 'mp_knapstack_moveplugins_font_enqueue' );
