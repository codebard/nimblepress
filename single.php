<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nimblepress
 */

get_header();


global $post;

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_hide_title = False;
	$nimblepress_title_status = nimblepress_get_post_meta_value( $post, 'title' );
	if ( $nimblepress_title_status AND $nimblepress_title_status == 'hide' ) {
		$nimblepress_hide_title = True;
	}
}

?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			
		if ( !$nimblepress_hide_title ) {
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nimblepress' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nimblepress' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

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
