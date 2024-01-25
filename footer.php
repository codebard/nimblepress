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

?>
</div>
	<footer id="colophon" class="site-footer">
		<div class="footer-wrapper">
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer_widgets' ); ?>
			</div>
			<div class="site-info">
				<?php
					echo '&nbsp;©&nbsp;' . date('Y') . '&nbsp;' . get_bloginfo( 'name' );

					if ( get_theme_mod('np_site_full_width_or_contained', 'full_width') == 'contained' ) {
							echo '&nbsp;|&nbsp;';
							printf( esc_html__( 'Built with&nbsp;%1$s', 'nimblepress' ), '<a href="https://codebard.com/nimblepress" target="blank" rel="nofollow">NimblePress</a>' );
					}
				?>
					
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
