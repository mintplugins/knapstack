<?php
/**
 * The template for displaying Download Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

get_header(); ?>

<?php get_template_part( 'page-header' ); ?>

<div id="main" class="site-main">

	<section id="primary" class="content-area">
		<div id="content-container" class="site-content-container content-grid">
            <div id="content" class="site-content download-archive content-grid" role="main">

            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to overload this in a child theme then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', 'download' );
                    ?>

                <?php endwhile; ?>

                 <div style="clear: both;"></div>

                <?php function_exists( 'mp_core_paginate_links' ) ? mp_core_paginate_links() : paginate_links(); ?>

            <?php else : ?>

                <?php get_template_part( 'no-results', 'archive' ); ?>

            <?php endif; ?>

            </div><!-- #content -->
        </div><!-- #content-container -->
	</section><!-- #primary -->

<?php get_footer(); ?>
