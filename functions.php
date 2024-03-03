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
	define( 'NIMBLEPRESS_VERSION', '1.0.9' );
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

	/**
	 * Add Gutenberg support
	 *
	 */
	add_theme_support( 'block-template-parts' );
	
	

	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_attr__( 'Strong magenta', 'nimblepress' ),
			'slug'  => 'strong-magenta',
			'color' => '#a156b4',
		),
		array(
			'name'  => esc_attr__( 'Light grayish magenta', 'nimblepress' ),
			'slug'  => 'light-grayish-magenta',
			'color' => '#d0a5db',
		),
		array(
			'name'  => esc_attr__( 'Very light gray', 'nimblepress' ),
			'slug'  => 'very-light-gray',
			'color' => '#eee',
		),
		array(
			'name'  => esc_attr__( 'Very dark gray', 'nimblepress' ),
			'slug'  => 'very-dark-gray',
			'color' => '#444',
		),
	) );
	
	
	add_theme_support(
		'editor-gradient-presets',
		array(
			array(
				'name'     => esc_attr__( 'Vivid cyan blue to vivid purple', 'nimblepress' ),
				'gradient' => 'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
				'slug'     => 'vivid-cyan-blue-to-vivid-purple'
			),
			array(
				'name'     => esc_attr__( 'Vivid green cyan to vivid cyan blue', 'nimblepress' ),
				'gradient' => 'linear-gradient(135deg,rgba(0,208,132,1) 0%,rgba(6,147,227,1) 100%)',
				'slug'     =>  'vivid-green-cyan-to-vivid-cyan-blue',
			),
			array(
				'name'     => esc_attr__( 'Light green cyan to vivid green cyan', 'nimblepress' ),
				'gradient' => 'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
				'slug'     => 'light-green-cyan-to-vivid-green-cyan',
			),
			array(
				'name'     => esc_attr__( 'Luminous vivid amber to luminous vivid orange', 'nimblepress' ),
				'gradient' => 'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
				'slug'     => 'luminous-vivid-amber-to-luminous-vivid-orange',
			),
			array(
				'name'     => esc_attr__( 'Luminous vivid orange to vivid red', 'nimblepress' ),
				'gradient' => 'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
				'slug'     => 'luminous-vivid-orange-to-vivid-red',
			),
		)
	);
	
	add_theme_support( 'custom-line-height' );
	add_theme_support( 'custom-units', array() );
	add_theme_support( 'custom-spacing' );
	add_theme_support( 'appearance-tools' );
	add_theme_support( 'border' );
	add_theme_support( 'link-color' );
	
	
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
 * Inline the css so it loads without a call and is not render blocking
 */


function nimblepress_inline_css() {
	 if (get_theme_mod('np_inline_the_css', 'yes') == 'yes') {
		 ?>
		<style>
			<?php include ( get_template_directory() . '/style.css' ); ?>
		</style>
		<style>
			<?php include ( 'wp-includes/css/dist/block-library/style.min.css' ); ?>
		</style>
		<?php
	 }
}

add_action( 'nimblepress_head', 'nimblepress_inline_css' );



function nimblepress_admin_notices() {
	
	$date_activated = get_option( 'nimblepress_date_activated' );

	if ( $date_activated === false ) {
		update_option( 'nimblepress_date_activated', time() );
	}
	else {
		if ( get_option( 'nimblepress_upsell_shown' ) === false AND ( time() - $date_activated ) > ( 60 * 60 * 24 * 30 ) AND !defined( 'NIMBLEPRESS_PREMIUM' ) ) {

		?>
		
			<div class="notice notice-success is-dismissible nimblepress-notice" id="nimblepress-addon-upsell" nimblepress_nonce_addon_notice_shown="<?php echo wp_create_nonce('nimblepress_nonce_addon_notice_shown'); ?>"><p><div style="display: flex; flex-wrap: wrap; flex-direction: row;"><a href="https://codebard.com/nimblepress-premium?utm_source=<?php urlencode( site_url())?>&utm_medium=nimblepress_free&utm_campaign=&utm_content=nimblepress_admin_upsell_notice&utm_term="><img class="nimblepress_upsell" src="<?php echo get_stylesheet_directory_uri()  ?>/img/nimblepress-logo.jpg" style="width:128px; height:128px;margin: 10px; margin-right: 20px;" alt="NimblePress Premium" /></a><div style="max-width: 700px; width: 100%;"><div style="max-width:550px; width: auto; float:left; display:inline-box"><a href="https://codebard.com/nimblepress-premium?utm_source=<?php urlencode( site_url())?>&utm_medium=nimblepress_free&utm_campaign=&utm_content=nimblepress_admin_upsell_notice&utm_term="><h2 style="margin-top: 0px; font-size: 150%; font-weight: bold;line-height: 1.2em;">Upgrade your NimblePress Theme to Premium and boost your site even more!</h2></a></div><div style="width:100%; font-size: 125% !important;clear:both; ">Get <a href="https://codebard.com/nimblepress-premium?utm_source=<?php urlencode( site_url())?>&utm_medium=nimblepress_free&utm_campaign=&utm_content=nimblepress_admin_upsell_notice&utm_term=">NimblePress Premium</a> and show ads in your header, sidebar, footer, before post content, inside post content & at the end of post content, use responsive Grid layout, speed up your site even more, remove credit link in the footer and enjoy more features and all the upcoming ones!<br /><br /><a href="https://codebard.com/nimblepress-premium?utm_source=<?php urlencode( site_url())?>&utm_medium=nimblepress_free&utm_campaign=&utm_content=nimblepress_admin_upsell_notice&utm_term=">Check it out here</a></div></div></div></p>
			</div>
			
		<?php
		
			
		}
	}
	
}

