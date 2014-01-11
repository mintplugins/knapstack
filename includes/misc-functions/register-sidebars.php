<?php
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override malachi_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function malachi_widgets_init() {
	// Home page area, located on the main area of the homepage template
	register_sidebar( array(
		'name' => __( 'Footer Widgets', 'mp_knapstack' ),
		'id' => 'footer-widgets',
		'description' => __( 'Widgets for the Footer', 'mp_knapstack' ),
		'before_widget' => '<div class="footer-widget"><div class="footer-widget-inner">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div>',
	) );
	
}
/** Register sidebars by running malachi_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'malachi_widgets_init' );	