<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1100;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'mp_knapstack_setup' ) ):
	function mp_knapstack_setup() {
		
		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
	
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
						
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'mp_knapstack' ),
		) );
	
		
	}
endif;

/** Tell WordPress to run mp_knapstack_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'mp_knapstack_setup' );

/**
 * Set content width of site
 */
function mp_knapstack_viewport(){
	
	$responsive_check = get_theme_mod('mp_knapstack_responsive_off');
	
	//If we are using responsive
	if ( empty( $responsive_check ) ){
		echo '<meta name="viewport" content="width=device-width" />';
	}
	//If we are NOT using responseive
	else{
		echo '<meta name="viewport" content="width=1100">';
	}
}
add_action( 'wp_head', 'mp_knapstack_viewport' );

/**
 * Show Credits in Footer
 */
function mp_knapstack_show_credits(){
	?>
    <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'mp_knapstack' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', 'mp_knapstack' ), 'WordPress' ); ?></a>
    <?php echo __( 'and', 'mp_knapstack' ); ?>
    <a href="http://moveplugins.com/" title="<?php esc_attr_e( 'WordPress Plugins and Themes', 'mp_knapstack' ); ?>" rel="generator"><?php printf( __( '%s', 'mp_knapstack' ), 'Move Plugins' ); 	?></a>
	<?php
}
add_action('mp_knapstack_credits', 'mp_knapstack_show_credits');

/**
 * Show Copyright in Footer
 */
function mp_knapstack_show_copyright(){
	?>
  	<p><?php echo __('Copyright', 'mp_knapstack'); ?> &copy; <?php echo date('Y') . ' ' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '. ' . __('All rights reserved.', 'mp_knapstack'); ?></p> 	
	<?php
}
add_action('mp_knapstack_copyright', 'mp_knapstack_show_copyright');



  
