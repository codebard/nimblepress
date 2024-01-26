<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nimblepress
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

global $post;

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_show_sidebar = nimblepress_get_post_meta_value( $post, 'sidebar' );
	if ( $nimblepress_show_sidebar AND $nimblepress_show_sidebar == 'hide' ) {
		return;
	}
}


?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
