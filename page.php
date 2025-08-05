<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nimblepress
 */

get_header();

global $post;

$nimblepress_hide_comments = False;
$nimblepress_page_contained_status = 'contained';

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_comments_status = nimblepress_get_post_meta_value( $post, 'comments' );
	if ( $nimblepress_comments_status AND $nimblepress_comments_status == 'hide' ) {
		$nimblepress_hide_comments = True;
	}

	$nimblepress_page_contained_status = nimblepress_get_post_meta_value( $post, 'page_width' );

}

?>

	<main id="primary" class="site-main" <?php if ( $nimblepress_page_contained_status == 'full' ) { echo 'style="max-width: 100%; width: 100%;"'; } else { echo 'style="max-width: ' . esc_html( get_theme_mod('np_site_width', '1200') ) . 'px; width: 100%;"'; } ?>>
		<?php
		while ( have_posts() ):

			the_post();

			get_template_part( 'template-parts/content', 'page' );


			if ( !$nimblepress_hide_comments ) {
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
