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
<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta name=viewport content="width=device-width, initial-scale=1">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'mp_knapstack_prepend_body' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
    	        
        <?php
      	 	//Header Stack
			$header_stack_id = get_theme_mod('mp_stacks_header_stack'); 
			
			//Check if a header has been saved to the 'mp_stacks_header_stack' theme mod
			if ( !empty( $header_stack_id  ) && $header_stack_id != 'none' ){
				 
				 //Output the masthead with correct classes
				 ?><header id="masthead" class="site-header" role="banner"><?php
				 
				 //Output the Header Stack?>
				 <div id="mp-stacks-header">
        			<?php do_action( 'mp_knapstack_header_stack' ); ?>
       			</div><?php
			}
			//If NO Header Stack has been saved to the mp_stacks_header_stack theme mod
			else{
				
				//Output the Knapstack Theme's Default Header ?>
				<header id="masthead" class="site-header knapstack-theme-header-container" role="banner">
				 
                <div id="knapstack-theme-header" class="header-inner">
                    <div class="header-inner-content">
                        <div class="site-branding">
                            
                            <?php function_exists( 'mp_core_logo_image' ) ? mp_core_logo_image( 300 ) : ''; ?>
                            
                            <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                        </div>
                     
                        <nav id="site-navigation" class="navigation-main" role="navigation">
                        
                            <div class="nav-inner">
                                <h1 class="menu-toggle"><?php _e( 'Menu', 'mp_knapstack' ); ?></h1>
                                <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mp_knapstack' ); ?>"><?php _e( 'Skip to content', 'mp_knapstack' ); ?></a></div>
                    
                                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'mp_core_link_to_menu_editor', 'container_class' => 'menu-main-navigation-container', ) ); ?>
                                
                                <?php  echo function_exists( 'mp_links' ) ? mp_links( get_theme_mod('mp_knapstack_header_link_group') ) : NULL; ?>
                            </div><!-- .nav-inner -->
                            
                        </nav><!-- #site-navigation -->
                        
                        <?php do_action( 'mp_knapstack_header_additional_cell' ); ?>
                        
                    </div><!-- .header-inner-content -->     
                </div><!-- .header-inner -->
                
                <?php } ?>
        
        <div style="clear: both;"></div>
        
	</header><!-- #masthead -->
	
    <div id="main-container" class="site-main">