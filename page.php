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
 * Pages from BuddyPress don't have an object ID but pretend to be a "page". With an additional check for the object ID we can root out these strange cases.
 *
 * @package mp_knapstack
 */
global $wp_query;

if ( get_post_type() == 'page' && !empty( $wp_query->queried_object->ID ) ){ ?>

    <div id="main" class="site-main">

        <div id="primary" class="content-area mp-knapstack-mp-stacks-full-width">
            <div id="content" class="site-content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'stack' ); ?>

                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
<?php
}
//If this is a strange "pretend" page from BuddyPress or some other similar plugin, send up a normal 600px wide page template
elseif ( get_post_type() == 'page' && empty( $wp_query->queried_object->ID ) ){  ?>

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
        <?php
}
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
