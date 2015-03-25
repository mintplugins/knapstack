<?php
/**
 * Template Name: 600px wide with Sub-Header
 */

get_header(); ?>

<?php get_template_part( 'page-header' ); ?>

<div id="main" class="site-main">

	<div class="content-area content-area-600">
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
            <div class="content-area-two">
				<?php //Get Widgets Output?>
                <div class="mp-knapstack-widgets">
                    <?php dynamic_sidebar( 'knapstack-page-sidebar' ); ?>
                </div>
            </div>
            
            <div class="mp-knapstack-clearedfix"></div>
        
		</div><!-- #content -->
	
	</div><!-- #primary -->
 
<?php get_footer(); ?>
