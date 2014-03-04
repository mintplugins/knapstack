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
	define( 'MP_KNAPSTACK_VERSION', '1.0.5.1' );

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
 * If any of our required plugins aren't active, stop and install ithem now
 */
if ( !function_exists('mp_core_textdomain') || !function_exists('mp_links_textdomain') || !function_exists('mp_stacks_textdomain') ){
	
	//Show notice on front end that items need to be installed
	if ( !is_admin() ){
		add_action( 'mp_knapstack_prepend_body', function() { echo '<div style="font-size:30px; margin:10px; padding:100px 10px; background-color:#ff7878; color: #fff; text-align:center">' . __('There are items that need to be installed.', 'mp_knapstack') . '<br /><a style="font-size:20px; color:#fff;" href="' . admin_url() . '">' . __( 'Go to the top of your WordPress dashboard to review them - Click Here', 'mp_knapstack' ) . '</a></div>'; } );	
	}
	
	//Tell the installer to redirect to the themes pages after install
	update_option('mp_core_theme_redirect_after_install', true);
	
	/**
	 * Include Plugin Checker
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/class-plugin-checker.php' );
	
	/**
	 * Include Plugin Installer
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/class-plugin-installer.php' );
	
	/**
	 * Check if mp_core is installed
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/included-plugins/mp-core-check.php' );
	
	/**
	 * Check if mp_links is installed
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/included-plugins/mp-links.php' );
	
	/**
	 * Check if mp_stacks is installed
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/included-plugins/mp-stacks.php' );
	
	/**
	 * Check if mp_menu is installed
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/plugin-checker/included-plugins/mp-menu.php' );
	
}
/**
 * Otherwise, if required plugins are active, carry out the plugin's functions
 */
else{
	
	//Optional plugins call be included for checking here.
	
	/**
	 * Check Knapstack Theme for updates
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/updater/mp-knapstack-update.php' );
	
	/**
	 * Include all the theme specific scripts from the mp_core
	 */
	add_action( 'after_setup_theme', 'mp_core_theme_specific_scripts' );

	/**
	 * Initial Theme Setup
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/theme-setup.php' );
	
	/**
	 * Header Hooks
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/page-header-hooks.php' );
	
	/**
	 * Archive Hooks
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/archive-hooks.php' );
	
	/**
	 * Single Hooks
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/single-hooks.php' );
	
	/**
	 * Footer Hooks
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/footer-hooks.php' );
	
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
	
	/**
	 * EDD Hooks
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/edd-hooks.php' );
	
	/**
	 * TinyMCE Hooks
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/tinymce-hooks.php' );
	
	/**
	 * EDD Front End Submissions Hooks
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/edd-fes-hooks.php' );
	
	/**
	 * Stack Page template metabox
	 */
	require( MP_KNAPSTACK_THEME_DIR . '/includes/misc-functions/custom-width-page-template-metabox.php' );
	
	
}