<?php

/**
 * Show Author for each item on archive download page in sub-text area
 */
 function mp_knapstack_archive_download_subtext_show_author(){
	 ?>
    <span class="author vcard">
    
		<?php echo __( 'By: ', 'mp_knapstack' ); ?>
        
        <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'View all posts by %s', 'mp_core' ), get_the_author() ) ); ?>" rel="author">
        
        <?php 
			echo mp_core_get_avatar( get_the_author_meta('user_email') , 60 );
			echo get_the_author();  
        ?>
        
        </a>
    </span>
	<?php
}
//add_action('mp_knapstack_archive_download_subtext', 'mp_knapstack_archive_download_subtext_show_author');