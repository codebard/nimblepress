<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nimblepress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-listing">
	
		<?php nimblepress_post_thumbnail(); ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<?php echo nimblepress_get_read_more_button(); ?>
			
		</div><!-- .entry-summary -->
		
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
