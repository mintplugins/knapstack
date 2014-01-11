<?php
/**
 * @package mp_knapstack
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 	<div class="archive-stack-outer">
        <div class="archive-stack-inner">
        	<?php 
			//Check if there is a featured image
			$featured_image = mp_core_the_featured_image( get_the_ID(), 400, 300, '<div class="img"><a href="' . get_permalink() . 
            '"><img src="', '" width="400px" height="300px" /></a></div>');
			?>
			
                <div class="<?php echo !empty( $featured_image ) ? 'archive-stack' : 'archive-stack-centered'; ?>">
            
                    <header class="entry-header">
                        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                
                        <?php if ( 'post' == get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php mp_core_posted_on(); ?>
                        </div><!-- .entry-meta -->
                        <?php endif; ?>
                    </header><!-- .entry-header -->
                
                    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->
                    <?php else : ?>
                    <div class="entry-content">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                            <?php the_excerpt(); ?>
                        </a>
                    </div><!-- .entry-content -->
                    <?php endif; ?>
                    
                </div>
            
			<?php 			
			
			//Show featured image - if there is one	
			if ( !empty( $featured_image ) ) { ?>
                <div class="archive-stack">
                    <div class="entry-image">
                        <?php echo $featured_image;  ?>
                    </div><!-- .entry-content -->
                </div>
            <?php } ?>
        </div>
    </div>
    
   
	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'mp_knapstack' ) );
				if ( $categories_list && mp_core_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'mp_knapstack' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'mp_knapstack' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> | </span>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'mp_knapstack' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'mp_knapstack' ), __( '1 Comment', 'mp_knapstack' ), __( '% Comments', 'mp_knapstack' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'mp_knapstack' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
