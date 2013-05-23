<?php
/**
 * Install MP Stacks Plugin
 *
 */
 if (!function_exists('mp_stacks_plugin_check')){
	function mp_stacks_plugin_check() {
		$args = array(
			'plugin_name' => __('MP Stacks', 'mp_knapstack'), 
			'plugin_message' => __('To create stacks, you need the MP Stacks plugin. Install it here.', 'mp_knapstack'), 
			'plugin_slug' => 'mp-slide', 
			'plugin_filename' => 'mp-stacks.php',
			'plugin_required' => false,
			'plugin_download_link' => 'http://repo.moveplugins.com/repo/mp-stacks/?downloadfile=true'
		);
		$mp_stacks_plugin_check = new MP_CORE_Plugin_Checker($args);
	}
 }
add_action( 'init', 'mp_stacks_plugin_check' );

