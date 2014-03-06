<?php
/**
 * Template Name: Show Page Title - 1100px wide
 */

get_header(); ?>

<?php get_template_part( 'page-header' ); ?>

	<div id="main" class="site-main">

        <div id="page-title-1100" class="content-area">
            <div id="content" class="site-content" role="main">
    
                <?php while ( have_posts() ) : the_post(); ?>
    
                    <?php get_template_part( 'content', 'page' ); ?>
    
                <?php endwhile; // end of the loop. ?>
    
            </div><!-- #content -->
        </div><!-- #primary -->

<?php
	// If comments are open or we have at least one comment, load up the comment template
	if ( comments_open() || '0' != get_comments_number() )
		comments_template();
?>
                
<?php get_footer(); ?>