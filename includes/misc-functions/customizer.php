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
	
	$mp_stacks_array['none'] = "None";
	
	//Loop through each Stack and add it to the array for selection
	foreach( mp_core_get_all_terms_by_tax('mp_stacks') as $stack_id => $stack_name ){
		$mp_stacks_array[$stack_id] = $stack_name;
	}	
	
	$args = array(
		array( 'section_id' => 'mp_knapstack_responsive', 'section_title' => __( 'Responsive Settings', 'mp_knapstack' ),'section_priority' => 100,
			'settings' => array(
				'mp_knapstack_responsive_off' => array(
					'label'      => __( 'Turn Responsive OFF?', 'mp_knapstack' ),
					'type'       => 'checkbox',
					'default'    => '',
					//'priority'   => 1,
					'arg' => 'responsive'
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_header_navigation', 'section_title' => __( 'Header Area', 'mp_knapstack' ),'section_priority' => 2,
			'settings' => array(
				'mp_knapstack_header_bg_color_opacity' => array(
					'label'      => __( 'Header Background Color Opacity (Enter a value from 0 to 1)', 'mp_knapstack' ),
					'type'       => 'textbox',
					'default'    => '',
					'priority'   => 1,
					'element'    => '#page .knapstack-theme-header-container',
					'jquery_function_name' => 'css',
					'arg' => 'background-color-opacity'
				),
				'mp_knapstack_header_bg_color' => array(
					'label'      => __( 'Header Background Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#939393',
					'priority'   => 1,
					'element'    => '#page .knapstack-theme-header-container',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_header_nav_text_color' => array(
					'label'      => __( 'Navigation Text Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#FFFFFF',
					'priority'   => 1,
					'element'    => '#knapstack-theme-header .menu a, #site-navigation .mp-links li a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_header_nav_text_hover_color' => array(
					'label'      => __( 'Navigation Hover Text Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#f2f2f2',
					'priority'   => 1,
					'element'    => '#knapstack-theme-header .menu a:hover, #knapstack-theme-header .current-menu-item a, #site-navigation .mp-links li a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_header_font' => array(
					'label'      => __( 'Navigation Google Font', 'mp_knapstack' ),
					'type'       => 'textbox',
					'default'    => 'Open Sans',
					'priority'   => 1,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL
				),
				'mp_knapstack_header_font_size' => array(
					'label'      => __( 'Navigation Font Size', 'mp_knapstack' ),
					'type'       => 'textbox',
					'default'    => '15',
					'priority'   => 1,
					'element'    => '#knapstack-theme-header #site-navigation *',
					'jquery_function_name' => 'css',
					'arg' => 'font-size(px)'
				),
				'mp_knapstack_header_fixed' => array(
					'label'      => __( 'Scroll Header?', 'mp_knapstack' ),
					'type'       => 'radio',
					'choices'    => array(
						'fixed'  	=> __('Fixed', 'mp_knapstack'),
						'absolute'	=> __('Scroll', 'mp_knapstack'),
					),
					'default'    => '',
					'priority'   => 1,
					'element'    => '#page .site-header',
					'jquery_function_name' => 'css',
					'arg' => 'position'
				),
				'mp_knapstack_header_bump_site_down' => array(
					'label'      => __( 'Bump site below header?', 'mp_knapstack' ),
					'type'       => 'checkbox',
					'default'    => '',
					'priority'   => 1,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL
				),
				'mp_stacks_header_stack' => array(
					'label'      => __( 'Optional: You can choose a "Stack" to display as your Header. NOTE: This will override the Logo, Background, and Nagivation Options above as those will be controlled through your Chosen Stack.', 'mp_knapstack' ),
					'type'       => 'select',
					'default'    => '',
					'priority'   => 1,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL,
					'choices' => $mp_stacks_array
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_links', 'section_title' => __( 'Body Area', 'mp_knapstack' ),'section_priority' => 4,
			'settings' => array(
				'mp_knapstack_text_color' => array(
					'label'      => __( 'Main Text Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#4c4c4c',
					//'priority'   => 10,
					'element'    => array( 'body, .download-archive .archive-download-article .entry-header a' ),
					'jquery_function_name' => 'css',
					'arg' => array( 'color' )
				),
				'mp_knapstack_subtext_color' => array(
					'label'      => __( 'Sub-Text Color (Slightly Faded)', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#777777',
					//'priority'   => 10,
					'element'    => array( '#content .sub-text, #content .sub-text a' ),
					'jquery_function_name' => 'css',
					'arg' => array( 'color' )
				),
				'mp_knapstack_link_color' => array(
					'label'      => __( 'Link Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#3f3f3f',
					//'priority'   => 10,
					'element'    => 'a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_link_hover_color' => array(
					'label'      => __( 'Link Hover Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#0f0000',
					//'priority'   => 10,
					'element'    => 'a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_font_family' => array(
					'label'      => __( 'Google Font Family:', 'mp_knapstack' ),
					'type'       => 'textbox',
					'default'    => 'Open Sans',
					//'priority'   => 10,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL,
				),
				'mp_knapstack_button_submit' => array(
					'label'      => __( 'Button Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#a0a0a0',
					//'priority'   => 14,
					'element'    => 'input[type=submit], .button, #posts-navigation .page-numbers li a',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_button_text' => array(
					'label'      => __( 'Button Text Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#ffffff',
					//'priority'   => 15,
					'element'    => 'input[type=submit], .button, #posts-navigation .page-numbers li a, #posts-navigation .page-numbers li span',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_button_hover' => array(
					'label'      => __( 'Mouse-Over Button Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#5e5e5e',
					//'priority'   => 16,
					'element'    => 'input[type=submit]:hover, .button:hover, #posts-navigation .page-numbers li a:hover, #posts-navigation .page-numbers li span',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_button_text_hover' => array(
					'label'      => __( 'Mouse-Over Button Text Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#ffffff',
					//'priority'   => 17,
					'element'    => 'input[type=submit]:hover, .button:hover, #posts-navigation .page-numbers li a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_borders' => array(
					'label'      => __( 'Border Color (Wherever borders are used)', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#d8d8d8',
					//'priority'   => 18,
					'element'    => 'table[id^="edd"] tbody tr td',
					'jquery_function_name' => 'css',
					'arg' => 'border-color'
				),
				'mp_knapstack_secondary_bg_color' => array(
					'label'      => __( 'Secondary Background Color (Form/Table Backgrounds)', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#e2e2e2',
					//'priority'   => 19,
					'element'    => '.download-archive .archive-download-article .entry-header, table, th, td, form[id^="edd"] fieldset, form[class^="fes"] fieldset, #bbpress-forums .wp-editor-container, #edd-login-account-wrap, #edd_checkout_user_info, #edd_register_account_fields',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_form_elements', 'section_title' => __( 'Forms', 'mp_knapstack' ),'section_priority' => 6,
			'settings' => array(
				'mp_knapstack_form_input_text_color' => array(
					'label'      => __( 'Form-Field Text Colors', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#333333',
					//'priority'   => 1,
					'element'    => 'input, textarea, select',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_form_input_text_color' => array(
					'label'      => __( 'Form-Field Text Colors', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#333333',
					//'priority'   => 1,
					'element'    => 'input, textarea, select',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_form_input_border_radius' => array(
					'label'      => __( 'Form-Field Corner Radius', 'mp_knapstack' ),
					'type'       => 'textbox',
					'default'    => '3',
					//'priority'   => 1,
					'element'    => 'input, textarea',
					'jquery_function_name' => 'css',
					'arg' => 'border-radius'
				),
				'mp_knapstack_form_input_border_thickness' => array(
					'label'      => __( 'Form-Field Border Thickness', 'mp_knapstack' ),
					'type'       => 'textbox',
					'default'    => '2',
					//'priority'   => 1,
					'element'    => 'input, textarea',
					'jquery_function_name' => 'css',
					'arg' => 'border-width'
				),
				'mp_knapstack_form_input_inactive_color' => array(
					'label'      => __( 'Inactive Form-Field\'s Border Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#e2e2e2',
					//'priority'   => 1,
					'element'    => array('input, textarea', '#searchform #searchsubmit'),
					'jquery_function_name' => 'css',
					'arg' => array('border-color', 'color')
				),
				'mp_knapstack_form_input_active_color' => array(
					'label'      => __( 'Active Form-Field\'s Border Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#919191',
					//'priority'   => 1,
					'element'    => 'input:focus, textarea:focus',
					'jquery_function_name' => 'css',
					'arg' => 'border-color'
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_page_header', 'section_title' => __( 'Sub-Header Area', 'mp_knapstack' ),'section_priority' => 3,
			'settings' => array(
				'mp_knapstack_page_header_bg_color' => array(
					'label'      => __( 'Background Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#6d6d6d',
					//'priority'   => 10,
					'element'    => '#main-container > .page-header, #main-container > .entry-header',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_page_header_bg_image' => array(
					'label'      => __( 'Background Image', 'mp_knapstack' ),
					'type'       => 'image',
					'default'    => '#main-container .page-header',
					//'priority'   => 10,
					'element'    => '#main-container > .page-header',
					'jquery_function_name' => 'css',
					'arg' => 'background-image'
				),
				'mp_knapstack_page_header_text_color' => array(
					'label'      => __( 'Text Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#ffffff',
					//'priority'   => 11,
					'element'    => '#main-container > .page-header, #main-container > .entry-header',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_page_header_link_color' => array(
					'label'      => __( 'Link Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#ffffff',
					//'priority'   => 12,
					'element'    => '#page #main-container > .page-header a, #page #main-container > .entry-header a',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_page_header_link_hover_color' => array(
					'label'      => __( 'Link Mouse-Over Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#ededed',
					//'priority'   => 13,
					'element'    => '#page #main-container > .page-header a:hover, #page #main-container > .entry-header a:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_page_header_button_submit' => array(
					'label'      => __( 'Button Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#a0a0a0',
					//'priority'   => 14,
					'element'    => '#page #main-container > .page-header input[type=submit], #page #main-container > .page-header .button',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_page_header_button_text' => array(
					'label'      => __( 'Button Text Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#ffffff',
					//'priority'   => 15,
					'element'    => '#page #main-container > .page-header input[type=submit], #page #main-container > .page-header .button',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_page_header_button_hover' => array(
					'label'      => __( 'Mouse-Over Button Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#ffffff',
					//'priority'   => 16,
					'element'    => '#page #main-container > .page-header input[type=submit]:hover, #page #main-container > .page-header .button:hover',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_page_header_button_text_hover' => array(
					'label'      => __( 'Mouse-Over Button Text Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#a0a0a0',
					//'priority'   => 17,
					'element'    => '#page #main-container > .page-header input[type=submit]:hover, #page #main-container > .page-header .button:hover',
					'jquery_function_name' => 'css',
					'arg' => 'color'
				),
				'mp_knapstack_sub_header_positioning' => array(
					'label'      => __( 'Sub-Header Layout', 'mp_knapstack' ),
					'type'       => 'select',
					'default'    => 'left',
					//'priority'   => 18,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL,
					'choices' => array(
						'left'  => __('Featured Image on Left - Title to the right', 'mp_knapstack'),
						'centered'  => __('Centered with Featured Image above - Title below', 'mp_knapstack'),
					),
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_footer_area', 'section_title' => __( 'Footer Area', 'mp_knapstack' ),'section_priority' => 5,
			'settings' => array(
				'mp_stacks_footer_stack' => array(
					'label'      => __( 'Choose a Stack for your footer', 'mp_knapstack' ),
					'type'       => 'select',
					'default'    => '',
					//'priority'   => 1,
					'element'    => NULL,
					'jquery_function_name' => NULL,
					'arg' => NULL,
					'choices' => $mp_stacks_array
				),
			)
		),
		array( 'section_id' => 'mp_knapstack_background', 'section_title' => __('Site Background', 'mp_knapstack'),'section_priority' => 6,
			'settings' => array(
				'mp_knapstack_background_color' => array(
					'label'      => __( 'Background Color', 'mp_knapstack' ),
					'type'       => 'color',
					'default'    => '#ffffff',
					//'priority'   => 10,
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-color'
				),
				'mp_knapstack_background_image' => array(
					'label'      => __( 'Background Image', 'mp_knapstack' ),
					'type'       => 'image',
					'default'    => '',
					//'priority'   => 10,
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-image'
				),
				'mp_knapstack_background_image_disabled' => array(
					'label'      => __( 'Disable Background Image', 'mp_knapstack' ),
					'type'       => 'checkbox',
					'default'    => '',
					//'priority'   => 10,
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-disabled'
				),
				'mp_knapstack_background_repeat' => array(
					'label'      => __( 'Background Image Repeat', 'mp_knapstack' ),
					'type'       => 'radio',
					'default'    => 'no-repeat',
					//'priority'   => 10,
					'choices'    => array(
						'no-repeat'  => __('No Repeat', 'mp_knapstack'),
						'repeat'     => __('Tile', 'mp_knapstack'),
						'repeat-x'   => __('Tile Horizontally', 'mp_knapstack'),
						'repeat-y'   => __('Tile Vertically', 'mp_knapstack'),
					),
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-repeat'
				),	
				'mp_knapstack_background_position' => array(
					'label'      => __( 'Background Image Position', 'mp_knapstack' ),
					'type'       => 'radio',
					'default'    => '',
					//'priority'   => 10,
					'choices'    => array(
						'inherit'  => __('None', 'mp_knapstack'),
						'left'  => __('Left', 'mp_knapstack'),
						'center'     => __('Center', 'mp_knapstack'),
						'right'   => __('Right', 'mp_knapstack'),
					),
					'element'    => 'body',
					'jquery_function_name' => 'css',
					'arg' => 'background-position'
				),
				'mp_knapstack_background_attachment' => array(
					'label'      => __( 'Background Image Position', 'mp_knapstack' ),
					'type'       => 'radio',
					'default'    => '',
					//'priority'   => 10,
					'choices'    => array(
						'fixed'  => __('Fixed', 'mp_knapstack'),
						'scroll'  => __('Scroll', 'mp_knapstack'),
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
 * Remove the MP Core Logo so we can position under the header controls in the customizer.
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/mp_core_logo_customizer/
 * @see      has_filter()
 * @see      apply_filters() 
 * @see      MP_CORE_Customizer
 * @return   void
 */
function mp_knapstack_remove_mp_core_logo_customizer(){
	remove_action ('init', 'mp_core_logo_customizer');
}
add_action( 'after_setup_theme', 'mp_knapstack_remove_mp_core_logo_customizer' );

/**
 * Re-Add the MP Core Logo so we can position under the header controls in the customizer.
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/mp_core_logo_customizer/
 * @see      has_filter()
 * @see      apply_filters() 
 * @see      MP_CORE_Customizer
 * @return   void
 */
function mp_knapstack_logo_customizer( $args ){
	
	$section_counter = 0;
		
	//Loop through each customizer arg
	foreach( $args as $section ){
		
		//If we are at the mp_knapstack_header_navigation
		if ( $section['section_id'] == 'mp_knapstack_header_navigation' ){
			
			//Add the option for the header link group
			$args[$section_counter]['settings']['mp_core_logo'] = array(
					'label'      => __( 'Logo', 'mp_core' ),
					'type'       => 'image',
					'default'    => '',
					//'priority'   => 2,
					'element'    => '#mp-core-logo',
					'jquery_function_name' => 'attr',
					'arg' => 'src'
			);
			$args[$section_counter]['settings']['mp_core_logo_width'] = array(
					'label'      => __( 'Logo Width (Pixels)', 'mp_core' ),
					'type'       => 'textbox',
					'default'    => '',
					//'priority'   => 2,
					'element'    => '#mp-core-logo',
					'jquery_function_name' => 'attr',
					'arg' => 'width'
			);
			$args[$section_counter]['settings']['mp_core_logo_height'] = array(
					'label'      => __( 'Logo Height (Pixels)', 'mp_core' ),
					'type'       => 'textbox',
					'default'    => '',
					//'priority'   => 2,
					'element'    => '#mp-core-logo',
					'jquery_function_name' => 'attr',
					'arg' => 'height'
			);
			
			break;
			
		}
		
		$section_counter = $section_counter + 1;
	}
	
	return $args;
				
}
add_filter( 'mp_knapstack_customizer_args', 'mp_knapstack_logo_customizer' );

/**
 * Add the featured links group only if the mp_links function is active
 *
 * @since    1.0.0
 * @link     http://mintplugins.com/doc/mp_core_logo_customizer/
 * @see      has_filter()
 * @see      apply_filters() 
 * @see      MP_CORE_Customizer
 * @return   void
 */
function mp_knapstack_header_link_group( $args ){
	
	if ( !function_exists( 'mp_links_textdomain' ) ){
		
		return $args;	
	}
	
	$link_groups_array = mp_core_get_all_terms_by_tax('mp_link_groups');
	$link_groups_array['none'] = "None";
	
	$section_counter = 0;
	
	//Loop through each customizer arg
	foreach( $args as $section ){
		
		//If we are at the mp_knapstack_header_navigation
		if ( $section['section_id'] == 'mp_knapstack_header_navigation' ){
			
			//Add the option for the header link group
			$args[$section_counter]['settings']['mp_knapstack_header_link_group'] = array(
				'label'      => __( 'Header Link Group', 'mp_knapstack' ),
				'type'       => 'select',
				'default'    => '',
				//'priority'   => 7,
				'element'    => NULL,
				'jquery_function_name' => NULL,
				'arg' => NULL,
				'choices' => $link_groups_array
			);
			
			break;
			
		}
		
		$section_counter = $section_counter + 1;
	}
	
	return $args;
				
}
add_filter( 'mp_knapstack_customizer_args', 'mp_knapstack_header_link_group' );

/**
 * Set Google Fonts
 *
 */
function mp_knapstack_font(){ 

	$font_family = get_theme_mod( 'mp_knapstack_header_font');

    new MP_CORE_Font( !empty( $font_family ) ? $font_family : 'Open Sans', 'Knapstack Header Font' );
	
	$font_family = get_theme_mod( 'mp_knapstack_font_family');

    new MP_CORE_Font( !empty( $font_family ) ? $font_family : 'Open Sans', 'MP Stacks Font 1' );

}
add_action( 'wp_loaded', 'mp_knapstack_font' );