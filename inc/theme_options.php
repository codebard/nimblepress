
<div class="wrap">
<h1>NimblePress Options</h1>
<form method="post" action="options.php">
	<?php
	nimblepress_delete_option('introduction_seen');
		settings_fields('my-theme-settings-group');
		do_settings_sections('my-theme-settings-group');
		submit_button();
	?>
</form>
</div>
