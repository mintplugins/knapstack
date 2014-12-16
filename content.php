<?php
/**
 * @package mp_knapstack
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 	
    <?php mp_core_invisible_microformats(); ?>
    
	<?php 
    //Check if there is a featured image
    $featured_image = mp_core_the_featured_image( get_the_ID(), 400, 300, '<div class="img"><a href="' . get_permalink() . 
    '"><img src="', '" width="400px" height="300px" /></a></div>');
    ?>
		
	<?php
    //Check if there is a featured image
    $featured_image = mp_core_the_featured_image( get_the_ID(), 300, 300, '<a class="archive_feat_image" href="' . get_permalink() . '"><img src="', '" /></a>');
    
    //Show featured image - if there is one	
    if ( $featured_image ) { 
        echo '<div class="col1 feat-img">';
            echo $featured_image;
			?>
            <div style="clear: both;"></div>
        <?php echo '</div>';
    }
    ?>
    
    <div class="col2">
  
        <header class="entry-header">
            <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    
            <?php if ( 'post' == get_post_type() ) { ?>
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
                    
        </header><!-- .entry-header -->
   
        <div class="entry-summary">
            <?php the_content(); ?>
        </div><!-- .entry-summary -->
        
	</div><!-- .col2 -->
</article><!-- #post-## -->

 <div style="clear: both;"></div>
