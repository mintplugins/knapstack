<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mp_knapstack
 */

get_header(); ?>

<?php get_template_part( 'page-header' ); ?>
            
<div id="main" class="site-main">

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        	<div class="content-area-one">
                
				<?php if ( have_posts() ) : ?>
        
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to overload this in a child theme then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        ?>
        
                    <?php endwhile; ?>
        
                    <?php function_exists( 'mp_core_paginate_links' ) ? mp_core_paginate_links() : paginate_links(); ?>
        
                <?php else : ?>
        
                    <?php get_template_part( 'no-results', 'archive' ); ?>
        
                <?php endif; ?>
			</div>
            <div class="content-area-two">
				<?php //Get Widgets Output?>
                <div class="mp-knapstack-widgets">
                    <?php dynamic_sidebar( 'knapstack-category-sidebar' ); ?>
                </div>
            </div>

		</div><!-- #content -->
	</section><!-- #primary -->
    
<?php get_footer(); ?>