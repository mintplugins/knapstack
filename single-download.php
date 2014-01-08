<?php
/**
 * The Template for displaying all EDD download posts.
 *
 * @package mp_knapstack
 */

get_header(); ?>

	<div class="content-area">
		<div id="content" class="site-content stack-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'stack' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
				?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
