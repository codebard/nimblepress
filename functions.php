<?php
/**
 * nimblepress functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nimblepress
 */

if ( ! defined( 'NIMBLEPRESS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'NIMBLEPRESS_VERSION', '1.0.0' );
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


	// Block style support
	add_theme_support( 'wp-block-styles' );

	// Wide block support
	add_theme_support( 'align-wide' );

	// Responsive embed support
	add_theme_support( 'responsive-embeds' );

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
 * Enqueue the few admin styles
 */
 
 
function nimblepress_admin_css() {

	echo '<style>';
	
		include get_template_directory() . '/admin-styles.css';
	
	echo '</style>';

}
 
 add_action( 'admin_head', 'nimblepress_admin_css' );
 
 
/**
 * Enqueue scripts and styles.
 */
 
function nimblepress_scripts() {
	
	if ( get_theme_mod('np_inline_the_css', 'yes') != 'yes' ) {
		wp_enqueue_style( 'nimblepress-style', get_stylesheet_uri(), array(), NIMBLEPRESS_VERSION );
		wp_style_add_data( 'nimblepress-style', 'rtl', 'replace' );
	}

	wp_enqueue_script( 'nimblepress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), NIMBLEPRESS_VERSION, true );

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
 * List of web-safe fonts
 */
 
function nimblepress_get_web_safe_fonts() {

	return array(
		'Helvetica' => 'Helvetica',
		'Arial' => 'Arial',
		'Verdana' => 'Verdana',
		'Tahoma' => 'Tahoma',
		'Trebuchet MS' => 'Trebuchet MS',
		'Times New Roman' => 'Times New Roman',
		'Georgia' => 'Georgia',
		'Garamond' => 'Garamond',
		'Courier New' => 'Courier New',
		'Brush Script MT' => 'Brush Script MT',
	
	);

}


/**
 * Add NP meta boxes
 */
 

function nimblepress_add_metabox() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	global $post;

	$post_types = get_post_types( array( 'public' => true ) );

	foreach ( $post_types as $type ) {
		if ( 'attachment' !== $type ) {
			add_meta_box(
				'nimblepress_metabox',
				esc_html( __( 'Layout', 'nimblepress' ) ),
				'nimblepress_gen_metabox',
				$type,
				'side'
			);
		}
	}
}

add_action( 'add_meta_boxes', 'nimblepress_add_metabox' );

/**
 * NP meta box
 */
 

function nimblepress_gen_metabox( $post ) {

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	
	
	$default_post_meta = nimblepress_get_default_post_meta();
	
	$post_meta = get_post_meta( $post->ID, 'nimblepress_post_meta', true );
	
	if  ( $post_meta AND $post_meta != '' ) {
		$post_meta = json_decode ( $post_meta, true );
	}
	
	if ( !( is_array( $post_meta ) AND count( $post_meta ) > 0 ) ) {
		
		$post_meta = $default_post_meta;
	}

	echo '<div class="nimblepress_post_meta_entry">';
		echo '<div class="nimblepress_post_meta_entry_title">';
			echo __( 'Header', 'nimblepress' );
		echo '</div>';
		echo '<div class="nimblepress_post_meta_entry_value">';
			echo '<select name="nimblepress_post_meta[header]">';
				echo '<option value="show" ' . ( ( $post_meta['header'] == 'show' ) ? ('selected') : ('') ) . '>' . __( 'Show', 'nimblepress' ) . '</option>';
				echo '<option value="hide" ' . ( ( $post_meta['header'] == 'hide' ) ? ('selected') : ('') ) . '>' . __( 'Hide', 'nimblepress' ) . '</option>';
			echo '</select>';
		echo '</div>';
	echo '</div>';

	echo '<div class="nimblepress_post_meta_entry">';
		echo '<div class="nimblepress_post_meta_entry_title">';
			echo __( 'Nav Menu', 'nimblepress' );
		echo '</div>';
		echo '<div class="nimblepress_post_meta_entry_value">';
			echo '<select name="nimblepress_post_meta[nav_menu]">';
				echo '<option value="show" ' . ( ( $post_meta['nav_menu'] == 'show' ) ? ('selected') : ('') ) . '>' . __( 'Show', 'nimblepress' ) . '</option>';
				echo '<option value="hide" ' . ( ( $post_meta['nav_menu'] == 'hide' ) ? ('selected') : ('') ) . '>' . __( 'Hide', 'nimblepress' ) . '</option>';
			echo '</select>';
		echo '</div>';
	echo '</div>';

	echo '<div class="nimblepress_post_meta_entry">';
		echo '<div class="nimblepress_post_meta_entry_title">';
			echo __( 'Sidebar', 'nimblepress' );
		echo '</div>';
		echo '<div class="nimblepress_post_meta_entry_value">';
			echo '<select name="nimblepress_post_meta[sidebar]">';
				echo '<option value="show" ' . ( ( $post_meta['sidebar'] == 'show' ) ? ('selected') : ('') ) . '>' . __( 'Show', 'nimblepress' ) . '</option>';
				echo '<option value="hide" ' . ( ( $post_meta['sidebar'] == 'hide' ) ? ('selected') : ('') ) . '>' . __( 'Hide', 'nimblepress' ) . '</option>';
			echo '</select>';
		echo '</div>';
	echo '</div>';

	echo '<div class="nimblepress_post_meta_entry">';
		echo '<div class="nimblepress_post_meta_entry_title">';
			echo __( 'Title', 'nimblepress' );
		echo '</div>';
		echo '<div class="nimblepress_post_meta_entry_value">';
			echo '<select name="nimblepress_post_meta[title]">';
				echo '<option value="show" ' . ( ( $post_meta['title'] == 'show' ) ? ('selected') : ('') ) . '>' . __( 'Show', 'nimblepress' ) . '</option>';
				echo '<option value="hide" ' . ( ( $post_meta['title'] == 'hide' ) ? ('selected') : ('') ) . '>' . __( 'Hide', 'nimblepress' ) . '</option>';
			echo '</select>';
		echo '</div>';
	echo '</div>';

	echo '<div class="nimblepress_post_meta_entry">';
		echo '<div class="nimblepress_post_meta_entry_title">';
			echo __( 'Post Navigation', 'nimblepress' );
		echo '</div>';
		echo '<div class="nimblepress_post_meta_entry_value">';
			echo '<select name="nimblepress_post_meta[post_nav]">';
				echo '<option value="show" ' . ( ( $post_meta['post_nav'] == 'show' ) ? ('selected') : ('') ) . '>' . __( 'Show', 'nimblepress' ) . '</option>';
				echo '<option value="hide" ' . ( ( $post_meta['post_nav'] == 'hide' ) ? ('selected') : ('') ) . '>' . __( 'Hide', 'nimblepress' ) . '</option>';
			echo '</select>';
		echo '</div>';
	echo '</div>';

	echo '<div class="nimblepress_post_meta_entry">';
		echo '<div class="nimblepress_post_meta_entry_title">';
			echo __( 'Post Metadata', 'nimblepress' );
		echo '</div>';
		echo '<div class="nimblepress_post_meta_entry_value">';
			echo '<select name="nimblepress_post_meta[post_metadata]">';
				echo '<option value="show" ' . ( ( $post_meta['post_metadata'] == 'show' ) ? ('selected') : ('') ) . '>' . __( 'Show', 'nimblepress' ) . '</option>';
				echo '<option value="hide" ' . ( ( $post_meta['post_metadata'] == 'hide' ) ? ('selected') : ('') ) . '>' . __( 'Hide', 'nimblepress' ) . '</option>';
			echo '</select>';
		echo '</div>';
	echo '</div>';

	echo '<div class="nimblepress_post_meta_entry">';
		echo '<div class="nimblepress_post_meta_entry_title">';
			echo __( 'Comments', 'nimblepress' );
		echo '</div>';
		echo '<div class="nimblepress_post_meta_entry_value">';
			echo '<select name="nimblepress_post_meta[comments]">';
				echo '<option value="show" ' . ( ( $post_meta['comments'] == 'show' ) ? ('selected') : ('') ) . '>' . __( 'Show', 'nimblepress' ) . '</option>';
				echo '<option value="hide" ' . ( ( $post_meta['comments'] == 'hide' ) ? ('selected') : ('') ) . '>' . __( 'Hide', 'nimblepress' ) . '</option>';
			echo '</select>';
		echo '</div>';
	echo '</div>';

	echo '<div class="nimblepress_post_meta_entry">';
		echo '<div class="nimblepress_post_meta_entry_title">';
			echo __( 'Footer', 'nimblepress' );
		echo '</div>';
		echo '<div class="nimblepress_post_meta_entry_value">';
			echo '<select name="nimblepress_post_meta[footer]">';
				echo '<option value="show" ' . ( ( $post_meta['footer'] == 'show' ) ? ('selected') : ('') ) . '>' . __( 'Show', 'nimblepress' ) . '</option>';
				echo '<option value="hide" ' . ( ( $post_meta['footer'] == 'hide' ) ? ('selected') : ('') ) . '>' . __( 'Hide', 'nimblepress' ) . '</option>';
			echo '</select>';
		echo '</div>';
	echo '</div>';
	
	
	wp_nonce_field('nimblepress_save_post_meta', 'nimblepress_save_post_meta_nonce');
	
}

/**
 * Registers the meta
 *
 */
 
function nimblepress_register_post_meta() {
	
	$post_types = get_post_types( array( 'public' => true ) );
	
	foreach ( $post_types as $key => $value ) {
		
		register_meta( 'post', 'nimblepress_post_meta', array(
			'show_in_rest' => true,
			'type' => 'string',
			'single' => true,
			'sanitize_callback' => '',
			'auth_callback' => function() {
				return current_user_can( 'edit_posts' );
			}
		) );
	}
}

add_action('init', 'nimblepress_register_post_meta');


/**
* NP post meta defaults
*/

function nimblepress_get_default_post_meta() {
	
	return array (
		'sidebar' => 'show',
		'title' => 'show',
		'footer' => 'show',
		'header' => 'show',
		'nav_menu' => 'show',
		'comments' => 'show',
		'post_nav' => 'show',
	
	);
	
}


/**
 * NP save post meta 
 */
 

function nimblepress_save_post_meta( $post_id, $post ) {


	/* Verify the nonce before proceeding. \*/
	if ( !isset( $_POST['nimblepress_save_post_meta_nonce'] ) OR !wp_verify_nonce( $_POST['nimblepress_save_post_meta_nonce'], 'nimblepress_save_post_meta' ) ) {
		return $post_id;
	}

	// check autosave
	if ( wp_is_post_autosave( $post_id ) )
	return 'autosave';

	//check post revision
	if ( wp_is_post_revision( $post_id ) )
	return 'revision';

	// check permissions

	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return 'cannot edit page';
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return 'cannot edit post';
	}
	
	$post_meta = $_POST['nimblepress_post_meta'];

	foreach ( $post_meta as $key => $value ) {
		$post_meta[$key] = sanitize_text_field( $post_meta[$key] );
	}

	update_post_meta( $post_id, 'nimblepress_post_meta', json_encode( $post_meta ) );

}

add_action( 'save_post', 'nimblepress_save_post_meta', 10, 2 );
add_action( 'new_to_publish', 'nimblepress_save_post_meta', 10, 2 );


function nimblepress_get_post_meta_value( $post, $meta ) {
		
	if ( !( $post AND isset( $post->ID ) ) ) {
		return false;
	}
		
	$nimblepress_post_meta = get_post_meta( $post->ID, 'nimblepress_post_meta', true );
	
	if ( $nimblepress_post_meta AND $nimblepress_post_meta != '' ) {
		$nimblepress_post_meta = json_decode( $nimblepress_post_meta, true );
		if (is_array ( $nimblepress_post_meta ) AND count( $nimblepress_post_meta ) > 0 AND isset( $nimblepress_post_meta[$meta] )  ) {
			
			return $nimblepress_post_meta[$meta];
		}
	}
	
	return false;
	
}


/**
 * Register footer widget area
 */
 
function nimblepress_register_widget_areas() {

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

add_action( 'widgets_init', 'nimblepress_register_widget_areas' );


/**
 * Print customizer styles
 */
 
function nimblepress_customizer_styles()
{


	global $post;

	if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
		
		$nimblepress_hide_title = False;
		$nimblepress_title_status = nimblepress_get_post_meta_value( $post, 'title' );
		if ( $nimblepress_title_status AND $nimblepress_title_status == 'hide' ) {
			$nimblepress_hide_title = True;
		}
	}

    ?>
         <style type="text/css">
			body {
				font-family: <?php echo esc_html( get_theme_mod('np_body_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			}
			h1, h2, h3, h4, h5, h6 {
				font-family: <?php echo esc_html( get_theme_mod('np_heading_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			}
			.nav-menu a:link, .nav-menu a:active, .nav-menu a:visited, .nav-menu a:hover {
				font-family: <?php echo esc_html( get_theme_mod('np_nav_menu_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			}
			a:link, a:active, a:visited, a:hover {
				font-family: <?php echo esc_html( get_theme_mod('np_link_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			}
			#page {
				<?php if ( esc_html( get_theme_mod( 'np_site_full_width_or_contained', 'full_width' ) ) == 'contained' ): ?>
				max-width : <?php echo esc_html( get_theme_mod('np_site_width', '1200') ); ?>px;
				<?php endif ?>
				<?php if ( esc_html( get_theme_mod('site_background_color', '') ) != '' ): ?>
					background-color: <?php echo esc_html( get_theme_mod('site_background_color', '') ); ?>;
				<?php endif ?>
				<?php if ( esc_html( get_theme_mod( 'site_border_size', '' ) ) != '0' ): ?>
					border: <?php echo esc_html( get_theme_mod('site_border_size', '0') ); ?>px solid <?php echo esc_html( get_theme_mod('site_border_color', '#ffffff') ); ?>;
				<?php endif ?>
				<?php if ( esc_html( get_theme_mod('site_shadow_color', '#ffffff' ) ) != '' ): ?>
					box-shadow: 0 2px 8px 2px rgba(<?php echo esc_html( nimblepress_hex_to_rgb( get_theme_mod( 'site_shadow_color', '#ffffff' ) ) );  ?>,0.1);
				<?php endif ?>
			}
			#main-content {
				max-width : <?php echo esc_html( get_theme_mod('np_site_width', '1200') ); ?>px;
				<?php if ( esc_html( get_theme_mod('site_background_color', '') ) != '' ): ?>
					background-color: <?php echo esc_html( get_theme_mod('body_background_color', '') ); ?>;
				<?php endif ?>
			}
			.site-header-wrapper {
				max-width : <?php echo esc_html( get_theme_mod('np_site_width', '1200') ); ?>px;
			}
			.footer-wrapper {
				max-width : <?php echo esc_html( get_theme_mod('np_site_width', '1200') ); ?>px;
			}
			.site-header {
				background-color: <?php echo esc_html( get_theme_mod('header_background_color', '#fbfbfb') ); ?>;
				box-shadow: 0 1px 8px 1px rgba(<?php echo nimblepress_hex_to_rgb( get_theme_mod( 'header_shadow', '#000000' ) ) ?>,0.08);
				<?php if ( esc_html( get_theme_mod('np_header_height', 'auto') ) != 'auto' ): ?>
					min-height : <?php echo esc_html( get_theme_mod( 'np_header_height', 'auto' ) ); ?>px;
				<?php endif ?>
			}
			.site-footer {
				background-color: <?php echo esc_html( get_theme_mod('footer_background_color', '#fbfbfb') ); ?>;
				box-shadow: 0 -1px 8px 1px rgba(<?php echo nimblepress_hex_to_rgb( esc_html( get_theme_mod( 'footer_shadow', '#000000' ) ) ) ?>,0.08);
				<?php if ( esc_html( get_theme_mod('np_footer_height', 'auto') ) != 'auto' ) : ?>
					min-height : <?php echo esc_html( get_theme_mod('np_footer_height', 'auto') ); ?>px;
				<?php endif ?>
			}
			.widget {
				background-color: <?php echo esc_html( get_theme_mod('np_widget_background_color', '#ffffff') ); ?>;
				box-shadow: 0px 1px 8px rgba(<?php echo esc_html( nimblepress_hex_to_rgb( get_theme_mod( 'nb_widget_shadow', '#000000' ) ) ) ?>, 0.08);
			}
			
			<?php
				if( $nimblepress_hide_title ):
			?>
				#main-content {
					padding-top: 0px;
				}
				.entry-content {
					margin-top: 0px;
				}
			
			<?php
				endif;
			?>
				
			
         </style>
    <?php
}
add_action( 'wp_head', 'nimblepress_customizer_styles');


/**
 * Nav menu class related
*/


function nimblepress_add_css_classes_to_nav_menu( $classes, $item, $args, $depth ) {

	$classes = array_filter( get_post_meta( $item->ID, '_menu_item_classes', true ) );

	$classes[] = "has-submenu";
	
	return $classes;

}


function nimblepress_chevron_to_nav_menu( $item_output, $item, $depth, $args ) {

	$icon = '';
	// add_action( 'nav_menu_css_class', 'nimblepress_add_css_classes_to_nav_menu', 10, 4 );

    if ( !empty( $item->classes ) && in_array( 'menu-item-has-children', $item->classes ) ) {
		$icon = '<svg width="1em" height="1em" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="m5 6l5 5l5-5l2 1l-7 7l-7-7z"/></svg>';
    }

    return '<div class="nimblepress-menu-item-wrapper"><div class="nimblepress-menu-link">' . $item_output . '</div><div class="nimblepress-arrow-icon">' . $icon . '</div></div>';

}


add_filter( 'walker_nav_menu_start_el', 'nimblepress_chevron_to_nav_menu', 10, 4 );


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

