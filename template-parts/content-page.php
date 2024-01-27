<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nimblepress
 */



$nimblepress_hide_title = False;

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_title_status = nimblepress_get_post_meta_value( $post, 'title' );
	if ( $nimblepress_title_status AND $nimblepress_title_status == 'hide' ) {
		$nimblepress_hide_title = True;
	}
}

$nimblepress_hide_post_navigation = False;

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_post_nav_status = nimblepress_get_post_meta_value( $post, 'post_nav' );
	if ( $nimblepress_post_nav_status AND $nimblepress_post_nav_status == 'hide' ) {
		$nimblepress_hide_post_navigation = True;
	}
}


$nimblepress_hide_post_metadata = False;

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_post_metadata_status = nimblepress_get_post_meta_value( $post, 'post_metadata' );
	if ( $nimblepress_post_metadata_status AND $nimblepress_post_metadata_status == 'hide' ) {
		$nimblepress_hide_post_metadata = True;
	}
}


?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


		<?php if ( !$nimblepress_hide_title )  : ?>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<?php nimblepress_post_thumbnail(); ?>
			
		<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		if ( !$nimblepress_hide_post_navigation ) {

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nimblepress' ),
					'after'  => '</div>',
				)
			);
		}

		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
	
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'nimblepress' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
