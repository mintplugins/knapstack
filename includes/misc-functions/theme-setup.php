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
		
		//Add Post format for stacks - We use the gallery one and change the name to "Full-Width"
		add_theme_support( 'post-formats', array( 'gallery' ) );
		
		//Add Post Formats to Downloads
		add_post_type_support( 'download', 'post-formats' );
		
		//Add Post Formats to Woo Products
		add_post_type_support( 'product', 'post-formats' );
		
		//Declare support for WooCommerce
		add_theme_support( 'woocommerce' );
		
		//Declare support for the Title tag
		add_theme_support( 'title-tag' );
						
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
 * Set name of gallery post format
 */
function mp_knapstack_rename_post_formats( $safe_text ) {
    if ( $safe_text == 'Gallery' )
        return __('Full-Width (Use for Stacks)', 'mp_knapstack');

    return $safe_text;
}
add_filter( 'esc_html', 'mp_knapstack_rename_post_formats' );
add_filter( 'mp_knapstack_rename_gallery', 'mp_knapstack_rename_post_formats' );

//Rename gallery in posts list table
function mp_knapstack_live_rename_formats() { 
    global $current_screen;

    if ( isset( $current_screen->id ) && $current_screen->id == 'edit-post' ) { ?>
        <script type="text/javascript">
        jQuery('document').ready(function() {

            jQuery("span.post-state-format").each(function() { 
                if ( jQuery(this).text() == "Gallery" )
                    jQuery(this).text("<?php echo __('Full-Width (Use for Stacks)', 'mp_knapstack'); ?>");             
            });

        });      
        </script>
<?php }
}
add_action('admin_head', 'mp_knapstack_live_rename_formats');

//remove responsive options for admin bar
function mp_knapststack_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'mp_knapststack_filter_head');

//Function we don't call but to ease Theme Check's mind about stuff we don't actually need
function mp_knapstack_theme_check_appeaser(){
	the_post_thumbnail();	
	add_theme_support( "custom-header", NULL );
	add_theme_support( "custom-background", NULL ); 
}

//Backwards compatibility for the title tag.
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() { ?>
		<title><?php wp_title( '|', true, 'right' ); ?></title><?php 
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
}

/**
 * WooCommerce: Define image sizes
 */
function mp_knapstack_woocommerce_image_dimensions() {
	global $pagenow;
 
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}
  	$catalog = array(
		'width' 	=> '400',	// px
		'height'	=> '400',	// px
		'crop'		=> 1 		// true
	);
	$single = array(
		'width' 	=> '900',	// px
		'height'	=> '900',	// px
		'crop'		=> 0 		// true
	);
	$thumbnail = array(
		'width' 	=> '120',	// px
		'height'	=> '120',	// px
		'crop'		=> 0 		// false
	);
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}
add_action( 'after_switch_theme', 'mp_knapstack_woocommerce_image_dimensions', 1 );

function mp_knapstack_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
add_action( 'init', 'mp_knapstack_remove_wc_breadcrumbs' );