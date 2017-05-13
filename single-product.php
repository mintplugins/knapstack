<?php
/**
 * The Template for displaying all single products from WooCommerce.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
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
   				</div>
            </div><!-- #content -->
        </div><!-- #primary --><?php
//Otherwise use the normal page layout for WooCommerce Products (1100 pixels wide with no page header).
} else{

	//get_template_part( 'page-header' ); ?>

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
					//do_action( 'woocommerce_before_main_content' );
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
					//do_action( 'woocommerce_after_main_content' );
				?>


				</div>


			</div><!-- #content -->

		</div><!-- #primary -->
<?php } ?>

<?php get_footer(); ?>
