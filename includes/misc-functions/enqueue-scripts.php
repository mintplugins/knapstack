<?php
/**
 * Enqueue scripts and styles
 */
if ( ! function_exists( 'knapstack_scripts' ) ):
	function knapstack_scripts() {
		
		global $post;
		
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
			//Bump site below header
			wp_enqueue_script( 'knapstack-header-bump', get_template_directory_uri() . '/js/header-bump.js', array( 'jquery' ) );
		}else{
			//Bump sub header content below main header overlap
			wp_enqueue_script( 'knapstack-sub-header-bump', get_template_directory_uri() . '/js/sub-header-bump.js', array( 'jquery' ) );	
		}
		
		//If we are on mobile, force the header to scroll - it's too invasive on a small screen
		if ( mp_core_is_android() || mp_core_is_iphone() ){
			?>
            <style type="text/css">
				
				#page .site-header{
					position:absolute!important;	
				}
				
			</style>
            <?php	
		}
				
		//Responsive CSS - load if the user hasn't disabled it
		$responsive_check = get_theme_mod('mp_knapstack_responsive_off');
		if ( empty( $responsive_check ) ){
			wp_enqueue_style( 'mt_responsive', get_template_directory_uri() . '/css/responsive.css' );
		}
		
		$footer_stack_id = get_theme_mod('mp_knapstack_footer_stack'); 
	
		if ( !empty( $footer_stack_id  ) && $footer_stack_id != 'none' ){
			
			//The footer stack CSS
			mp_stack_css( get_theme_mod('mp_knapstack_footer_stack'), true ); 
			
			//Reset the post data for the footer
			wp_reset_postdata();
		
		}
		
		//Open Graph Meta Tags 
		$featured_image = mp_core_the_featured_image( $post->ID );?>
        
        <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
        <meta property="og:url" content="<?php echo get_permalink( $post->ID ); ?>" />
		<meta property="og:description" content="<?php echo strip_tags( mp_core_get_excerpt_by_id( $post->ID ) ); ?>" />
		<?php  if ( !empty( $featured_image ) ){ ?>	
            <meta property="og:image" content="<?php echo $featured_image; ?>"/>
			<meta property="og:image:secure_url" content="<?php echo str_replace( 'http://', 'https://', $featured_image ); ?>" />
		<?php }
		
	}
endif; //knapstack_scripts
add_action( 'wp_enqueue_scripts', 'knapstack_scripts' );

function mp_knapstack_admin_enqueue_scripts(){
		
		//Admin End JS for the Knapstack Theme
		wp_enqueue_script( 'knapstack-admin-js', get_template_directory_uri() . '/js/admin.js', array( 'jquery' ) );
		
}
add_action( 'admin_enqueue_scripts', 'mp_knapstack_admin_enqueue_scripts' );