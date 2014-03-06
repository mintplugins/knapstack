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
 </div><!-- #page -->
 
<footer id="colophon" class="site-footer" role="contentinfo">

    <?php do_action( 'mp_knapstack_footer_stack' ); ?>
    
	<?php wp_footer(); ?>
           
</footer><!-- #colophon -->

</body>
</html>
