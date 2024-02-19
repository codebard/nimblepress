
<div class="wrap">
<h1><?php echo apply_filters('nimblepress_options_page_heading', 'NimblePress' ); ?></h1>
<br clear="both" />
<div class="nimblepress_admin_grid">

	<?php echo do_action('nimblepress_options_page_grid'); ?>
	


</div>
<br clear="both" />
	
<?php  if ( !defined('NIMBLEPRESS_PREMIUM') ): ?>

<div class="nimblepress_introduction">

Consider upgrading to NimblePress premium to power up your theme! With premium, you can:

<ul>
	<li>Show ads in your header, sidebar, footer</li>
	<li>Show ads before post content, inside the post content and at the end of post content</li>
	<li>Use Grid post listing and hide sidebar in home page</li>
	<li>Speed up your site even further</li>
	<li>Customize the footer info and remove the credits link</li>
	<li>Get all upcoming features</li>
</ul>

Sounds good? <a href="https://codebard.com/nimblepress-premium?utm_source=<?php urlencode( site_url())?>&utm_medium=nimblepress_free&utm_campaign=&utm_content=nimblepress_theme_options_notice&utm_term=" target="_blank">Upgrade here!</a>

</div>


<?php endif; ?>

</div>
