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

	$wp_customize->add_setting( 'np_site_width', array(
		'default' => '1200',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'np_site_full_width_or_contained', array(
		'default' => 'full_width',
		'transport' => 'refresh',
	) );
		
	$wp_customize->add_setting( 'site_background_color' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'body_background_color' , array(
		'default'   => '',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'site_border_size' , array(
		'default'   => '0',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'site_border_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'site_shadow_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'header_background_color' , array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'header_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
	) );
	
	$wp_customize->add_setting( 'footer_background_color' , array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'footer_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
	) );
	
	$wp_customize->add_setting( 'np_widget_background_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'nb_widget_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'np_header_height', array(
		'default' => 'auto',
		'transport' => 'refresh',
	) );

	$wp_customize->add_setting( 'np_footer_height', array(
		'default' => 'auto',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_background_color', array(
		'label'      => __( 'Site Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'priority'              => 2,
		'settings'   => 'site_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background_color', array(
		'label'      => __( 'Body Background Color', 'nimblepress' ),
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
				'settings'       => 'site_border_size',
				'type'           => 'text',
			'priority'              => 4,
			)
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_border_color', array(
		'label'      => __( 'Site Border Color', 'nimblepress' ),
		'section'    => 'colors',
		'settings'   => 'site_border_color',
		'priority'              => 5,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_shadow_color', array(
		'label'      => __( 'Site Shadow Color', 'nimblepress' ),
		'section'    => 'colors',
		'settings'   => 'site_shadow_color',
		'priority'              => 6,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'      => __( 'Header Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'settings'   => 'header_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_shadow', array(
		'label'      => __( 'Header Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'settings'   => 'header_shadow',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
		'label'      => __( 'Footer Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'settings'   => 'footer_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_shadow', array(
		'label'      => __( 'Footer Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'settings'   => 'footer_shadow',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_widget_background_color', array(
		'label'      => __( 'Widget Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'settings'   => 'np_widget_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nb_widget_shadow', array(
		'label'      => __( 'Widget Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'settings'   => 'nb_widget_shadow',
	) ) );


	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'np_site_width',
			array(
				'label'          => __( 'Site Width', 'nimblepress' ),
				'section'        => 'np_layout',
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
					'type'           => 'radio',
					'priority'              => 2,
					'choices'               => array(
					'full_width'                  => __('Full Width', 'nimblepress'),
					'contained'                  => __('Contained', 'nimblepress'),
				)
			)
		)
	);

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
	wp_enqueue_script( 'nimblepress-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'nimblepress_customize_preview_js' );
