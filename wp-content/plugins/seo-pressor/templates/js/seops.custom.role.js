jQuery.noConflict();

(function( $ ) {
	$(function() {
		
		$('.seops_form_accessibility input[type=checkbox]').change(function() {
			var id = $(this).closest( 'form' ).attr( 'data-id' );
			var capabilities = [];
			$.each( $(this).closest( 'form' ).serializeArray(), function(index, row) {
				capabilities.push( row.value );
			});
			var params = {
				action	: 'seops_ajax',
				object	: 'role',
				data	: {
					request			: 'update',
					id				: id,
					capabilities	: capabilities
				}
			};
			$.post( ajaxurl, params, function() {}, 'json');
		});
		
		$('body').on('seops_lcs-statuschange', 'input[name="seops_attr[role][enable]"]', function() {
			var status = ($(this).is(':checked')) ? 1 : 0;
			var params = {
				action	: 'seops_ajax',
				object	: 'role',
				data	: {
					request	: 'enable',
					status	: status
				}
			};
			$.post( ajaxurl, params, function() {}, 'json');
		});
		
		var timer;
		$('.seops_user_search').keyup(function() {
			
			clearTimeout( timer );
			
			var suggest_obj = $(this).next('.seops_role_user_suggest');
			
			var role_id = $(this).attr('data-role');
			var search_term = $.trim( $(this).val() );
			
			if( search_term.length > 0 )
			{
				// do search
				var params = {
					action	: 'seops_ajax',
					object	: 'role',
					data	: {
						request			: 'search_user',
						role_id 		: role_id,
						search_term		: search_term
					}
				};
				
				timer = setTimeout(function() {
					
					suggest_obj.html('<div class="seops_ajax_loader"></div>').show();
					
					$.post( ajaxurl, params, function( data ) {
						var userlist = '';
						if( Object.keys(data.response).length > 0 )
						{
							$.each( data.response, function(index, value) {
								userlist += '<span>'+value+'</span>';
							});
						}
						else
						{
							userlist = '<p>'+data.message+'</p>';
						}
						suggest_obj.html(userlist).show();
					}, 'json');
				}, 300);
			}
			else
			{
				// no text input
				suggest_obj.html('').hide();
			}
		});
		
		$('.seops_apply_role').on('click', '.seops_role_user_suggest span', function(e) {
			$(this).closest( '.seops_role_user_suggest' ).prev( 'input' ).val( $(this).html() );
			$(this).closest( '.seops_role_user_suggest' ).hide().html( '' );
		});
		
		// Custom Role Delete User From Role
		$('.seops_role_active_users').on('click', '.seops_user_block > a', function() {
			
			var user_name = $(this).parent().attr('data-name');
			var role_id = $(this).closest('.seops_role_active_users').attr('data-role');
			
			var params = {
				action	: 'seops_ajax',
				object	: 'role',
				data	: {
					request			: 'delete_user',
					user_name 		: user_name,
					role_id			: role_id
				}
			};
			
			$.post( ajaxurl, params, function( data ) {
				var user_html = '';
				$.each( data.response.active_users, function(index, value) {
					user_html += '<span class="seops_user_block" data-name="' + value + '">' + value + '<a class="seops_user_block_remove"></a></span>';
				});
				
				$('#seops_role_wrap_id_'+role_id).find('.seops_user_search').val('');
				$('#seops_role_wrap_id_'+role_id).find('.seops_role_active_users').html( user_html );
				
			}, 'json');
			
			
		});
		
		
	});
})(jQuery);