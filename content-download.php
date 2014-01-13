<?php
/**
 * @package mp_knapstack
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 	
	<?php 
    //Check if there is a featured image
    $featured_image = mp_core_the_featured_image( get_the_ID(), 524, 426, '<a class="archive_feat_image" href="' . get_permalink() . '"><img src="', '" /></a>');		
    
    //Show featured image - if there is one	
    if ( $featured_image ) { ?>
        
        <div class="entry-image">
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
            <?php echo $featured_image;  ?>
        </div><!-- .entry-content -->
      
    <?php } ?>  
    
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <div class="entry-meta sub-text">
			<?php echo __( 'By: ', 'mp_knapstack' ); ?>
            
            <span class="author vcard">
                <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'mp_core' ), get_the_author() ) ); ?>" rel="author">
                    <?php 
                        echo mp_core_get_avatar( get_the_author_meta('user_email') , 60 );
                        echo get_the_author();  
                    ?>
                 </a>
            </span>
                       
            <?php edit_post_link( __( 'Edit', 'mp_knapstack' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
        </div>
    </header><!-- .entry-header --> 
    
</article><!-- #post-## -->
