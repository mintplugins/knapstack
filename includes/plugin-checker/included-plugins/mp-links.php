<?php
/**
 * Install Links Plugin
 *
 */
 if (!function_exists('mp_links_plugin_check')){
	function mp_links_plugin_check() {
		$args = array(
			'plugin_name' => __('MP Links', 'mt_malachi'), 
			'plugin_message' => __('To add social links, you\'ll need the links plugin. Install it here.', 'mp_knapstack'), 
			'plugin_slug' => 'mp-links', 
			'plugin_filename' => 'mp-links.php',
			'plugin_required' => false,
			'plugin_download_link' => 'http://repo.moveplugins.com/repo/mp-links/?downloadfile=true'
		);
		$mp_links_plugin_check = new MP_CORE_Plugin_Checker($args);
	}
 }
add_action( '_admin_menu', 'mp_links_plugin_check' );