add_action('admin_notices', 'nimblepress_admin_notices');



function nimblepress_dismiss_admin_notice() {
	
	if( !( is_admin() AND current_user_can( 'manage_options' ) ) ) {
		return;
	}

	// Mapping what comes from REQUEST to a given value avoids potential security problems and allows custom actions depending on notice

	if ( $_REQUEST['notice_id'] == 'nimblepress-addon-upsell' ) {
		if ( !isset($_REQUEST['nimblepress_nonce_addon_notice_shown']) OR !wp_verify_nonce( sanitize_key( $_REQUEST['nimblepress_nonce_addon_notice_shown'] ), 'nimblepress_nonce_addon_notice_shown' ) ) {
			return;
		}
		
		update_option( 'nimblepress_upsell_shown', true);
		
	}
	
}



add_action( 'wp_ajax_nimblepress_dismiss_admin_notice', 'nimblepress_dismiss_admin_notice' , 10, 1 );


/**
 * Enqueue the few admin styles
 */
 
 
function nimblepress_enqueue_admin_styles() {
	wp_enqueue_style( 'nimblepress-admin-styles', get_stylesheet_directory_uri() . '/admin-styles.css' );
}

add_action( 'admin_enqueue_scripts', 'nimblepress_enqueue_admin_styles' );
 
 
/**
 * Enqueue scripts and styles.
 */
 
