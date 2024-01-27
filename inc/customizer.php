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

	$wp_customize->add_setting( 'np_hide_nimblepress_link_in_footer', array(
		'default' => 'yes',
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
		
	$wp_customize->add_setting( 'site_background_color' , array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'body_background_color' , array(
		'default'   => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'site_border_size' , array(
		'default'   => '0',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'site_border_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'site_shadow_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'header_background_color' , array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'header_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );
	
	$wp_customize->add_setting( 'footer_background_color' , array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'footer_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );
	
	$wp_customize->add_setting( 'np_widget_background_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_setting( 'nb_widget_shadow' , array(
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

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_background_color', array(
		'label'      => __( 'Site Background Color', 'nimblepress' ),
		'description' => __( 'The site-wide background color', 'nimblepress' ),
		'section'    => 'colors',
		'priority'              => 2,
		'settings'   => 'site_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background_color', array(
		'label'      => __( 'Body Background Color', 'nimblepress' ),
		'description' => __( 'Background color for the main content area', 'nimblepress' ),
		'section'    => 'colors',
		'priority'              => 3,
		'settings'   => 'body_background_color',
	) ) );
	

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'site_border_size',
			array(
				'label'          => __( 'Site Border Size', 'nimblepress' ),
				'section'        => 'colors',
				'description' => __( 'Border size for entire site - not used if the site is not set to "contained" width.', 'nimblepress' ),
				'settings'       => 'site_border_size',
				'type'           => 'text',
			'priority'              => 4,
			)
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_border_color', array(
		'label'      => __( 'Site Border Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Border color for the site border above - not used if the site is not set to "contained" width.', 'nimblepress' ),
		'settings'   => 'site_border_color',
		'priority'              => 5,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_shadow_color', array(
		'label'      => __( 'Site Shadow Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Site shadow & color - not used if the site is not set to "contained" width.', 'nimblepress' ),
		'settings'   => 'site_shadow_color',
		'priority'              => 6,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'      => __( 'Header Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The background for the header', 'nimblepress' ),
		'settings'   => 'header_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_shadow', array(
		'label'      => __( 'Header Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Shadow for the header. Set to your site or body color to make disappear.', 'nimblepress' ),
		'settings'   => 'header_shadow',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
		'label'      => __( 'Footer Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Background color of the footer', 'nimblepress' ),
		'settings'   => 'footer_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_shadow', array(
		'label'      => __( 'Footer Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Shadow for the footer. Set to your site or body color to make disappear.', 'nimblepress' ),
		'settings'   => 'footer_shadow',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_widget_background_color', array(
		'label'      => __( 'Widget Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Background color for the individual widgets.', 'nimblepress' ),
		'settings'   => 'np_widget_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nb_widget_shadow', array(
		'label'      => __( 'Widget Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Shadow for the widgets. Set to your site or body color to make disappear.', 'nimblepress' ),
		'settings'   => 'nb_widget_shadow',
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
