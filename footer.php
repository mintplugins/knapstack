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
    
    	<?php get_template_part( 'footer-widgets' ); ?>
        
        <div id="footer-site-info">
            <div class="site-info-left">
            	<?php do_action( 'mp_knapstack_copyright' ); ?>    	
             </div><!-- .site-info left-->
            
            <div class="site-info-right">
                <?php do_action( 'mp_knapstack_credits' ); ?>               
            </div><!-- .site-info right-->
       		
            <div style="clear: both;"></div>
            
            <?php wp_footer(); ?>
            
        </div>
       
        <div style="clear: both;"></div>
               
	</footer><!-- #colophon -->
</div><!-- #page -->

</body>
</html>