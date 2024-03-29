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

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_comments_status = nimblepress_get_post_meta_value( $post, 'comments' );
	if ( $nimblepress_comments_status AND $nimblepress_comments_status == 'hide' ) {
		$nimblepress_hide_comments = True;
	}
}

?>

	<main id="primary" class="site-main">

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
