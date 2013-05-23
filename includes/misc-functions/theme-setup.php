<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'malachi_setup' ) ):
	function malachi_setup() {
	
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();
	
		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
	
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		//Add Theme Support for the mp_people plugin
		add_theme_support( 'mp_people' );
		
		//Add Theme Support for the mp_people plugin
		add_theme_support( 'mp_sermons' );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'mp_knapstack' ),
		) );
	
		
	}
endif;

/** Tell WordPress to run malachi_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'malachi_setup' );
