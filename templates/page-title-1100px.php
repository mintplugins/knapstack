<?php
/**
 * Template Name: 1100px wide with Sub-Header
 */

get_header(); ?>

<?php get_template_part( 'page-header' ); ?>

	<div id="main" class="site-main">

        <div id="page-title-1100" class="content-area">
            <div id="content" class="site-content" role="main">
                <div class="content-area-one">
					<?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'content', 'page' ); ?>
        
                    <?php endwhile; // end of the loop. ?>
                    
                     <?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() )
							comments_template();
					?>
            
    			</div>
            </div><!-- #content -->
        </div><!-- #primary -->
                        
<?php get_footer(); ?>
