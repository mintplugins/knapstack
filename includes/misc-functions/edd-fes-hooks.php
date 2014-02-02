<?php
/**
 * Page contains functions used to change the Front End Submissions Plugin for Easy Digital Downloads
 *
 * @link http://moveplugins.com/doc/
 * @since 1.0.0
 *
 * @package    Knapstack
 * @subpackage Functions
 *
 * @copyright  Copyright (c) 2013, Move Plugins
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @author     Philip Johnston
 */

/**
 * Dequeue the default css for fes
 *
 * @since    1.0.0
 * @link     http://codex.wordpress.org/Function_Reference/add_editor_style
 * @see      get_bloginfo()
 * @param    array $args See link for description.
 * @return   void
 */
function mp_knapstack_dequeue_fes(){
 
	wp_dequeue_style( 'fes-css');

}
add_action('wp_enqueue_scripts', 'mp_knapstack_dequeue_fes');