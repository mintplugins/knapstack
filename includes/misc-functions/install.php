<?php
/**
 * Installaion hooks for MP Knapstack
 *
 * @link http://mintplugins.com/doc/
 * @since 1.0.0
 *
 * @package     MP Knapstack
 * @subpackage  Functions
 *
 * @copyright   Copyright (c) 2014, Mint Plugins
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author      Philip Johnston
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Install
 *
 * Runs on plugin install by setting up the sample stack page,
 * flushing rewrite rules to initiate the new 'stacks' slug.<br />
 * After successful install, the user is redirected to the MP Stacks Welcome
 * screen.
 *
 * @since 1.0
 * @global $wpdb
 * @global $mp_knapstack_options
 * @global $wp_version
 * @return void
 */
function mp_knapstack_install() {
	global $wp_version;
	
	$active_theme = wp_get_theme();
	
	//Notify
	wp_remote_post( 'http://tracking.mintplugins.com', array(
		'method' => 'POST',
		'timeout' => 1,
		'redirection' => 5,
		'httpversion' => '1.0',
		'blocking' => true,
		'headers' => array(),
		'body' => array( 
			'mp_track_event' => true, 
			'event_product_title' => 'Knapstack', 
			'event_action' => 'activation', 
			'event_url' => get_bloginfo( 'wpurl'),
			'wp_version' => $wp_version,
			'active_plugins' => json_encode( get_option('active_plugins') ),
			'active_theme' => $active_theme->get( 'Name' ),
		),
		'cookies' => array()
		)
	);

}
add_action( 'after_switch_theme', 'mp_knapstack_install' );