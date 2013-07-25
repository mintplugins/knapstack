<?php
/**
 * mp_knapstack functions and definitions
 *
 * @package mp_knapstack
 */

/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/
// Theme version
if( !defined( 'MP_KNAPSTACK_VERSION' ) )
	define( 'MP_KNAPSTACK_VERSION', '1.0.0.0' );

// Theme Folder Path
if( !defined( 'MP_KNAPSTACK_THEME_DIR' ) )
	define( 'MP_KNAPSTACK_THEME_DIR', get_template_directory() );
	
// Theme Root File
if( !defined( 'MP_KNAPSTACK_THEME_FILE' ) )
	define( 'MP_KNAPSTACK_THEME_FILE', __FILE__ );

/*
|--------------------------------------------------------------------------
| INTERNATIONALIZATION
|--------------------------------------------------------------------------
*/

function mp_knapstack_textdomain() {

	// Set filter for plugin's languages directory
	$mp_knapstack_lang_dir = dirname(  MP_KNAPSTACK_THEME_FILE ) . '/languages/';
	$mp_knapstack_lang_dir = apply_filters( 'mp_knapstack_languages_directory', $mp_knapstack_lang_dir );

	// Traditional WordPress plugin locale filter
	$locale        = apply_filters( 'plugin_locale',  get_locale(), 'knapstack' );
	$mofile        = sprintf( '%1$s-%2$s.mo', 'knapstack', $locale );
		
	// Setup paths to current locale file
	$mofile_local  = $mp_knapstack_lang_dir . $mofile;
	$mofile_global = WP_LANG_DIR . '/knapstack/' . $mofile;
		
	if ( file_exists( $mofile_global ) ) {
		// Look in global /wp-content/languages/knapstack folder
		load_textdomain( 'mp_knapstack', $mofile_global );
	} elseif ( file_exists( $mofile_local ) ) {
		
		// Look in local /wp-content/themes/knapstack/languages/ folder
		load_textdomain( 'mp_knapstack', $mofile_local );
	} else {
		// Load the default language files
		load_theme_textdomain( 'mp_knapstack', $mp_knapstack_lang_dir );
	}

}
add_action( 'init', 'mp_knapstack_textdomain', 1 );

/*
|--------------------------------------------------------------------------
| INCLUDES
|--------------------------------------------------------------------------
*/

/**
 * If mp_core isn't active, stop and install it now
 */
if (!function_exists('mp_core_textdomain')){
	
	
	/**
	 * Include Plugin Checker
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/class-plugin-checker.php' );
	/**
	 * Check if wp_core in installed
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/included-plugins/mp-core-check.php' );
	
}
/**
 * Otherwise, if mp_core is active, carry out the plugin's functions
 */
else{
	
	/**
	 * Check Malachi Theme for updates
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/updater/mp-knapstack-update.php' );
	
	/**
	 * Include all the theme specific scripts from the mp_core
	 */
	add_action( 'after_setup_theme', 'mp_core_theme_specific_scripts' );
	
	/**
	 * Check if mp_slide is installed
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/included-plugins/mp-slide.php' );
	
	/**
	 * Check if mp_links is installed
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/included-plugins/mp-links.php' );
	
	/**
	 * Check if mp_stacks is installed
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/included-plugins/mp-stacks.php' );

	/**
	 * Initial Theme Setup
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/theme-setup.php' );
	
	/**
	 * Register Sidebars
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/register-sidebars.php' );
	
	/**
	 * Include customizer arguments
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/customizer.php' );
	
	/**
	 * Include hook functions for the mp_core
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/mp-core-hooks.php' );
	
	/**
	 * Include hook functions for styling the links widget
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/mp-links-hooks.php' );

	/**
	 * Enqueue Scripts
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/enqueue-scripts.php' );
	
	/**
	 * BB Press Hooks
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/bbpress-hooks.php' );
	
	
}
