<?php
/**
 * The Widget Area containing the Footer Widgets
 *
 * @package mp_knapstack
 */
?>
<div id="footer-widgets-container" class="widget-area">
	<div id="footer-widgets" class="widget-area">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'footer-widgets' ) ) : ?>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
    
    <div style="clear: both;"></div>
</div>
