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
//Otherwise use the normal page layout for downloads
} else{

	get_template_part( 'page-header' ); ?>

	<div id="main" class="site-main">
	
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">
	
				<div class="content-area-one">
				<?php
					/**
					 * woocommerce_before_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>
			
					<?php while ( have_posts() ) : the_post(); ?>
			
						<?php wc_get_template_part( 'content', 'single-product' ); ?>
			
					<?php endwhile; // end of the loop. ?>
			
				<?php
					/**
					 * woocommerce_after_main_content hook
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>

				
				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>
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