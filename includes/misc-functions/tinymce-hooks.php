<?php
/**
 * Page contains functions used to change the TinyMCE area in WordPress
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
 * Add and return style.css for this theme to the TinyMCE styles
 *
 * @since    1.0.0
 * @link     http://codex.wordpress.org/Function_Reference/add_editor_style
 * @see      get_bloginfo()
 * @param    array $args See link for description.
 * @return   void
 */
function mp_knapstack_addTinyMCELinkClasses( $wp ) {	
	add_editor_style( get_stylesheet_directory_uri() . '/style.css' ); //This refers to the child theme if there is one
	add_editor_style( get_template_directory_uri() . '/editor-style.css' ); //This refers to the parent if there is a child theme
}
//add_action( 'mp_core_editor_styles', 'mp_knapstack_addTinyMCELinkClasses' );