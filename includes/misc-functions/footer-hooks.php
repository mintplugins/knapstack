<?php

/**
 * Show Credits in Footer
 */
function mp_knapstack_show_credits(){
	?>
    <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'mp_knapstack' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', 'mp_knapstack' ), 'WordPress' ); ?></a>
    <?php echo __( 'and', 'mp_knapstack' ); ?>
    <a href="http://moveplugins.com/" title="<?php esc_attr_e( 'WordPress Plugins and Themes', 'mp_knapstack' ); ?>" rel="generator"><?php printf( __( '%s', 'mp_knapstack' ), 'Move Plugins' ); 	?></a>
	<?php
}
add_action('mp_knapstack_credits', 'mp_knapstack_show_credits');

/**
 * Show Copyright in Footer
 */
function mp_knapstack_show_copyright(){
	?>
  	<p><?php echo __('Copyright', 'mp_knapstack'); ?> &copy; <?php echo date('Y') . ' ' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '. ' . __('All rights reserved.', 'mp_knapstack'); ?></p> 	
	<?php
}
add_action('mp_knapstack_copyright', 'mp_knapstack_show_copyright');



  
