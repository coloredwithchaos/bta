jQuery(document).ready( function($) {
	if( seop_pointer )
	{
		
		jQuery(seop_pointer.anchor_id).pointer({
			content: seop_pointer.content,
			position: {
				align: seop_pointer.align,
				edge: seop_pointer.edge
			},
			close: function(a,b) {
				jQuery.post( ajaxurl, {
					pointer: seop_pointer.usermeta,
					action: 'dismiss-wp-pointer'
				});
			}
		}).pointer('open');

		jQuery('#seops_start_tour_action').click(function() {
			jQuery.post( ajaxurl, {
				pointer: seop_pointer.usermeta,
				action: 'dismiss-wp-pointer'
			}, function() {
				window.location = seop_pointer.tour_url;
			});
		});
	
	}
});