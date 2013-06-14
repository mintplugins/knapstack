<?php
/**
 * Check for updates for this Theme
 *
 */
 if (!function_exists('mp_knapstack_software_check')){
	function mp_knapstack_software_check() {
		$args = array(
			'software_name' => 'Knapstack Theme', //<- The name of this theme in the style.css file, mp_repo, and edd. The slug must also match when URL converted (malachi-theme)
			'software_api_url' => 'http://repo.moveplugins.com/',//The URL where EDD and mp_repo are installed and checked
			'software_licensed' => true, //<-Boolean
		);
		
		//Since this is a theme, call the Theme Updater class
		$mp_knapstack_theme_updater = new MP_CORE_Theme_Updater($args);
	}
 }
add_action( 'init', 'mp_knapstack_software_check' );
