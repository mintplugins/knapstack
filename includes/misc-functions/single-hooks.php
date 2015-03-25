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
		
		$post_id = get_the_ID();
		
		$tag_slugs = wp_get_post_terms( $post_id, 'download_tag', array("fields" => "slugs") );
					
		if ($tag_slugs){

			echo '<h1>' . __('Related Downloads', 'mp_knapstack') . '</h1>';
		
			echo '<div class="related-downloads download-archive">';
									
			//Set the args for the new query
			$download_args = array(
				'post_type' => 'download',
				'post__not_in' => array($post_id),
				'tax_query' => array(
					array(
						'taxonomy' => 'download_tag',
						'field'    => 'slug',
						'terms'    => $tag_slugs,
						
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
		}
		
		echo '</div>';
	}
}
add_action('mp_knapstack_after_single_download', 'mp_knapstack_show_related_downloads');

//Filter auto embedded video posts in the post_content to be sized correctly to 16x9 on all devices
function mp_knapstack_oembed_in_posts_filter( $cache, $url, $attr, $post_id ){
		
	//If this is a youtube video
	if ( strpos( $url, 'youtube' ) !== false ){
		return mp_core_oembed_get( $url );
	}
	//If this is a vimeo video
	else if( strpos( $url, 'vimeo' ) !== false ){
		return mp_core_oembed_get( $url );
	}
		
	return $cache;
}
add_filter( 'embed_oembed_html', 'mp_knapstack_oembed_in_posts_filter', 10, 4 );