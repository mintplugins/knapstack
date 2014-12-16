<?php
/**
 * Custom Metabox for Pages which allows users to change the page width
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package    Knapstack
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2013, Mint Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */

/**
 * Function which creates new Meta Box
 *
 */
function mp_knapstack_page_template_create_meta_box(){	
	/**
	 * Array which stores all info about the new metabox
	 *
	 */
	$mp_knapstack_page_template_add_meta_box = array(
		'metabox_id' => 'mp_knapstack_page_template_metabox', 
		'metabox_title' => __( 'Custom-Width', 'mp_knapstack'), 
		'metabox_posttype' => 'page', 
		'metabox_context' => 'side', 
		'metabox_priority' => 'core' 
	);
	
	/**
	 * Array which stores all info about the options within the metabox
	 *
	 */
	$mp_knapstack_page_template_items_array = array(
		array(
			'field_id'			=> 'knapstack_custom_page_width',
			'field_title' 	=> __( 'Max Width (in Pixels): <br />', 'mp_knapstack'),
			'field_description' 	=> 'Leave this blank if you want the page to be 100% screen-wide.',
			'field_type' 	=> 'number',
			'field_value' => '',
		),
	);
	
	
	/**
	 * Custom filter to allow for add-on plugins to hook in their own data for add_meta_box array
	 */
	$mp_knapstack_page_template_add_meta_box = has_filter('mp_knapstack_page_template_meta_box_array') ? apply_filters( 'mp_knapstack_page_template_meta_box_array', $mp_knapstack_page_template_add_meta_box) : $mp_knapstack_page_template_add_meta_box;
	
	/**
	 * Custom filter to allow for add on plugins to hook in their own extra fields 
	 */
	$mp_knapstack_page_template_items_array = has_filter('mp_knapstack_page_template_items_array') ? apply_filters( 'mp_knapstack_page_template_items_array', $mp_knapstack_page_template_items_array) : $mp_knapstack_page_template_items_array;
	
	
	/**
	 * Create Metabox class
	 */
	global $mp_knapstack_page_template_meta_box;
	$mp_knapstack_page_template_meta_box = new MP_CORE_Metabox($mp_knapstack_page_template_add_meta_box, $mp_knapstack_page_template_items_array);
	
}
add_action('init', 'mp_knapstack_page_template_create_meta_box', 2);

/**
 * Function which Changes the name of the default template to "100% Width Template"
 * https://core.trac.wordpress.org/ticket/27178
 */
function mp_knapstack_change_default_page_template_title( $default_title ) {
	
	return __( 'MP Stack - 100% Width', 'mp_knapstack' );
	
}
add_filter( 'default_page_template_title', 'mp_knapstack_change_default_page_template_title', 10, 3 );

/**
 * Function which sets the width for the Custom Width Page Template
 *
 */
function mp_knapstack_do_custom_page_width_style() {
	
	global $wp_query;
	
	if ( isset( $wp_query->query_vars['p'] ) ){
		
		$custom_page_width = get_post_meta( intval( $wp_query->query_vars['p'] ), 'knapstack_custom_page_width', true);
			
		if ( !empty( $custom_page_width ) ){
						
			echo '<style type="text/css">.page.page-template-default .entry-content{ max-width:' . $custom_page_width . 'px; margin: 0px auto; }</style>';
		}
	}

}
add_filter( 'wp_enqueue_scripts', 'mp_knapstack_do_custom_page_width_style' );