<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nimblepress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	
	<?php if ( get_option( 'rss_use_excerpt' ) AND !is_single() )  : ?>
	
	
		<div class="entry-listing">
		
			<?php nimblepress_post_thumbnail(); ?>
	
			<div class="entry-summary">
				<?php the_excerpt(); ?>
				<?php echo nimblepress_get_read_more_button(); ?>
				
			</div><!-- .entry-summary -->
			
		</div>

		
		
	<?php else : ?>
	
	
		<?php nimblepress_post_thumbnail(); ?>
		
		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'nimblepress' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nimblepress' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
		<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
					nimblepress_posted_by();
					nimblepress_posted_on();
					?>
				</div><!-- .entry-meta -->
		<?php endif; ?>

			<?php nimblepress_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	<?php endif ?>


</article><!-- #post-<?php the_ID(); ?> -->
