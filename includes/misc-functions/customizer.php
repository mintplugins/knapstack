<?php 
/**
 * Customize
 *
 * Theme options are lame! Manage any customizations through the Theme
 * Customizer. Expose the customizer in the Appearance panel for easy access.
 * This uses the customizer class in the mp-core plugin
 *
 * @package mp_knapstack
 * @since mp_knapstack 3.0
 */
 
function mp_knapstack_customizer(){
	
	$theme = wp_get_theme(); // $theme->Name
	
	$link_groups_array = mp_core_get_all_terms_by_tax('mp_link_groups');
	$link_groups_array['none'] = "None";
	
	$args = array(
		array( 'section_id' => 'mp_knapstack_responsive', 'section_title' => __( 'Responsive Settings', 'mp_core' ),'section_priority' => 100,
			'settings' => array(
				'mp_knapstack_responsive_off' => array(
					'label'      => __( 'Turn Responsive OFF?', 'mp_core' ),
					'type'       => 'checkbox',
					'default'    => '',
					'priority'   => 1,
					'arg' => 'responsive'
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_header_navigation', 'section_title' => __( 'Header Settings', 'mp_core' ),'section_priority' => 2,
			'settings' => array(
				'mp_knapstack_header_bg_color' => array(
					'label'      => __( 'Header Background Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '#00bb85',
					'priority'   => 1,
					'element'    => '#page #masthead, #site-navigation .menu > li ul',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_header_nav_text_color' => array(
					'label'      => __( 'Navigation Text Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '#FFFFFF',
					'priority'   => 1,
					'element'    => '#masthead .menu a, #site-navigation .mp-links li a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_header_nav_text_hover_color' => array(
					'label'      => __( 'Navigation Hover Text Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => '#masthead .menu a:hover, #site-navigation .mp-links li a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_header_link_group' => array(
					'label'      => __( 'Header Link Group', 'mp_core' ),
					'type'       => 'select',
					'default'    => '',
					'priority'   => 1,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL,
					'choices' => $link_groups_array
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_links', 'section_title' => __( 'Site Text and Fonts', 'mp_core' ),'section_priority' => 3,
			'settings' => array(
				'mp_knapstack_text_color' => array(
					'label'      => __( 'Text Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_link_color' => array(
					'label'      => __( 'Link Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#main-container a, #colophon a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_link_hover_color' => array(
					'label'      => __( 'Link Hover Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#main a:hover, #colophon a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_font_family' => array(
					'label'      => __( 'Google Font Family:', 'mp_core' ),
					'type'       => 'textbox',
					'default'    => 'Open Sans',
					'priority'   => 10,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL,
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_form_elements', 'section_title' => __( 'Form Styling', 'mp_core' ),'section_priority' => 3,
			'settings' => array(
				'mp_knapstack_form_input_text_color' => array(
					'label'      => __( 'Input Text Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => 'input',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_form_input_inactive_color' => array(
					'label'      => __( 'Inactive Input Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => 'input',
					'jquery_function_name' => 'css',
					'arg' => 'border-color'
				),
				'mp_knapstack_form_input_active_color' => array(
					'label'      => __( 'Active Input Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => 'input:focus',
					'jquery_function_name' => 'css',
					'arg' => 'border-color'
				),
				'mp_knapstack_form_input_submit' => array(
					'label'      => __( 'Button Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => 'input[type=submit], .button, a.edd-submit.button, .edd-submit.button, .edd-submit, input.edd-submit.button',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_form_input_submit_hover' => array(
					'label'      => __( 'Button Color when Mouse-Over', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 1,
					'element'    => 'input[type=submit]:hover, .button:hover, .edd-submit.button:hover',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_page_header', 'section_title' => __( 'Page Titles Settings', 'mp_core' ),'section_priority' => 3,
			'settings' => array(
				'mp_knapstack_page_header_bg_color' => array(
					'label'      => __( 'Page Title Background Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#main-container > .page-header, #main-container > .entry-header',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_page_header_text_color' => array(
					'label'      => __( 'Page Title Text Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#main-container > .page-header, #main-container > .entry-header',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_page_header_link_color' => array(
					'label'      => __( 'Page Title Link Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#page #main-container > .page-header a, #page #main-container > .entry-header a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_page_header_link_hover_color' => array(
					'label'      => __( 'Page Title Link Hover Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#page #main-container > .page-header a:hover, #page #main-container > .entry-header a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_comment_area', 'section_title' => __( 'Comment Area', 'mp_core' ),'section_priority' => 4,
			'settings' => array(
				'mp_knapstack_comment_area_bg_color' => array(
					'label'      => __( 'Comment Area Background Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#comments-container',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_comment_area_text_color' => array(
					'label'      => __( 'Comment Text Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#comments',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_comment_area_link_color' => array(
					'label'      => __( 'Comment Link Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#comments a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_comment_area_link_hover_color' => array(
					'label'      => __( 'Comment Link Hover Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#comments a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_footer_widget_area', 'section_title' => __( 'Footer Widget Area', 'mp_core' ),'section_priority' => 5,
			'settings' => array(
				'mp_knapstack_footer_widget_area_bg_color' => array(
					'label'      => __( 'Footer Widget Area Background Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#footer-widgets-container',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_footer_widget_area_text_color' => array(
					'label'      => __( 'Footer Widget Text Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#footer-widgets-container',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_footer_widget_area_link_color' => array(
					'label'      => __( 'Footer Widget Link Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#footer-widgets-container a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_footer_widget_area_link_hover_color' => array(
					'label'      => __( 'Footer Widget Link Hover Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '',
					'priority'   => 10,
					'element'    => '#footer-widgets-container a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_background', 'section_title' => sprintf( __( '%s Options', 'mp_core' ), 'Site Background' ),'section_priority' => 4,
			'settings' => array(
				'mp_knapstack_background_color' => array(
					'label'      => __( 'Background Color', 'mp_core' ),
					'type'       => 'color',
					'default'    => '#ffffff',
					'priority'   => 10,
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_background_image' => array(
					'label'      => __( 'Background Image', 'mp_core' ),
					'type'       => 'image',
					'default'    => '',
					'priority'   => 10,
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-image'
				),
				'mp_knapstack_background_image_disabled' => array(
					'label'      => __( 'Disable Background Image', 'mp_core' ),
					'type'       => 'checkbox',
					'default'    => '',
					'priority'   => 10,
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-disabled'
				),
				'mp_knapstack_background_repeat' => array(
					'label'      => __( 'Background Image Repeat', 'mp_core' ),
					'type'       => 'radio',
					'default'    => '',
					'priority'   => 10,
					'choices'    => array(
						'no-repeat'  => __('No Repeat', 'mp_core'),
						'repeat'     => __('Tile', 'mp_core'),
						'repeat-x'   => __('Tile Horizontally', 'mp_core'),
						'repeat-y'   => __('Tile Vertically', 'mp_core'),
					),
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-repeat'
				),	
				'mp_knapstack_background_position' => array(
					'label'      => __( 'Background Image Position', 'mp_core' ),
					'type'       => 'radio',
					'default'    => '',
					'priority'   => 10,
					'choices'    => array(
						'inherit'  => __('None', 'mp_core'),
						'left'  => __('Left', 'mp_core'),
						'center'     => __('Center', 'mp_core'),
						'right'   => __('Right', 'mp_core'),
					),
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-position'
				),
				'mp_knapstack_background_attachment' => array(
					'label'      => __( 'Background Image Position', 'mp_core' ),
					'type'       => 'radio',
					'default'    => '',
					'priority'   => 10,
					'choices'    => array(
						'fixed'  => __('Fixed', 'mp_core'),
						'scroll'  => __('Scroll', 'mp_core'),
					),
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-attachment'
				),
			)
		)
	);
	
	$args = has_filter('mp_knapstack_customizer_args') ? apply_filters('mp_knapstack_customizer_args', $args) : $args;
	
	new MP_CORE_Customizer($args);
	
}

add_action ('init', 'mp_knapstack_customizer');

/**
 * Set Google Font
 *
 */
function mp_knapstack_font(){ 

	$font_family = get_theme_mod( 'mp_knapstack_font_family');

    new MP_CORE_Font( !empty( $font_family ) ? $font_family : 'Open Sans', 'MP Stacks Font 1' );

}
add_action( 'wp_loaded', 'mp_knapstack_font' );