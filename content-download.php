<?php
/**
 * @package mp_knapstack
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-download-article' ); ?>>
 	
    <?php mp_core_invisible_microformats(); ?>
    
	<?php 
    //Check if there is a featured image
    $featured_image = mp_core_the_featured_image( get_the_ID(), 524, 426, '<a class="archive_feat_image" href="' . get_permalink() . '"><img src="', '" /></a>');		
    
    //Show featured image - if there is one	
    if ( $featured_image ) { ?>
        
        <div class="entry-image">  
        
        	<?php
			
			//Filter which allows the user to turn off the overlay popup
			$show_overlay = apply_filters( 'mp_knapstack_show_download_archive_overlay', false );
			
			if ($show_overlay){
				
			?>
                      
        	<div class="archive-item-overlay">
                <div class="archive-item-overlay-inner">
                    <div class="actions">
                    	<div class="actions-inner">
							<div class="edd-buy-form">
								<?php echo edd_get_purchase_link( array( 'download_id' => get_the_ID(),
                                	'price'       => false,
                                    'direct'      => edd_get_download_button_behavior( $post->ID ) == 'direct' ? true : false,
                                    'text'        => __( 'Buy Now', 'mp_knapstack' ),
                                    'style'       => 'button',
                                    'color'       => '',
                                    'class'       => ''
                                 ) ); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" class="button"><?php echo __('Details' , 'mp_knapstack'); ?></a>
                            <div class="item-price"><span>Price: <span class="edd_price" id="edd_price_1752"><?php edd_price(get_the_ID()); ?></span></span></div>
						</div>
                    </div>
        		</div>
            </div>
            <?php 
			
			} 
			
			echo $featured_image;  
			
			?>
        </div><!-- .entry-content -->
      
    <?php } ?>  
    
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a> <?php edit_post_link( __( 'Edit', 'mp_knapstack' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?></h1>
        
            
       		<?php if ( has_action( 'mp_knapstack_archive_download_subtext'  ) ){
				
				echo '<div class="entry-meta sub-text">';
				
					do_action( 'mp_knapstack_archive_download_subtext' );
				
				echo '</div>'; 
				 
			} 
						
			?>
        
    </header><!-- .entry-header --> 
    
</article><!-- #post-## -->
