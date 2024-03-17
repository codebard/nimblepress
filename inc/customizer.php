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

class SampleAddonCustomizer {

   public $this_theme = 'nimblepress';

   public function hooks() {

     $current_theme = wp_get_theme();

     if( $current_theme->template == $this->this_theme ) {
       add_action( 'customize_register', array( $this, 'add_nimblepress_upsell' ), 99 );
     }

   }

   public function add_nimblepress_upsell( $wp_customize ) {

         $wp_customize->add_section( 'nimblepress_upsell', array(
           'capability' => 'edit_theme_options',
           'priority'   => 1,
           'title'      => __( 'Go premium for more features', 'nimblepress' )
         ) );

         $wp_customize->add_setting(  'nimblepress_upsell_setting', array(
           'capability' => 'edit_theme_options',
           'type'       => 'hidden',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
           'autoload'   => false
         ) );

         $wp_customize->add_control( 'nimblepress_upsell_setting', array(
             'label'   => '',
             'description' => $this->description(),
             'section' => 'nimblepress_upsell',
             'type'    => 'hidden',
         ) );
   }

   public function description() {

     $description = '
	 
	 <div class="nimblepress_introduction" style="font-style: normal !important;">

	Consider upgrading to NimblePress premium to power up your theme! With premium, you can:
<br clear="both" />
<br clear="both" />
	<ul>
		<li>Show ads in your header, sidebar, footer</li>
		<li>Show ads before post content, inside the post content and at the end of post content</li>
		<li>Use Grid post listing and hide sidebar in home page</li>
		<li>Speed up your site even further</li>
		<li>Customize the footer info and remove the credits link</li>
		<li>Get all upcoming features</li>
	</ul>
<br clear="both" />
	Sounds good? <a href="https://codebard.com/nimblepress-premium?utm_source=' . urlencode( site_url()) . '&utm_medium=nimblepress_free&utm_campaign=&utm_content=nimblepress_customizer_notice&utm_term=" target="_blank">Upgrade here!</a>

	</div>
	 
';
	
	return $description;
   }

 }
 

if ( !defined('NIMBLEPRESS_PREMIUM') ) {

	$sampleAddonCustomizer = new SampleAddonCustomizer();
	$sampleAddonCustomizer->hooks();

} 

