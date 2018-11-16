// JavaScript Document

jQuery(document).on("change keyup paste keydown","#constantcontact_username", function(e) {
	var val = jQuery(this).val();
	if( val !== "" )
		jQuery("#auth-constantcontact").removeAttr('disabled');
	else
		jQuery("#auth-constantcontact").attr('disabled','true');
});

jQuery(document).on( "click", "#auth-constantcontact", function(e){
	e.preventDefault();
	jQuery(".smile-absolute-loader").css('visibility','visible');
	//var sendy_inst_url = jQuery('#sendy_inst_url').val();
	//var constantcontact_api_key = jQuery("#constantcontact_api_key").val();
	var constantcontact_username = jQuery("#constantcontact_username").val();
	var constantcontact_password = jQuery("#constantcontact_password").val();
	//var sendy_list_ids = jQuery( '#sendy_list_ids' ).val();
	
	var action = 'update_constantcontact_authentication';
	var data = {action:action,constantcontact_username:constantcontact_username,constantcontact_password:constantcontact_password};
	jQuery.ajax({
		url: ajaxurl,
		data: data,
		type: 'POST',
		dataType: 'JSON',
		success: function(result){
			if(result.status == "success" ){
				jQuery(".bsf-cnlist-mailer-help").hide();
				jQuery("#save-btn").removeAttr('disabled');
				//jQuery("#constantcontact_api_key").closest('.bsf-cnlist-form-row').hide();
				jQuery("#constantcontact_username").closest('.bsf-cnlist-form-row').hide();
				jQuery("#constantcontact_password").closest('.bsf-cnlist-form-row').hide();
				jQuery("#auth-constantcontact").closest('.bsf-cnlist-form-row').hide();
				jQuery(".constantcontact-list").html(result.message);

			} else {
				jQuery(".constantcontact-list").html('<span class="bsf-mailer-success">'+result.message+'</span>');
			}
			jQuery(".smile-absolute-loader").css('visibility','hidden');
		}
	});
	e.preventDefault();
});

jQuery(document).on( "click", "#disconnect-constantcontact", function(){
															
	if(confirm("Are you sure? If you disconnect, your previous campaigns syncing with Constant Contact will be disconnected as well.")) {
		var action = 'disconnect_constantcontact';
		var data = {action:action};
		jQuery(".smile-absolute-loader").css('visibility','visible');
		jQuery.ajax({
			url: ajaxurl,
			data: data,
			type: 'POST',
			dataType: 'JSON',
			success: function(result){
				
				jQuery("#save-btn").attr('disabled','true');
				if(result.message == "disconnected" ){
					jQuery("#constantcontact_username").val('');
					jQuery("#constantcontact_password").val('');
					//jQuery("#constantcontact_api_key").val('');
					jQuery(".constantcontact-list").html('');
					jQuery("#disconnect-constantcontact").replaceWith('<button id="auth-constantcontact" class="button button-secondary auth-button" disabled="true">Authenticate Constant Contact</button><span class="spinner" style="float: none;"></span>');
					jQuery("#auth-constantcontact").attr('disabled','true');
				}

				jQuery('.bsf-cnlist-form-row').fadeIn('300');
				jQuery(".bsf-cnlist-mailer-help").show();
				jQuery(".smile-absolute-loader").css('visibility','hidden');
			}
		});
	}
	else {
		return false;
	}
});