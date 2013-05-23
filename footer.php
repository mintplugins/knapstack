<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package mp_knapstack
 */
?>
            <div style="clear: both;"></div>
        </div><!-- #main -->
	</div><!-- main-container -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info-left">
			 <p><?php echo __('Copyright', 'mp_knapstack'); ?> &copy; <?php echo date('Y') . ' ' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '. ' . __('All rights reserved.', 'mp_knapstack'); ?>			 		</div><!-- .site-info -->
        
        <div class="site-info-right">
			<?php do_action( 'mp_knapstack_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'mp_knapstack' ); ?>" rel="generator"><?php printf( __( 'Powered by %s', 'mp_knapstack' ), 'WordPress' ); ?></a>
            <?php echo __( 'and', 'mp_knapstack' ); ?>
            <a href="http://moveplugins.com/" title="<?php esc_attr_e( 'WordPress Plugins and Themes', 'mp_knapstack' ); ?>" rel="generator"><?php printf( __( '%s', 'mp_knapstack' ), 'Move Plugins' ); ?></a>
            
		</div><!-- .site-info -->
        <div style="clear: both;"></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>