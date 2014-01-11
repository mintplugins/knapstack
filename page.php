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

get_header(); ?>

<?php get_template_part( 'page-header' ); ?>

<div id="main" class="site-main">

	<div id="primary" class="content-area">
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
