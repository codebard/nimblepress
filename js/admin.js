;(function() {

	jQuery( function( $ ) {

		jQuery(document).on( 'click', '.nimblepress-notice .notice-dismiss', function(e) {

			var nimblepress_nonce_addon_notice_shown = jQuery( this ).parent().attr( 'nimblepress_nonce_addon_notice_shown' );
			console.log(nimblepress_nonce_addon_notice_shown);
			console.log('####');
			jQuery.ajax({
				url: ajaxurl,
				type:"POST",
				dataType : 'html',
				data: {
					action: 'nimblepress_dismiss_admin_notice',
					notice_id: jQuery( this ).parent().attr( "id" ),
					nimblepress_nonce_addon_notice_shown: nimblepress_nonce_addon_notice_shown,
				}
			});
		});

	});
	
})()