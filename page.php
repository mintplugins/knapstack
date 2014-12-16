<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package mp_knapstack
 */

get_header(); 

/**
 * Use Full-width if the post type is a page. 
 * BBpress uses this template too so don't use full-width for other post types that depend on this one
 *
 * @package mp_knapstack
 */
if ( get_post_type() == 'page' ){ ?>
	
    <div id="main" class="site-main">
    
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">
    
                <?php while ( have_posts() ) : the_post(); ?>
    
                    <?php get_template_part( 'content', 'stack' ); ?>
    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        //if ( comments_open() || '0' != get_comments_number() )
                           //comments_template();
                    ?>
    
                <?php endwhile; // end of the loop. ?>
    
            </div><!-- #content -->
        </div><!-- #primary -->
<?php } 

//If this isn't a 'page' type
else{
	
	get_template_part( 'page-header' ); ?>

	<div id="main" class="site-main">
	
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
	
				<div class="content-area-one">
				<?php while ( have_posts() ) : the_post(); ?>
    
                    <?php get_template_part( 'content', 'single' ); ?>
                    
                <?php endwhile; // end of the loop. ?>
                
                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
    
                </div>
		
			</div><!-- #content -->
				
		</div><!-- #primary -->
	
		<?php
		
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ){
			comments_template();
		}
		
}
?>
<?php get_footer(); ?>