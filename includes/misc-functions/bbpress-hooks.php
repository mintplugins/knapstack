<?php
/**
 * Remove "Archive" from forum page
 */
function mp_knapstack_remove_archive_class_from_bbpress_forum_page( $wp_classes ) {
	if ( function_exists( 'is_bbpress' ) ){
		if( is_bbpress() ) :
			  foreach($wp_classes as $key => $value) {
				 if ($value == 'archive') unset($wp_classes[$key]);
			  }
		endif;
	}
	return $wp_classes;
}
add_filter('body_class', 'mp_knapstack_remove_archive_class_from_bbpress_forum_page', 20, 2);

/**
 * Disable default css and enqueue custom
 */
function mp_knapstack_deregister_bbpress_styles() {
	
	wp_deregister_style( 'bbp-default' );
	
	wp_enqueue_style( 'knapstack_bbpress_css', get_template_directory_uri() . '/css/bbpress.css' );
	
}
add_action( 'wp_enqueue_scripts', 'mp_knapstack_deregister_bbpress_styles', 15 );

/**
 * Functions used to remove default bbpress stuff we dont really need
 */
function mp_knapstack_bbpress_return_blank() {

	return '';

}
//Remove forum description
add_filter( 'bbp_get_single_forum_description', 'mp_knapstack_bbpress_return_blank' );
//Remove topic description
add_filter( 'bbp_get_single_topic_description', 'mp_knapstack_bbpress_return_blank' );

/**
 * Disable breadcrumbs inside page but not in header
 */
function mp_knapstack_bbp_no_breadcrumb($param) {
	
	global $mp_knapstack_bbp_creadcrumb_used;
	
	if ( $mp_knapstack_bbp_creadcrumb_used == true ){
		
		//Dont' show breadcrumbs again
		return false;
	
	}
	else{ 
		
		//Do show breadcrumbs 
		return true; 
	}

}
add_filter ('bbp_no_breadcrumb', 'mp_knapstack_bbp_no_breadcrumb');

/**
 * Show breadcrumbs inside page header
 */
function mp_knapstack_header_bbp_breadcrumbs() {
	
	if (function_exists('bbp_breadcrumb')){
		if (is_bbpress()){
			global $mp_knapstack_bbp_creadcrumb_used;
			$mp_knapstack_bbp_creadcrumb_used = true;
			bbp_breadcrumb();
		}
	}
}
add_action('mp_knapstack_header_singular_entry_meta', 'mp_knapstack_header_bbp_breadcrumbs');