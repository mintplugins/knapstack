<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package mp_knapstack
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
    	<div class="header-inner">
            <div class="site-branding">
                
                <?php function_exists( 'mp_core_logo_image' ) ? mp_core_logo_image( 300, 75 ) : ''; ?>
                
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </div>
    
            <nav id="site-navigation" class="navigation-main" role="navigation">
                <h1 class="menu-toggle"><?php _e( 'Menu', 'mp_knapstack' ); ?></h1>
                <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mp_knapstack' ); ?>"><?php _e( 'Skip to content', 'mp_knapstack' ); ?></a></div>
    
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'mp_core_link_to_menu_editor' ) ); ?>
                
                <?php  echo function_exists( 'mp_links' ) ? mp_links( get_theme_mod('mp_knapstack_header_link_group') ) : NULL; ?>
                
               
                
                
            </nav><!-- #site-navigation -->
        </div><!-- .header-inner -->
        
        <div style="clear: both;"></div>
        
	</header><!-- #masthead -->
	
    <div id="main-container" class="site-main">