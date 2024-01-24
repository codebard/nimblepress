<?php
/**
 * nimblepress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nimblepress
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nimblepress_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on nimblepress, use a find and replace
		* to change 'nimblepress' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'nimblepress', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'nimblepress' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'nimblepress_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'nimblepress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nimblepress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nimblepress_content_width', 640 );
}
add_action( 'after_setup_theme', 'nimblepress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nimblepress_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nimblepress' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nimblepress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nimblepress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nimblepress_scripts() {
	// wp_enqueue_style( 'nimblepress-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'nimblepress-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nimblepress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nimblepress_scripts' );

/**
 * Read more buttons
 */
function nimblepress_get_read_more_button() {
	return '<a class="read-more" href="'. get_permalink( get_the_ID() ) .'">'. __( 'Read More', 'nimblepress' ) .'</a>';
}

/**
 * Change [...] in excerpts to ...
 */
 
function nimblepress_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'nimblepress_excerpt_more' );


/**
 * Convert hex color to RGB
 */
 
function nimblepress_hex_to_rgb( $hex ) {

	$split_hex = str_split(str_replace( '#', '', $hex ), 2);
	$r = hexdec($split_hex[0]);
	$g = hexdec($split_hex[1]);
	$b = hexdec($split_hex[2]);
	return $r .  ',' .$g . ',' . $b;
}


/**
 * Register footer widget area
 */
 
function register_widget_areas() {

register_sidebar( array(
	'name'          => 'Footer',
	'id'            => 'footer_widgets',
	'description'   => 'Put your footer widgets here',
	'before_widget' => '<section class="footer-widget">',
	'after_widget'  => '</section>',
	'before_title'  => '',
	'after_title'   => '',
));

}

add_action( 'widgets_init', 'register_widget_areas' );


/**
 * Print customizer styles
 */
 
function nimblepress_customizer_styles()
{

    ?>
         <style type="text/css">
			 #page {
					<?php if ( get_theme_mod('np_site_full_width_or_contained', 'full_width') == 'contained' ): ?>
					max-width : <?php echo get_theme_mod('np_site_width', '1200'); ?>px;
					<?php endif ?>
					<?php if ( get_theme_mod('site_background_color', '') != '' ): ?>
						background-color: <?php echo get_theme_mod('site_background_color', ''); ?>;
					<?php endif ?>
					<?php if ( get_theme_mod('site_border_size', '') != '0' ): ?>
						border: <?php echo get_theme_mod('site_border_size', '0'); ?>px solid <?php echo get_theme_mod('site_border_color', '#ffffff'); ?>;
					<?php endif ?>
					<?php if ( get_theme_mod('site_shadow_color', '#ffffff') != '' ): ?>
						box-shadow: 0 2px 8px 2px rgba(<?php echo nimblepress_hex_to_rgb( get_theme_mod( 'site_shadow_color', '#ffffff' ) )  ?>,0.1);
					<?php endif ?>
			 }
			 #main-content {
					max-width : <?php echo get_theme_mod('np_site_width', '1200'); ?>px;
					<?php if ( get_theme_mod('site_background_color', '') != '' ): ?>
						background-color: <?php echo get_theme_mod('body_background_color', ''); ?>;
					<?php endif ?>
			 }
			 .site-header-wrapper {
					max-width : <?php echo get_theme_mod('np_site_width', '1200'); ?>px;
			 }
			 .footer-wrapper {
					max-width : <?php echo get_theme_mod('np_site_width', '1200'); ?>px;
			 }
			 .site-header {
					background-color: <?php echo get_theme_mod('header_background_color', '#fbfbfb'); ?>;
					box-shadow: 0 1px 8px 1px rgba(<?php echo nimblepress_hex_to_rgb( get_theme_mod( 'header_shadow', '#000000' ) )  ?>,0.08);
					<?php if ( get_theme_mod('np_header_height', 'auto') != 'auto' ): ?>
						min-height : <?php echo get_theme_mod('np_header_height', 'auto'); ?>px;
					<?php endif ?>
			 }
			 .site-footer {
					background-color: <?php echo get_theme_mod('footer_background_color', '#fbfbfb'); ?>;
					box-shadow: 0 -1px 8px 1px rgba(<?php echo nimblepress_hex_to_rgb( get_theme_mod( 'footer_shadow', '#000000' ) )  ?>,0.08);
					<?php if ( get_theme_mod('np_footer_height', 'auto') != 'auto' ) : ?>
						min-height : <?php echo get_theme_mod('np_footer_height', 'auto'); ?>px;
					<?php endif ?>
			 }
			 .widget {
					background-color: <?php echo get_theme_mod('np_widget_background_color', '#ffffff'); ?>;
					box-shadow: 0px 1px 8px rgba(<?php echo nimblepress_hex_to_rgb( get_theme_mod( 'nb_widget_shadow', '#000000' ) )  ?>, 0.08);
			 }
         </style>
    <?php
}
add_action( 'wp_head', 'nimblepress_customizer_styles');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

