<?php
/**
 * Install Sermon Manager Plugin
 *
 */
 if (!function_exists('mp_slide_plugin_check')){
	function mp_slide_plugin_check() {
		$args = array(
			'plugin_name' => __('MP Slide', 'mt_malachi'), 
			'plugin_message' => __('To create sliders, you require the Slider plugin. Install it here.', 'mt_malachi'), 
			'plugin_slug' => 'mp-slide', 
			'plugin_filename' => 'mp-slide.php',
			'plugin_required' => false,
			'plugin_download_link' => 'http://repo.moveplugins.com/repo/mp-slide/?downloadfile=true'
		);
		$mp_slide_plugin_check = new MP_CORE_Plugin_Checker($args);
	}
 }
add_action( 'init', 'mp_slide_plugin_check' );

