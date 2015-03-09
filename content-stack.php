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
		
		
		//If the user logged in is the administrator
		if ( current_user_can( 'manage_options' ) ) {
			
			//If there isn't a stack on this page, the user might be confused as to why it's 100% wide.
			if ( !has_shortcode( get_the_content(), 'mp_stack' ) ) { 
			
				$show_page_template_notice = mp_core_get_post_meta( get_the_id(), 'knapstack_page_template_notice', 'show' );
								
				//If the user hasn't dismissed this notice (through ajax)
				if ( $show_page_template_notice != 'dismissed' ){
					
					echo '<div class="knapstack-notice">';
						echo __( '<strong>Admin Notice:</strong> You don\'t have a Stack on this page. If you don\'t plan to use a Stack here and this layout is "off", fix it by doing the following:
						<br /><br />
						<ol>
							<li>Edit this page.</li>
							<li>On the right hand side under "Page Attributes", change it to something different than MP Stack - 100% width.</li>
							<li>Update the page.</li>
						</ol>', 'mp_knapstack' ); 
						echo '<br />';
						echo '<a href="' . admin_url( 'post.php?post=' . get_the_id() . '&action=edit' ) . '" class="button">';
							echo __( 'Edit This Page', 'mp_knapstack' );
						echo '</a> ';
						echo '<div class="button knapstack-notice-hide">';
							echo __( 'Hide', 'mp_knapstack' );
						echo '</div> ';
						echo '<div class="button knapstack-notice-dismiss" post-id="' . get_the_id() . '" knapstack-notice-name="knapstack_page_template_notice">';
							echo __( 'Dismiss', 'mp_knapstack' );
						echo '</div>';
					echo '</div>';
				}
			
			}
			
		}
		
		?>
	</div><!-- .entry-content -->
    
</article><!-- #post-## -->
