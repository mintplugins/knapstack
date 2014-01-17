<?php
/**
 * The Template for displaying all single posts.
 *
 * @package mp_knapstack
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'page-header' ); ?>
    
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
    
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>