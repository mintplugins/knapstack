<?php
/**
 * Enqueue scripts and styles
 */
if ( ! function_exists( 'malachi_scripts' ) ):
	function malachi_scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
			
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	
		if ( is_singular() && wp_attachment_is_image() ) {
			wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
		}	
		
		//Jquery
		wp_enqueue_script( 'jquery' );
		
		//Responsive CSS - load if the user hasn't disabled it
		$responsive_check = get_theme_mod('mp_knapstack_responsive_off');
		if ( empty( $responsive_check ) ){
			wp_enqueue_style( 'mt_responsive', get_template_directory_uri() . '/css/responsive.css' );
		}
		
	}
endif; //malachi_scripts
add_action( 'wp_enqueue_scripts', 'malachi_scripts' );