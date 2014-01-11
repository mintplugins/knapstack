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