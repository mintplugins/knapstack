<?php
/**
 * The template part for displaying the header of a page - not the main header.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mp_knapstack
 */
?>


<div class="page-header">

	<div class="page-header-inner">
		
        <?php
		if ( !is_archive() ){
			//Check if there is a featured image
			$featured_image = mp_core_the_featured_image( get_the_ID(), 75, 75, '<a class="page_header_feat_image" href="' . get_permalink() . '"><img width="150px" height="150px" src="', '" /></a>');
			
			//Show featured image - if there is one	
			if ( $featured_image ) { 
				echo '<div class="feat-img">';
					echo $featured_image;
				echo '</div>';
			}
		}
		?>
    	
        <div class="page-info">
        
            <h1 class="page-title">
                <?php function_exists ( 'mp_core_page_title' ) ? mp_core_page_title() : _e( 'Archives', 'mp_knapstack' ); ?>
            </h1>
            <?php
                if ( is_category() ) :
                    // show an optional category description
                    $category_description = category_description();
                    if ( ! empty( $category_description ) ) :
                        echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
                    endif;
        
                elseif ( is_tag() ) :
                    // show an optional tag description
                    $tag_description = tag_description();
                    if ( ! empty( $tag_description ) ) :
                        echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
                    endif;
        
                endif;
            
            //If this is a single page/post, show the date and info
            if ( is_singular('post') ){?>
               
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
    
            <?php } ?>
            
            
        </div><!-- .page-info -->
        
	</div><!-- .page-header-inner -->
</div><!-- .page-header -->