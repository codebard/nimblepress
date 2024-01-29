<?php
/**
 * nimblepress Theme Customizer
 *
 * @package nimblepress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nimblepress_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'np_layout' , array(
		'title'      => __( 'Layout', 'nimblepress' ),
		'priority'   => 5,
	) );

	$wp_customize->add_section( 'np_fonts' , array(
		'title'      => __( 'Fonts', 'nimblepress' ),
		'priority'   => 6,
	) );

	$wp_customize->add_section( 'np_misc' , array(
		'title'      => __( 'Misc', 'nimblepress' ),
		'priority'   => 916,
	) );

	$wp_customize->add_setting( 'np_site_width', array(
		'default' => '1200',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_body_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_heading_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_nav_menu_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'site_title_size', array(
		'default' => '42',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'site_description_font_size', array(
		'default' => '16',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_link_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_site_full_width_or_contained', array(
		'default' => 'full_width',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );
		
	$wp_customize->add_setting( 'np_site_background_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_body_background_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_site_title_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_site_border_size' , array(
		'default'   => '0',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_site_border_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_site_shadow_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_header_background_color' , array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );
	

	$wp_customize->add_setting( 'np_header_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_menu_link_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_heading_color' , array(
		'default'   => '#404040',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_site_description_color' , array(
		'default'   => '#404040',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_button_background_color' , array(
		'default'   => '#2f4d80',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_button_hover_background_color' , array(
		'default'   => '#4075cb',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );


	$wp_customize->add_setting( 'np_button_text_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	
	$wp_customize->add_setting( 'np_footer_background_color' , array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_footer_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );
	
	$wp_customize->add_setting( 'np_widget_background_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_widget_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_header_height', array(
		'default' => 'auto',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_footer_height', array(
		'default' => 'auto',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'np_inline_the_css', array(
		'default' => 'yes',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_site_background_color', array(
		'label'      => __( 'Site Background Color', 'nimblepress' ),
		'description' => __( 'The site-wide background color', 'nimblepress' ),
		'section'    => 'colors',
		'priority'              => 11,
		'settings'   => 'np_site_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_body_background_color', array(
		'label'      => __( 'Body Background Color', 'nimblepress' ),
		'description' => __( 'Background color for the main content area', 'nimblepress' ),
		'section'    => 'colors',
		'priority'              => 12,
		'settings'   => 'np_body_background_color',
	) ) );
	

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_site_border_size',
			array(
				'label'          => __( 'Site Border Size', 'nimblepress' ),
				'section'        => 'colors',
				'description' => __( 'Border size for entire site - not used if the site is not set to "contained" width.', 'nimblepress' ),
				'settings'       => 'np_site_border_size',
				'type'           => 'text',
			'priority'              => 13,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'site_title_size',
			array(
				'label'          => __( 'Site Title Size', 'nimblepress' ),
				'section'        => 'title_tagline',
				'description' => __( 'The size for site title in case you are using a text title instead of image logo.', 'nimblepress' ),
				'settings'       => 'site_title_size',
				'type'           => 'text',
			'priority'              => 13,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'site_description_font_size',
			array(
				'label'          => __( 'Site Description Font Size', 'nimblepress' ),
				'section'        => 'title_tagline',
				'description' => __( 'The size for site description font in case you are using a the site description.', 'nimblepress' ),
				'settings'       => 'site_description_font_size',
				'type'           => 'text',
			'priority'              => 14,
			)
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_site_title_color', array(
		'label'      => __( 'Site Title Color', 'nimblepress' ),
		'section'    => 'title_tagline',
		'description' => __( 'Color for the site title', 'nimblepress' ),
		'settings'   => 'np_site_title_color',
		'priority'              => 14,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_site_description_color', array(
		'label'      => __( 'Site Description Color', 'nimblepress' ),
		'section'    => 'title_tagline',
		'description' => __( 'Color for the site description', 'nimblepress' ),
		'settings'   => 'np_site_description_color',
		'priority'              => 15,
	) ) );


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_site_border_color', array(
		'label'      => __( 'Site Border Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Border color for the site border above - not used if the site is not set to "contained" width.', 'nimblepress' ),
		'settings'   => 'np_site_border_color',
		'priority'              => 14,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_site_shadow_color', array(
		'label'      => __( 'Site Shadow Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Site shadow & color - not used if the site is not set to "contained" width.', 'nimblepress' ),
		'settings'   => 'np_site_shadow_color',
		'priority'              => 15,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_header_background_color', array(
		'label'      => __( 'Header Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The background for the header', 'nimblepress' ),
		'settings'   => 'np_header_background_color',
		'priority'              => 16,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_header_shadow', array(
		'label'      => __( 'Header Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Shadow for the header. Set to your site or body color to make disappear.', 'nimblepress' ),
		'settings'   => 'np_header_shadow',
		'priority'              => 17,
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_button_background_color', array(
		'label'      => __( 'Button Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The background color for buttons.', 'nimblepress' ),
		'settings'   => 'np_button_background_color',
		'priority'              => 18,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_button_hover_background_color', array(
		'label'      => __( 'Button Hover Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The background color for buttons when hovered.', 'nimblepress' ),
		'settings'   => 'np_button_hover_background_color',
		'priority'              => 19,
	) ) );
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_menu_link_color', array(
		'label'      => __( 'Menu Link Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Colors of link in the header menu.', 'nimblepress' ),
		'settings'   => 'np_menu_link_color',
		'priority'              => 20,
	) ) );
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_heading_color', array(
		'label'      => __( 'Heading Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Color for the headings across the site.', 'nimblepress' ),
		'settings'   => 'np_heading_color',
		'priority'              => 21,
	) ) );
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_button_text_color', array(
		'label'      => __( 'Button Text Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The color for the text on the buttons.', 'nimblepress' ),
		'settings'   => 'np_button_text_color',
		'priority'              => 22,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_footer_background_color', array(
		'label'      => __( 'Footer Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Background color of the footer', 'nimblepress' ),
		'settings'   => 'np_footer_background_color',
		'priority'              => 23,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_footer_shadow', array(
		'label'      => __( 'Footer Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Shadow for the footer. Set to your site or body color to make disappear.', 'nimblepress' ),
		'settings'   => 'np_footer_shadow',
		'priority'              => 24,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_widget_background_color', array(
		'label'      => __( 'Widget Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Background color for the individual widgets.', 'nimblepress' ),
		'settings'   => 'np_widget_background_color',
		'priority'              => 25,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_widget_shadow', array(
		'label'      => __( 'Widget Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Shadow for the widgets. Set to your site or body color to make disappear.', 'nimblepress' ),
		'settings'   => 'np_widget_shadow',
		'priority'              => 26,
	) ) );


	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'np_site_width',
			array(
				'label'          => __( 'Site Width', 'nimblepress' ),
				'section'        => 'np_layout',
				'description' => __( 'Width of the site', 'nimblepress' ),
				'settings'       => 'np_site_width',
				'type'           => 'text',
			)
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'np_header_height',
			array(
				'label'          => __( 'Header Height (default: auto)', 'nimblepress' ),
				'section'        => 'np_layout',
				'description' => __( 'Minimum height of the header', 'nimblepress' ),
				'settings'       => 'np_header_height',
				'type'           => 'text',
			)
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'np_footer_height',
			array(
				'label'          => __( 'Footer Height (default: auto)', 'nimblepress' ),
				'section'        => 'np_layout',
				'description' => __( 'Minimum height of the footer', 'nimblepress' ),
				'settings'       => 'np_footer_height',
				'type'           => 'text',
			)
		)
	);

	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'np_site_full_width_or_contained',
			array(
					'label'          => __( 'Site Contained/Full Width', 'nimblepress' ),
					'section'        => 'np_layout',
					'settings'       => 'np_site_full_width_or_contained',
					'description' => __( 'Full width allows header and footer to extend, contained keeps them contained into site width.', 'nimblepress' ),
					'type'           => 'radio',
					'priority'              => 2,
					'choices'               => array(
					'full_width'                  => __('Full Width', 'nimblepress'),
					'contained'                  => __('Contained', 'nimblepress'),
				)
			)
		)
	);
	
	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'np_inline_the_css',
			array(
					'label'          => __( 'Inline the css', 'nimblepress' ),
					'section'        => 'np_misc',
					'settings'       => 'np_inline_the_css',
					'description' => __( 'Loads the already small theme CSS inline and makes the site faster by avoiding render-blocking and one extra call', 'nimblepress' ),
					'type'           => 'radio',
					'priority'              => 2,
					'choices'               => array(
					'yes'                  => __('Yes', 'nimblepress'),
					'no'                  => __('No', 'nimblepress'),
				)
			)
		)
	);
		
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_body_font', //Set a unique ID for the control
			array(
				'label'      => __( 'Body Font', 'nimblepress' ),
				'settings'   => 'np_body_font',
				'description' => __( 'Font for body and general text', 'nimblepress' ),
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_web_safe_fonts()
			)
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_heading_font', //Set a unique ID for the control
			array(
				'label'      => __( 'Heading Font', 'nimblepress' ),
				'description' => __( 'Font for headings across the site', 'nimblepress' ),
				'settings'   => 'np_heading_font',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_web_safe_fonts()
			)
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_nav_menu_font', //Set a unique ID for the control
			array(
				'label'      => __( 'Nav Menu Font', 'nimblepress' ),
				'description' => __( 'Font for the navigation menus', 'nimblepress' ),
				'settings'   => 'np_nav_menu_font',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_web_safe_fonts()
			)
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_link_font', //Set a unique ID for the control
			array(
				'label'      => __( 'Link Font', 'nimblepress' ),
				'description' => __( 'Font for the links across the site', 'nimblepress' ),
				'settings'   => 'np_link_font',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_web_safe_fonts()
			)
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'nimblepress_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'nimblepress_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'nimblepress_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function nimblepress_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function nimblepress_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nimblepress_customize_preview_js() {
	wp_enqueue_script( 'nimblepress-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), NIMBLEPRESS_VERSION, true );
}
add_action( 'customize_preview_init', 'nimblepress_customize_preview_js' );