function nimblepress_customize_register( $wp_customize ) 
{
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
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_body_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_body_font_color', array(
		'default' => '#404040',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_body_font_size', array(
		'default' => '20',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading1_font_size', array(
		'default' => '40',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading2_font_size', array(
		'default' => '30',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading3_font_size', array(
		'default' => '23',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading4_font_size', array(
		'default' => '20',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading5_font_size', array(
		'default' => '17',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading6_font_size', array(
		'default' => '14',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_nav_menu_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_button_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_nav_menu_font_transformation', array(
		'default' => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_nav_menu_font_size', array(
		'default' => '16',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_widget_text_font_size', array(
		'default' => '14',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_widget_heading_font_size', array(
		'default' => '16',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading_link_font_size', array(
		'default' => '30',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'site_title_size', array(
		'default' => '42',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'site_description_font_size', array(
		'default' => '16',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_link_font', array(
		'default' => 'Helvetica',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_site_full_width_or_contained', array(
		'default' => 'full_width',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
		
	$wp_customize->add_setting( 'np_site_background_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_body_background_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_site_title_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_site_border_size' , array(
		'default'   => '0',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_site_border_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_site_shadow_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_header_background_color' , array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	

	$wp_customize->add_setting( 'np_header_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_menu_link_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_footer_link_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_footer_text_color' , array(
		'default'   => '#404040',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_footer_link_hover_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_menu_link_hover_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_link_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_link_hover_color' , array(
		'default'   => '#4aabc9',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_link_text_decoration' , array(
		'default'   => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	
	$wp_customize->add_setting( 'np_link_hover_text_decoration' , array(
		'default'   => 'underline',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_content_link_text_decoration' , array(
		'default'   => 'underline',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	
	$wp_customize->add_setting( 'np_content_link_hover_text_decoration' , array(
		'default'   => 'underline',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_entry_title_link_text_decoration' , array(
		'default'   => 'none',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	
	$wp_customize->add_setting( 'np_entry_title_link_hover_text_decoration' , array(
		'default'   => 'underline',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading_color' , array(
		'default'   => '#404040',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading_link_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_heading_link_hover_color' , array(
		'default'   => '#1e73be',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_site_description_color' , array(
		'default'   => '#404040',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_button_background_color' , array(
		'default'   => '#2f4d80',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_button_hover_background_color' , array(
		'default'   => '#4075cb',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );


	$wp_customize->add_setting( 'np_button_text_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_button_hover_text_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	
	$wp_customize->add_setting( 'np_footer_background_color' , array(
		'default'   => '#fbfbfb',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_footer_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );
	
	$wp_customize->add_setting( 'np_widget_background_color' , array(
		'default'   => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_widget_shadow' , array(
		'default'   => '#000000',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_header_height', array(
		'default' => 'auto',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_footer_height', array(
		'default' => 'auto',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_inline_the_css', array(
		'default' => 'yes',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_setting( 'np_inline_navigation_js', array(
		'default' => 'yes',
		'transport' => 'refresh',
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_site_background_color', array(
		'label'      => __( 'Site Background Color', 'nimblepress' ),
		'description' => __( 'The site-wide background color. Affects all areas that are in between the header and footer.', 'nimblepress' ),
		'section'    => 'colors',
		'priority'              => 11,
		'settings'   => 'np_site_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_body_background_color', array(
		'label'      => __( 'Content body Background Color', 'nimblepress' ),
		'description' => __( 'Background color for the main content area', 'nimblepress' ),
		'section'    => 'colors',
		'priority'              => 12,
		'settings'   => 'np_body_background_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_body_font_color', array(
		'label'      => __( 'Body Font Color', 'nimblepress' ),
		'description' => __( 'Color for the main font that is used in content areas', 'nimblepress' ),
		'section'    => 'colors',
		'priority'              => 13,
		'settings'   => 'np_body_font_color',
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
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_link_color', array(
		'label'      => __( 'Link Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Color for links across the site', 'nimblepress' ),
		'settings'   => 'np_link_color',
		'priority'              => 18,
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_link_hover_color', array(
		'label'      => __( 'Link Hover Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Hover color for links across the site', 'nimblepress' ),
		'settings'   => 'np_link_hover_color',
		'priority'              => 19,
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_heading_link_color', array(
		'label'      => __( 'Heading Link Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Color for heading links in post listings', 'nimblepress' ),
		'settings'   => 'np_heading_link_color',
		'priority'              => 19,
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_heading_link_hover_color', array(
		'label'      => __( 'Heading Link Hover Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Hover color for heading links in post listings', 'nimblepress' ),
		'settings'   => 'np_heading_link_hover_color',
		'priority'              => 19,
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_button_background_color', array(
		'label'      => __( 'Button Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The background color for buttons.', 'nimblepress' ),
		'settings'   => 'np_button_background_color',
		'priority'              => 20,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_button_hover_background_color', array(
		'label'      => __( 'Button Hover Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The background color for buttons when hovered.', 'nimblepress' ),
		'settings'   => 'np_button_hover_background_color',
		'priority'              => 21,
	) ) );
	
	

	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_button_text_color', array(
		'label'      => __( 'Button Text Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The color for the text on the buttons.', 'nimblepress' ),
		'settings'   => 'np_button_text_color',
		'priority'              => 22,
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_button_hover_text_color', array(
		'label'      => __( 'Button Hover Text Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'The color for the text on the buttons when hovered.', 'nimblepress' ),
		'settings'   => 'np_button_hover_text_color',
		'priority'              => 23,
	) ) );

	
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_menu_link_color', array(
		'label'      => __( 'Menu Link Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Colors of link text in the header menu.', 'nimblepress' ),
		'settings'   => 'np_menu_link_color',
		'priority'              => 23,
	) ) );
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_menu_link_hover_color', array(
		'label'      => __( 'Menu Link Hover Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Colors of link text in the header menu when hovered.', 'nimblepress' ),
		'settings'   => 'np_menu_link_hover_color',
		'priority'              => 23,
	) ) );
	
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_heading_color', array(
		'label'      => __( 'Heading Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Color for the headings across the site.', 'nimblepress' ),
		'settings'   => 'np_heading_color',
		'priority'              => 23,
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_footer_background_color', array(
		'label'      => __( 'Footer Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Background color of the footer', 'nimblepress' ),
		'settings'   => 'np_footer_background_color',
		'priority'              => 25,
	) ) );

	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_footer_text_color', array(
		'label'      => __( 'Footer Text Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Color of the text in the footer', 'nimblepress' ),
		'settings'   => 'np_footer_text_color',
		'priority'              => 25,
	) ) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_footer_link_color', array(
		'label'      => __( 'Footer Link Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Color of the links in the footer', 'nimblepress' ),
		'settings'   => 'np_footer_link_color',
		'priority'              => 25,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_footer_link_hover_color', array(
		'label'      => __( 'Footer Hover Link Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Color of the links in the footer when hovered', 'nimblepress' ),
		'settings'   => 'np_footer_link_hover_color',
		'priority'              => 25,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_footer_shadow', array(
		'label'      => __( 'Footer Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Shadow for the footer. Set to your site or body color to make disappear.', 'nimblepress' ),
		'settings'   => 'np_footer_shadow',
		'priority'              => 26,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_widget_background_color', array(
		'label'      => __( 'Widget Background Color', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Background color for the individual widgets.', 'nimblepress' ),
		'settings'   => 'np_widget_background_color',
		'priority'              => 27,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'np_widget_shadow', array(
		'label'      => __( 'Widget Shadow', 'nimblepress' ),
		'section'    => 'colors',
		'description' => __( 'Shadow for the widgets. Set to your site or body color to make disappear.', 'nimblepress' ),
		'settings'   => 'np_widget_shadow',
		'priority'              => 28,
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
	
	$wp_customize->add_control( 
		new WP_Customize_Control(
			$wp_customize,
			'np_inline_navigation_js',
			array(
					'label'          => __( 'Inline navigation JavaScript', 'nimblepress' ),
					'section'        => 'np_misc',
					'settings'       => 'np_inline_navigation_js',
					'description' => __( 'Loads the already small theme navigation JavaScript inline and makes the site faster by avoiding one extra call and script load time', 'nimblepress' ),
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

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_body_font_size',
			array(
				'label'          => __( 'Body Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size of the body text font across the site, like in post content', 'nimblepress' ),
				'settings'       => 'np_body_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

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

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_heading1_font_size',
			array(
				'label'          => __( 'Heading 1 (H1) Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size of the main headings across the site, like in post heading', 'nimblepress' ),
				'settings'       => 'np_heading1_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_heading2_font_size',
			array(
				'label'          => __( 'Heading 2 (H2) Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size of the H2 headings across the site, like in post heading', 'nimblepress' ),
				'settings'       => 'np_heading2_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_heading3_font_size',
			array(
				'label'          => __( 'Heading 3 (H3) Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size of the H3 headings across the site, like in post heading', 'nimblepress' ),
				'settings'       => 'np_heading3_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_heading4_font_size',
			array(
				'label'          => __( 'Heading 4 (H4) Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size of the H4 headings across the site, like in post heading', 'nimblepress' ),
				'settings'       => 'np_heading4_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_heading5_font_size',
			array(
				'label'          => __( 'Heading 5 (H5) Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size of the H5 headings across the site, like in post heading', 'nimblepress' ),
				'settings'       => 'np_heading5_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_heading6_font_size',
			array(
				'label'          => __( 'Heading 6 (H6) Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size of the H6 headings across the site, like in post heading', 'nimblepress' ),
				'settings'       => 'np_heading6_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

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
			'np_nav_menu_font_transformation', //Set a unique ID for the control
			array(
				'label'      => __( 'Nav Menu Link Text Transformation', 'nimblepress' ),
				'description' => __( 'Makes nav menu link text uppercase, lowercase, capitalized and so on', 'nimblepress' ),
				'settings'   => 'np_nav_menu_font_transformation',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_text_transformations()
			)
	) );
	

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_nav_menu_font_size',
			array(
				'label'          => __( 'Nav Menu Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size the font in the nav menu links in the top nav bar', 'nimblepress' ),
				'settings'       => 'np_nav_menu_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

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

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_link_text_decoration', //Set a unique ID for the control
			array(
				'label'      => __( 'Link Text Decoration', 'nimblepress' ),
				'description' => __( 'Decoration for the links across the site', 'nimblepress' ),
				'settings'   => 'np_link_text_decoration',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_text_decorations()
			)
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_link_hover_text_decoration', //Set a unique ID for the control
			array(
				'label'      => __( 'Link Hover Text Decoration', 'nimblepress' ),
				'description' => __( 'Decoration for the links across the site when hovered', 'nimblepress' ),
				'settings'   => 'np_link_hover_text_decoration',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_text_decorations()
			)
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_entry_title_link_text_decoration', //Set a unique ID for the control
			array(
				'label'      => __( 'Heading Link Text Decoration', 'nimblepress' ),
				'description' => __( 'Decoration for the post headings links in post listings', 'nimblepress' ),
				'settings'   => 'np_entry_title_link_text_decoration',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_text_decorations()
			)
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_heading_link_font_size',
			array(
				'label'          => __( 'Heading Link (H1) Font size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size of the H1 headings that appear as links in post listings', 'nimblepress' ),
				'settings'       => 'np_heading_link_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_entry_title_link_hover_text_decoration', //Set a unique ID for the control
			array(
				'label'      => __( 'Heading Link Hover Text Decoration', 'nimblepress' ),
				'description' => __( 'Decoration for the post headings links in post listings when hovered', 'nimblepress' ),
				'settings'   => 'np_entry_title_link_hover_text_decoration',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_text_decorations()
			)
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_content_link_text_decoration', //Set a unique ID for the control
			array(
				'label'      => __( 'In-content Links Text Decoration', 'nimblepress' ),
				'description' => __( 'Decoration for the the links in post contents and text widget contents', 'nimblepress' ),
				'settings'   => 'np_content_link_text_decoration',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_text_decorations()
			)
	) );

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_content_link_hover_text_decoration', //Set a unique ID for the control
			array(
				'label'      => __( 'In-content Links Hover Text Decoration', 'nimblepress' ),
				'description' => __( 'Decoration for the the links in post contents and text widget contents when hovered', 'nimblepress' ),
				'settings'   => 'np_content_link_hover_text_decoration',
				'priority'   => 10,
				'section'    => 'np_fonts',
				'type'    => 'select',
				'choices' => nimblepress_get_text_decorations()
			)
	) );
	


	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_widget_text_font_size',
			array(
				'label'          => __( 'Widget Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size the font in the widgets in general', 'nimblepress' ),
				'settings'       => 'np_widget_text_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'np_widget_heading_font_size',
			array(
				'label'          => __( 'Widget Heading Font Size', 'nimblepress' ),
				'section'        => 'np_fonts',
				'description' => __( 'The size the font of the widget headings', 'nimblepress' ),
				'settings'       => 'np_widget_heading_font_size',
				'type'           => 'text',
			'priority'              => 10,
			)
		)
	);
	

	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize, //Pass the $wp_customize object (required)
			'np_button_font', //Set a unique ID for the control
			array(
				'label'      => __( 'Button Font', 'nimblepress' ),
				'description' => __( 'Font for buttons', 'nimblepress' ),
				'settings'   => 'np_button_font',
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
