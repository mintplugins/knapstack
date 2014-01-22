<?php

/**
 * Show Featured Image on Page Header
 */
function mp_knapstack_show_related_downloads( $tags ){	
		
	if ($tags){
		
		if ( is_object( $tags ) ){
			$tags_array = $tags;
		}
		elseif (is_array( $tags ) ){
			$tags_array = $tags[0];
		}

		echo '<h1>' . __('Related Downloads', 'mp_knapstack') . '</h1>';
		
		echo '<div class="related-downloads download-archive">';
		
			$tag_slugs = array();
			
			$counter = 0;
			
			//Set tag slugs
			foreach( $tags_array as $key => $value ){
				if ($key == 'slug' ){
					
					$tag_slugs[$counter] = $value;	
					
					$counter = $counter + 1;
				}
			}
			
			//Set the args for the new query
			$download_args = array(
				'post_type' => 'download',
				'tax_query' => array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'download_tag',
						'field'    => 'slug',
						'terms'    => $tag_slugs,
						'operator' => 'IN'
					)
				)
			);	
					
			//Create new query for downloads
			$downloads = new WP_Query( apply_filters( 'download_args', $download_args ) );
							
			//Loop through the downloads		
			if ( $downloads->have_posts() ) {
							
				while( $downloads->have_posts() ) : $downloads->the_post(); 
					
					get_template_part( 'content', 'download' );				
					
				endwhile;	
			}
		
		echo '</div>';
	}
}
add_action('mp_knapstack_after_single_download', 'mp_knapstack_show_related_downloads');