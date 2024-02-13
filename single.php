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

$nimblepress_hide_comments = False;

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_comments_status = nimblepress_get_post_meta_value( $post, 'comments' );
	if ( $nimblepress_comments_status AND $nimblepress_comments_status == 'hide' ) {
		$nimblepress_hide_comments = True;
	}
}

$nimblepress_hide_post_navigation = False;

if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_post_nav_status = nimblepress_get_post_meta_value( $post, 'post_nav' );
	if ( $nimblepress_post_nav_status AND $nimblepress_post_nav_status == 'hide' ) {
		$nimblepress_hide_post_navigation = True;
	}
}

?>

	<main id="primary" class="site-main">

		<?php
			while ( have_posts() ) :
				do_action('nimblepress_before_content_insert');
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				if ( !$nimblepress_hide_post_navigation ) {
						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'nimblepress' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'nimblepress' ) . '</span> <span class="nav-title">%title</span>',
							)
						);
					
				}
				
				if ( !$nimblepress_hide_comments ) {
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}

			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
