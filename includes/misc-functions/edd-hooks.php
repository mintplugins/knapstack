<?php
/**
 * Remove Add To Cart Button from Single Download page
 */
remove_action( 'edd_after_download_content', 'edd_append_purchase_link' );

/**
 * Don't use default EDD CSS styles
 */
remove_action( 'wp_enqueue_scripts', 'edd_register_styles' );

/**
 * Show Sort-By Option for downloads
 */
function mp_knapstack_show_sort_by_options(){
	 
	 if (is_archive('download') ){
		 
		$knapstack_edd_sorter = isset( $_GET['knapstack_edd_sorter']) ? $_GET['knapstack_edd_sorter'] : NULL;
		
		if (isset( $_GET['order'] )){
				$asc_desc = $_GET['order'] == 'asc' ? 'desc' : 'asc';
		}
		else{
			$asc_desc = 'asc';
		}
		 
		wp_enqueue_script( 'knapstack-edd-front-end-js', get_template_directory_uri() . '/includes/misc-functions/edd-front-end.js', array( 'jquery' ) );               
		
		?>  
        <div class="knapstack_title_sort_downloads_by"><?php echo __( 'Sort By: ', 'mp_knapstack' ); ?></div>
        <select id="knapstack_sort_downloads_by" name="knapstack_sort_downloads_by" class="knapstack_sort_downloads_by">
                <option value="?knapstack_edd_sorter=date&order=<?php echo $asc_desc; ?>&orderby=date" <?php echo $knapstack_edd_sorter == 'date' ? 'selected' : NULL; ?>><?php echo __( 'Date', 'mp_knapstack' ); ?></option>
                <option value="?knapstack_edd_sorter=sales&order=<?php echo $asc_desc; ?>&meta_key=_edd_download_sales" <?php echo $knapstack_edd_sorter == 'sales' ? 'selected' : NULL; ?>><?php echo __( 'Sales', 'mp_knapstack' ); ?></option>
                <option value="?knapstack_edd_sorter=rating&order=<?php echo $asc_desc; ?>&meta_key=ratings_average" <?php echo $knapstack_edd_sorter == 'Rating' ? 'selected' : NULL; ?>><?php echo __( 'Rating', 'mp_knapstack' ); ?></option>
                <option value="?knapstack_edd_sorter=price&order=<?php echo $asc_desc; ?>&meta_key=edd_price" <?php echo $knapstack_edd_sorter == 'price' ? 'selected' : NULL; ?>><?php echo __( 'Price', 'mp_knapstack' ); ?></option>
        </select>
       	
        <a title="<?php echo __('Sort By ', 'mp_knapstack') .  $asc_desc; ?>" href="<?php echo add_query_arg( array('order' => $asc_desc) ); ?>" class="knapstack_sort_downloads_by_<?php echo $asc_desc; ?>"></a>
    
   	 <?php
	 }
}
//add_action('mp_knapstack_header_right_column', 'mp_knapstack_show_sort_by_options');

//Set query based on URL args
function mp_knapstack_edd_pre_get_posts( $query ){
	
	if ( is_archive() && isset( $_GET['knapstack_edd_sorter'] ) && $query->is_main_query() ){
		 
		
		if (isset( $_GET['order'] )){
			$query->set('order', $_GET['order']);
		}
		
		if (isset( $_GET['orderby'] )){
			$query->set('orderby', $_GET['orderby']);
		}
		
		if (isset( $_GET['meta_key'] )){
			$query->set('meta_key', $_GET['meta_key']);
			$query->set('orderby', 'meta_value');
		}
		 		
	}
		
}
//add_action( 'pre_get_posts', 'mp_knapstack_edd_pre_get_posts' );

function mp_knapstack_pagination_args_mp_core( $args_array ){
	
	array_push($args_array, 'meta_key', 'orderby', 'order', 'knapstack_edd_sorter' );
		
	return $args_array;
}
//add_filter( 'mp_core_pagination_arg_remover', 'mp_knapstack_pagination_args_mp_core' );