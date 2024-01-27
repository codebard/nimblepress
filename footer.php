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
					echo '&nbsp;©&nbsp;' . date('Y') . '&nbsp;' . get_bloginfo( 'name' );

							echo '&nbsp;|&nbsp;';
							printf( esc_html__( 'Built with&nbsp;%1$s', 'nimblepress' ), '<a href="https://codebard.com/nimblepress" target="blank" rel="nofollow">NimblePress</a>' );
			
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
