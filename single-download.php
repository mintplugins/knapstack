<?php
/**
 * The Template for displaying all single posts.
 *
 * @package mp_knapstack
 */

get_header(); ?>

<?php 
//The Knapstack Customizer has a post format over-ride which allows you to set what "Standard Means" as a post format.
$standard_post_format_style = get_theme_mod( 'mp_knapstack_default_post_format_style' );

//This person has chosen to use the FULL-WIDTH (Stacks) layout. 
//We are using "gallery" because WP Post Formats are limited and gallery is the most similar
if ( has_post_format( 'gallery' ) || $standard_post_format_style == '100percentwidth' ) { ?>
	
    <div id="main" class="site-main">
    
        <div class="content-area">
            <div id="content" class="site-content stack-content" role="main">
    			<div class="content-area-one">
                <?php while ( have_posts() ) : the_post(); ?>
    
                    <?php get_template_part( 'content', 'stack' ); ?>
     			
				<?php endwhile; // end of the loop. ?>
                
				<?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
   				</div>
            </div><!-- #content -->
        </div><!-- #primary --><?php
//Otherwise use the normal page layout for downloads (1100px wide with page header)
} else{

	get_template_part( 'page-header' ); ?>

	<div id="main" class="site-main">
	
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
	
				<div class="content-area-one">
				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'content', 'single-download' ); ?>
					
				<?php endwhile; // end of the loop. ?>
				</div>
				<div class="content-area-two">
					<?php //Get Widgets Output?>
                    <div class="mp-knapstack-widgets">
                        <?php dynamic_sidebar( 'knapstack-post-sidebar' ); ?>
                    </div>
                </div>
                
			</div><!-- #content -->
				
		</div><!-- #primary -->	
<?php } ?>

<?php get_footer(); ?>