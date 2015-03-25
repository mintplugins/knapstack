<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package mp_knapstack
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php mp_core_invisible_microformats(); ?>
    
	<div class="entry-content">        
		<?php 
		
		global $wp_query;
		
		the_content(); 
				
		do_action( 'mp_knapstack_below_stack_content', $wp_query->queried_object_id, get_the_content() );
				
		?>
	</div><!-- .entry-content -->
    
</article><!-- #post-## -->
