<?php
/**
 * Register widgetized areas
 *
 * @since Knapstack Theme 1.0
 * @uses register_sidebar
 */
function mp_knapstack_widgets_init() {
	
	//Setup the sidebar that appears beside blog posts
		$knapstack_sidebar_args = array(
			'name'          => __( 'Post Sidebar', 'mp_knapstack' ),
			'id'            => 'knapstack-post-sidebar',
			'description'   => __( 'This sidebar appears beside blog posts', 'mp_knapstack' ),
			'class'         => '',
			'before_widget' => '<div class="knapstack-widgets-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="knapstack-widgets-title">',
			'after_title'   => '</div>' 
		);
		register_sidebar( $knapstack_sidebar_args );
		
		//Setup the sidebar that appears beside blog posts
		$knapstack_sidebar_args = array(
			'name'          => __( 'Page Sidebar', 'mp_knapstack' ),
			'id'            => 'knapstack-page-sidebar',
			'description'   => __( 'This sidebar appears beside pages set to be 600px wide.', 'mp_knapstack' ),
			'class'         => '',
			'before_widget' => '<div class="knapstack-widgets-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="knapstack-widgets-title">',
			'after_title'   => '</div>' 
		);
		register_sidebar( $knapstack_sidebar_args );
		
		//Setup the sidebar that appears beside blog posts
		$knapstack_sidebar_args = array(
			'name'          => __( 'Category Sidebar', 'mp_knapstack' ),
			'id'            => 'knapstack-category-sidebar',
			'description'   => __( 'This sidebar appears beside category pages.', 'mp_knapstack' ),
			'class'         => '',
			'before_widget' => '<div class="knapstack-widgets-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="knapstack-widgets-title">',
			'after_title'   => '</div>' 
		);
		register_sidebar( $knapstack_sidebar_args );
	
}
add_action( 'widgets_init', 'mp_knapstack_widgets_init' );	