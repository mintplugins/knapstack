<?php

/**
 * Show Featured Image on Page Header
 */
function mp_knapstack_featured_image_page_header(){	

	if ( !is_archive() ){
		//Check if there is a featured image
		$featured_image = mp_core_the_featured_image( get_the_ID(), 150, 150, '<a class="page_header_feat_image" href="' . get_permalink() . '"><img alt="' . esc_attr( get_the_title() ) . '" width="150px" height="150px" src="', '" /></a>');
		
		//Show featured image - if there is one	
		if ( $featured_image ) { 
			echo '<div class="feat-img">';
				echo $featured_image;
			echo '</div>';
		}
	}
}
add_action('mp_knapstack_header_before_page_title', 'mp_knapstack_featured_image_page_header');
	
/**
 * Show Post meta on single post pages
 */
function mp_knapstack_show_post_meta_header(){
	
	if ( is_singular('post') ){ ?>
               
       <div class="entry-meta sub-text">
                            
            <span class="author vcard">
                <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'mp_core' ), get_the_author() ) ); ?>" rel="author">
                    <?php 
                        echo mp_core_get_avatar( get_the_author_meta('user_email') , 60 );
                        echo get_the_author();  
                    ?>
                 </a>
            </span>
            
            <span class="date">
                <?php mp_core_posted_on(); ?>
            </span>
            <?php 
            
            //Get number of comments on this post
            $comments_count = get_comments_number();
            
            //If there is more than 1 comment, show the comment counter
            if ( $comments_count > 0 && comments_open() ) { ?>
            
                 <span class="comment-numbers">
                    <a href="<?php comments_link(); ?>"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></a>
                 </span>
             
            <?php } ?>
            
            <?php edit_post_link( __( 'Edit', 'mp_knapstack' ), '<span class="edit-link">', '</span>' ); ?>
                    
       </div><!-- .entry-meta -->
    
    <?php } 
}
add_action('mp_knapstack_header_singular_entry_meta', 'mp_knapstack_show_post_meta_header');

/**
 * Show Download Button on single download pages in Header
 */
function mp_knapstack_show_download_meta_header(){
	
	if ( is_singular('download') ){ 
	
		$post_id = get_the_ID(); ?>
               
       <div class="entry-meta sub-text">
                            
           <div class="edd-buy-form">
				<?php echo edd_get_purchase_link( array( 'download_id' => $post_id,
                    'direct'      => edd_get_download_button_behavior( $post_id ) == 'direct' ? true : false,
                    'style'       => 'button',
                    'color'       => '',
                    'class'       => ''
                 ) ); ?>
            </div>
                    
       </div><!-- .entry-meta -->
    
    <?php } 
}
add_action('mp_knapstack_header_singular_entry_meta', 'mp_knapstack_show_download_meta_header');

/**
 *If Isotopes installed show them on download archive pages
 */
function mp_knapstack_show_isotopes(){
		
	if ( is_post_type_archive('download') || is_tax( 'download_category' ) || is_tax( 'download_tag' ) ){ 
	
		?>
		
		<div class="entry-meta sub-text">
		
			<?php 
            
            if ( function_exists( 'mp_isotopes' ) ){ 
            mp_isotopes(); 
            };
            
            ?>
		
		</div><!-- .entry-meta -->
	
	<?php } 
}
add_action('mp_knapstack_header_after_page_title', 'mp_knapstack_show_isotopes');

/**
 * Remove Isotopes default styling
 */
function mp_knapstack_dequeue_isotopes_scripts() {
	wp_dequeue_style( 'mintplugins_isotopes_css', plugins_url( '/css/style.css', dirname(__FILE__)));
}
add_action( 'wp_enqueue_scripts', 'mp_knapstack_dequeue_isotopes_scripts' );