<?php
/**
 * Install mp_stacks Plugin
 *
 */
 if (!function_exists('mp_stacks_plugin_check')){
	function mp_stacks_plugin_check() {
		$args = array(
			'plugin_name' => 'MP Stacks', 
			'plugin_message' => __('You require the Move Plugins Stacks plugin. Install it here.', 'mp_knapstack'), 
			'plugin_slug' => 'mp-stacks', 
			'plugin_filename' => 'mp-stacks.php',
			'plugin_required' => true,
			'plugin_download_link' => 'http://repo.moveplugins.com/repo/mp-stacks/?downloadfile=true'
		);
		$mp_core_plugin_check = new MP_CORE_Plugin_Checker($args);
	}
 }
add_action( '_admin_menu', 'mp_stacks_plugin_check' );

