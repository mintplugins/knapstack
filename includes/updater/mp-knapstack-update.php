<?php
/**
 * This file contains the function keeps the MP Knapstack theme up to date.
 *
 * @since 1.0.0
 *
 * @package    MP KnapStack
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2013, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */
 
/**
 * Check for updates for the MP KnapStack Theme by creating a new instance of the MP_CORE_Theme_Updater class.
 *
 * @access   public
 * @since    1.0.0
 * @return   void
 */
 if (!function_exists('mp_knapstack_update')){
	function mp_knapstack_update() {
		$args = array(
			'software_name' => 'Knapstack Theme', //<- The name of this theme in the style.css file, mp_repo, and edd. The slug must also match when URL converted (malachi-theme)
			'software_api_url' => 'http://moveplugins.com/',//The URL where EDD and mp_repo are installed and checked
			'software_licensed' => true, //<-Boolean
		);
		
		//Since this is a plugin, call the Plugin Updater class
		$mp_knapstack_plugin_updater = new MP_CORE_Theme_Updater($args);
	}
 }
add_action( 'init', 'mp_knapstack_update' );
