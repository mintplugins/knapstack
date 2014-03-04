<?php
/**
 * The Template for displaying all single posts.
 *
 * @package mp_knapstack
 */

get_header(); ?>

<?php 
//This person has chosen to use the FULL-WIDTH (Stacks) layout. 
//We are using "gallery" because WP Post Formats are limited and gallery is the most similar
if ( has_post_format( 'gallery' )) { ?>

	 <div id="main" class="site-main">
         
        <div class="content-area">
            <div id="content" class="site-content stack-content" role="main">
    
                <?php while ( have_posts() ) : the_post(); ?>
    
                    <?php get_template_part( 'content', 'stack' ); ?>
    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>
    
                <?php endwhile; // end of the loop. ?>
    
            </div><!-- #content -->
        </div><!-- #primary --><?php
//Otherwise use the normal page layout for downloads
} else{

	while ( have_posts() ) : the_post(); 

		get_template_part( 'page-header' ); ?>
	
		<div id="main" class="site-main">
		
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
		
					<?php get_template_part( 'content', 'single-download' ); ?>
						
					<div style="clear: both;"></div>
			
				</div><!-- #content -->
					
			</div><!-- #primary -->
		
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>
	
	<?php endwhile; // end of the loop. 
	
}?>

<?php get_footer(); ?>