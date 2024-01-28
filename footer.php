<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nimblepress
 */
 
global $post;

$nimblepress_hide_footer = False;
if ( isset( $post ) AND $post AND isset( $post->ID ) ) {
	
	$nimblepress_footer_status = nimblepress_get_post_meta_value( $post, 'footer' );
	if ( $nimblepress_footer_status AND $nimblepress_footer_status == 'hide' ) {
		$nimblepress_hide_footer = True;
	}
}

 

?>
</div>

	<?php
		if ( !$nimblepress_hide_footer):
	?>

	<footer id="colophon" class="site-footer">
		<div class="footer-wrapper">
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer_widgets' ); ?>
			</div>
			<div class="site-info">
				<?php
				
					do_action( 'nimblepress_genereate_footer_info' );
					
				
				?>
				
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
	
	<?php
		endif;
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