function nimblepress_scripts() {
	
	if ( get_theme_mod('np_inline_the_css', 'yes') != 'yes' ) {
		wp_enqueue_style( 'nimblepress-style', get_stylesheet_uri(), array(), NIMBLEPRESS_VERSION );
	}

	if ( get_theme_mod('np_inline_navigation_js', 'yes') != 'yes' ) {
		wp_enqueue_script( 'nimblepress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), NIMBLEPRESS_VERSION, true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	
}
add_action( 'wp_enqueue_scripts', 'nimblepress_scripts' );

 
/**
 * Enqueue scripts and styles.
 */
 
function nimblepress_admin_scripts() {
	wp_enqueue_script( 'nimblepress-admin-js', get_template_directory_uri() . '/js/admin.js', array('jquery'), NIMBLEPRESS_VERSION );
}
add_action( 'admin_enqueue_scripts', 'nimblepress_admin_scripts' );

	

function nimblepress_maybe_dequeue_gutenberg_css(){
	
	// Dequeue Gutenberg CSS and inline it if inline option was selected
	if ( get_theme_mod('np_inline_the_css', 'yes') == 'yes' ) {
		wp_dequeue_style( 'wp-block-library' );
	}
 
} 
add_action( 'wp_enqueue_scripts', 'nimblepress_maybe_dequeue_gutenberg_css', 100 );


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
 * List of text decorations
 */
 
function nimblepress_get_text_decorations() {

	return array(
		'none' => 'None',
		'underline' => 'Underline',
		'underline dotted' => 'Underline dotted',
		'underline dashed' => 'Underline dashed',
		'underline dotted' => 'Underline dotted',
		'overline' => 'Overline',
		'overline dotted' => 'Overline  dotted',
		'overline dashed' => 'Overline  dashed',
		'overline dotted' => 'Overline  dotted',
	
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
 

function nimblepress_save_post_meta( $post_id ) {


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

add_action( 'save_post', 'nimblepress_save_post_meta', 10, 1 );
add_action( 'new_to_publish', 'nimblepress_save_post_meta', 10, 1 );


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
				background-color: <?php echo esc_html( get_theme_mod('np_body_background_color', '') ); ?>;
				font-family: <?php echo esc_html( get_theme_mod('np_body_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			}

			h1, h2, h3, h4, h5, h6 {
				font-family: <?php echo esc_html( get_theme_mod('np_heading_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
				color: <?php echo esc_html( get_theme_mod('np_heading_color', '#404040') ); ?>;
			}

			a:link, a:active, a:visited {
				color: <?php echo esc_html( get_theme_mod('np_link_color', '#1e73be') ); ?>;
				font-family: <?php echo esc_html( get_theme_mod('np_link_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
				text-decoration: <?php echo esc_html( get_theme_mod('np_link_text_decoration', 'none') ); ?>;
			}

			a:hover {
				color: <?php echo esc_html( get_theme_mod('np_link_hover_color', '#1e73be') ); ?>;
				font-family: <?php echo esc_html( get_theme_mod('np_link_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
				text-decoration: <?php echo esc_html( get_theme_mod('np_link_hover_text_decoration', 'underline') ); ?>;
			}

			.entry-title a:link, .entry-title a:active, .entry-title a:visited {
				color: <?php echo esc_html( get_theme_mod('np_heading_link_color', '#1e73be') ); ?>;
				font-family: <?php echo esc_html( get_theme_mod('np_heading_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
				text-decoration: <?php echo esc_html( get_theme_mod('np_entry_title_link_text_decoration', 'none') ); ?>;
			}

			.entry-title a:hover {
				color: <?php echo esc_html( get_theme_mod('np_heading_link_hover_color', '#1e73be') ); ?>;
				text-decoration: <?php echo esc_html( get_theme_mod('np_entry_title_link_hover_text_decoration', 'underline') ); ?>;
			}

			.footer-wrapper a:link, .footer-wrapper a:active, .footer-wrapper a:visited {
				color: <?php echo esc_html( get_theme_mod('np_footer_link_color', '#1e73be') ); ?>;
			}

			.footer-wrapper {
				color: <?php echo esc_html( get_theme_mod('np_footer_text_color', '#404040') ); ?>;
			}

			.footer-wrapper a:hover {
				color: <?php echo esc_html( get_theme_mod('np_footer_link_hover_color', '#1e73be') ); ?>;
			}

			.entry-content a:link, .entry-content a:visited, .entry-content a:active, .comment-content a:link, .comment-content a:visited, .comment-content a:active, .widget_text a:link, .widget_text a:visited, .widget_text a:active {
				text-decoration: <?php echo esc_html( get_theme_mod('np_content_link_text_decoration', 'underline') ); ?>;
			}

			.entry-content a:hover, .comment-content a:hover, .widget_text a:hover {
				text-decoration: <?php echo esc_html( get_theme_mod('np_content_link_hover_text_decoration', 'underline') ); ?>;
			}

			.nimblepress-menu-link a:link, .nimblepress-menu-link a:active, .nimblepress-menu-link a:visited {
				font-family: <?php echo esc_html( get_theme_mod('np_nav_menu_font', 'Helvetica') ); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
				color: <?php echo esc_html( get_theme_mod('np_menu_link_color', '#1e73be') ); ?>;
			}

			.nimblepress-menu-link a:hover {
				color: <?php echo esc_html( get_theme_mod('np_menu_link_hover_color', '#1e73be') ); ?>;
			}

			#page {
				<?php if ( esc_html( get_theme_mod( 'np_site_full_width_or_contained', 'full_width' ) ) == 'contained' ): ?>
				max-width : <?php echo esc_html( get_theme_mod('np_site_width', '1200') ); ?>px;
				<?php endif ?>
				<?php if ( esc_html( get_theme_mod('np_site_background_color', '') ) != '' ): ?>
					background-color: <?php echo esc_html( get_theme_mod('np_site_background_color', '') ); ?>;
				<?php endif ?>
				<?php if ( esc_html( get_theme_mod( 'np_site_border_size', '' ) ) != '0' ): ?>
					border: <?php echo esc_html( get_theme_mod('np_site_border_size', '0') ); ?>px solid <?php echo esc_html( get_theme_mod('site_border_color', '#ffffff') ); ?>;
				<?php endif ?>
				<?php if ( esc_html( get_theme_mod('np_site_shadow_color', '#ffffff' ) ) != '' ): ?>
					box-shadow: 0 2px 8px 2px rgba(<?php echo esc_html( nimblepress_hex_to_rgb( get_theme_mod( 'np_site_shadow_color', '#ffffff' ) ) );  ?>,0.1);
				<?php endif ?>
			}

			#main-content {
				max-width : <?php echo esc_html( get_theme_mod('np_np_site_width', '1200') ); ?>px;
				<?php if ( esc_html( get_theme_mod('np_site_background_color', '') ) != '' ): ?>
					background-color: <?php echo esc_html( get_theme_mod('np_body_background_color', '') ); ?>;
				<?php endif ?>
			}

			.site-header-wrapper {
				max-width : <?php echo esc_html( get_theme_mod('np_site_width', '1200') ); ?>px;
			}

			.footer-wrapper {
				max-width : <?php echo esc_html( get_theme_mod('np_site_width', '1200') ); ?>px;
			}

			.site-header {
				background-color: <?php echo esc_html( get_theme_mod('np_header_background_color', '#fbfbfb') ); ?>;
				box-shadow: 0 1px 8px 1px rgba(<?php echo nimblepress_hex_to_rgb( get_theme_mod( 'np_header_shadow', '#000000' ) ) ?>,0.08);
				<?php if ( esc_html( get_theme_mod('np_header_height', 'auto') ) != 'auto' ): ?>
					min-height : <?php echo esc_html( get_theme_mod( 'np_header_height', 'auto' ) ); ?>px;
				<?php endif ?>
			}

			.site-footer {
				background-color: <?php echo esc_html( get_theme_mod('np_footer_background_color', '#fbfbfb') ); ?>;
				box-shadow: 0 -1px 8px 1px rgba(<?php echo nimblepress_hex_to_rgb( esc_html( get_theme_mod( 'np_footer_shadow', '#000000' ) ) ) ?>,0.08);
				<?php if ( esc_html( get_theme_mod('np_footer_height', 'auto') ) != 'auto' ) : ?>
					min-height : <?php echo esc_html( get_theme_mod('np_footer_height', 'auto') ); ?>px;
				<?php endif ?>
			}

			.widget {
				background-color: <?php echo esc_html( get_theme_mod('np_widget_background_color', '#ffffff') ); ?>;
				box-shadow: 0px 1px 8px rgba(<?php echo esc_html( nimblepress_hex_to_rgb( get_theme_mod( 'np_widget_shadow', '#000000' ) ) ) ?>, 0.08);
			}
						
			button, a.read-more:link, a.read-more:visited, a.read-more:active, html input[type="button"], input[type="reset"], input[type="submit"], a.button:link, a.button:visited, a.button:active, a.wp-block-button__link:not(.has-background) {
				color: <?php echo esc_html( get_theme_mod('np_button_text_color', '#ffffff') ); ?>;
				background-color: <?php echo esc_html( get_theme_mod('np_button_background_color', '#2f4d80') ); ?>;
				text-decoration: none;
			}

			button:hover, a.read-more:hover, html input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, a.button:hover, button:focus, html input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus, a.button:focus, a.wp-block-button__link:not(.has-background):active, a.wp-block-button__link:not(.has-background):focus, a.wp-block-button__link:not(.has-background):hover {
				color: <?php echo esc_html( get_theme_mod('np_button_hover_text_color', '#ffffff') ); ?>;
				background-color: <?php echo esc_html( get_theme_mod('np_button_hover_background_color', '#4075cb') ); ?>;
				cursor: pointer;
				text-decoration: none;
			}
			
			.nav-menu a:hover {
				text-decoration: underline;
			}

			.site-title {
				font-size: <?php echo esc_html( get_theme_mod('site_title_size', '42') ); ?>px;
				
			}

			.site-title a:link, .site-title a:visited, .site-title a:active, .site-title a:hover {
				color: <?php echo esc_html( get_theme_mod('np_site_title_color', '#1e73be') ); ?>;
			}

			.site-description {
				color: <?php echo esc_html( get_theme_mod('np_site_description_color', '#404040') ); ?>;
				font-size: <?php echo esc_html( get_theme_mod('site_description_font_size', '16') ); ?>px;
				
			}
			
			<?php
				if( $nimblepress_hide_title ):
			?>
				#main-content {
					padding-top: 0px;
					padding-bottom: 0px;
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
add_action( 'wp_head', 'nimblepress_customizer_styles', 9);



/**
 * Nav menu class related
*/


function nimblepress_add_css_classes_to_nav_menu( $classes, $item, $args, $depth ) {

	if ( $depth == 0 ) {
		$classes[] = "nimblepress-menu-top-level";
	}
	return $classes;

}
function nimblepress_add_class_to_top_menu_items($classes, $item, $args) {
	static $fl;
	if (0 == $item->menu_item_parent) {
		$fl = (empty($fl)) ? 'first' : 'middle';
		$classes[] = 'nimblepress-menu-top-level';
	} 
	return $classes;
}
add_filter('nav_menu_css_class','nimblepress_add_class_to_top_menu_items',1,3);


function nimblepress_chevron_to_nav_menu( $item_output, $item, $depth, $args ) {

	$icon = '';
	// add_action( 'nav_menu_css_class', 'nimblepress_add_css_classes_to_nav_menu', 10, 4 );

    if ( !empty( $item->classes ) AND in_array( 'menu-item-has-children', $item->classes ) ) {
		$icon = '<svg width="1em" height="1em" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="m5 6l5 5l5-5l2 1l-7 7l-7-7z"/></svg>';
    }

    return '<div class="nimblepress-menu-item-wrapper"><div class="nimblepress-menu-link">' . $item_output . '</div><div class="nimblepress-arrow-icon">' . $icon . '</div></div>';

}

add_filter( 'walker_nav_menu_start_el', 'nimblepress_chevron_to_nav_menu', 10, 4 );


/**
 * Footer info
 */

add_action('nimblepress_genereate_footer_info', 'nimblepress_genereate_footer_info');

function nimblepress_genereate_footer_info( $args = array() ) {
	
		$do_footer = ' © ' . date('Y') . ' ' . get_bloginfo( 'name' );
		$do_footer .= ' | ';
		$do_footer .= esc_html__( 'Built with ', 'nimblepress' ); 
		$do_footer .= '<a href="https://codebard.com/nimblepress" target="blank">&nbsp;NimblePress</a>';
		
		echo $do_footer;
}

function nimblepress_get_option( $option ) {
	
	$options = get_option('nimblepress', nimblepress_get_default_options() );
	
	if ( isset( $options[$option] ) ) {
		return $options[$option];
	}
	
	return false;
}

function nimblepress_set_option( $option, $value ) {
	
	$options = get_option('nimblepress', nimblepress_get_default_options() );
	
	$options[$option] = $value;
	
	update_option( 'nimblepress', $options );

}

function nimblepress_delete_option( $option ) {
	
	$options = get_option('nimblepress', nimblepress_get_default_options() );
	
	unset( $options[$option] );
	
	update_option( 'nimblepress', $options );

}

function nimblepress_get_default_options() {
	return array(
	
	);
}


function nimblepress_get_sidebar() {
	
	$show_sidebar = apply_filters( 'nimblepress_show_sidebar', 'show' );
	
	if ( $show_sidebar == 'show' ) {
		get_sidebar();
	}
	
}

add_action('nimblepress_do_sidebar', 'nimblepress_get_sidebar');

function nimblepress_options_page_grid_item($content) {
	
	echo '<div class="nimblepress_admin_grid_item"><div>' . $content . '</div></div>';
}
function nimblepress_do_options_page_grid() {
	
	echo nimblepress_options_page_grid_item('Read the quickstart guide <a href="https://codebard.com/nimblepress-manual/quickstart" target="_blank">here</a>');
	echo nimblepress_options_page_grid_item('Bookmark the manual <a href="https://codebard.com/nimblepress-manual/category/manual" target="_blank">here</a>');
	echo nimblepress_options_page_grid_item('Get support <a href="https://forum.codebard.com/c/questions-support/nimblepress/15" target="_blank">here</a>');

}

add_action('nimblepress_options_page_grid', 'nimblepress_do_options_page_grid');

function nimblepress_theme_menu_page() {
	
	require get_template_directory() . '/inc/theme_options.php';

}


function nimblepress_theme_menu() {

	 add_theme_page('NimblePress', 'NimblePress', 'edit_theme_options', 'my-theme-options', 'nimblepress_theme_menu_page', 0 );
}

add_action('admin_menu', 'nimblepress_theme_menu');



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

