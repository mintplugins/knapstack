<?php
/**
 * Page contains functions used to change the TinyMCE area in WordPress
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
 * Add and return style.css for this theme to the TinyMCE styles
 *
 * @since    1.0.0
 * @link     http://codex.wordpress.org/Function_Reference/add_editor_style
 * @see      get_bloginfo()
 * @param    array $args See link for description.
 * @return   void
 */
function addTinyMCELinkClasses( $wp ) {	
	add_editor_style( get_bloginfo('stylesheet_directory') . '/style.css' );
	add_editor_style( 'http://localhost:8888/wordpress1/wp-content/plugins/mp-core/includes/theme-specific/css/the-content.css' );
	add_editor_style( 'http://localhost:8888/wordpress1/wp-content/plugins/mp-core/includes/css/core/tinymce-css.php' );
	add_editor_style( get_bloginfo('stylesheet_directory') . '/editor-style.css' );
}
add_filter( 'init', 'addTinyMCELinkClasses' );

function my_custom_tinymce( $init ) {
	$init['theme_advanced_buttons2_add_before'] = 'styleselect';
	//$init['theme_advanced_styles'] = 'Button=button,Margin 20px=margin20';
	$init['theme_advanced_styles'] = 'Button=button';
	return $init;
}
add_filter( 'tiny_mce_before_init', 'my_custom_tinymce' );