<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nimblepress
 */
 

global $post;

$nimblepress_hide_header = False;
$nimblepress_hide_nav_menu = False;


if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_header_status = nimblepress_get_post_meta_value( $post, 'header' );
	if ( $nimblepress_header_status AND $nimblepress_header_status == 'hide' ) {
		$nimblepress_hide_header = True;
	}

	$nimblepress_nav_menu_status = nimblepress_get_post_meta_value( $post, 'nav_menu' );
	if ( $nimblepress_nav_menu_status AND $nimblepress_nav_menu_status == 'hide' ) {
		$nimblepress_hide_nav_menu = True;
	}

}


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php do_action( 'nimblepress_head' ) ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nimblepress' ); ?></a>
	<?php if (!$nimblepress_hide_header ): ?>
		<header id="masthead" class="site-header">
			<div class="site-header-wrapper">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( !has_custom_logo() ):
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
					endif;
					$nimblepress_description = get_bloginfo( 'description', 'display' );
					if ( $nimblepress_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $nimblepress_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<?php do_action('nimblepress_header_insert'); ?>
				<?php if ( !$nimblepress_hide_nav_menu ): ?>
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'nimblepress' ); ?></button>
						<div class="nimblepress-nav-menu" style="display: none;">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class' => 'menu nav-menu',
							)
						);
						?>
						</div>
					</nav><!-- #site-navigation -->
				<?php endif; ?>
			</div>
		</header><!-- #masthead -->
		
	<?php endif; ?>

<div id="main-content" class="<?php nimblepress_make_page_width() ?>">