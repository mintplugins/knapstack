<?php
/**
 * Enqueue scripts and styles
 */
if ( ! function_exists( 'knapstack_scripts' ) ):
	function knapstack_scripts() {
		
		//Enqueue Font Awesome CSS
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/font-awesome-4.0.3/css/font-awesome.css' );
		
		//Enqueue Default Stylesheet
		wp_enqueue_style( 'style', get_stylesheet_uri(), array('fontawesome') );
			
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	
		if ( is_singular() && wp_attachment_is_image() ) {
			wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
		}	
		
		//Jquery
		wp_enqueue_script( 'jquery' );
		
		$header_bump = get_theme_mod('mp_knapstack_header_bump_site_down');
		if ( !empty( $header_bump ) ){
			//Front End JS for the Knapstack Theme
			wp_enqueue_script( 'knapstack-header-bump', get_template_directory_uri() . '/js/header-bump.js', array( 'jquery' ) );
		}
		
		//Responsive CSS - load if the user hasn't disabled it
		$responsive_check = get_theme_mod('mp_knapstack_responsive_off');
		if ( empty( $responsive_check ) ){
			wp_enqueue_style( 'mt_responsive', get_template_directory_uri() . '/css/responsive.css' );
		}
		
	}
endif; //knapstack_scripts
add_action( 'wp_enqueue_scripts', 'knapstack_scripts' );

function mp_knapstack_admin_enqueue_scripts(){
		
		//Admin End JS for the Knapstack Theme
		wp_enqueue_script( 'knapstack-admin-js', get_template_directory_uri() . '/js/admin.js', array( 'jquery' ) );
		
}
add_action( 'admin_enqueue_scripts', 'mp_knapstack_admin_enqueue_scripts' );