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
		
		the_content(); 
				
		?>
	</div><!-- .entry-content -->
    
</article><!-- #post-## -->
