jQuery.noConflict();

(function( $ ) {

	var timer;
	var ajax_runner = false;

	$(function() {



		/* --------------- UI Event ---------------- */

		// Main & sub tab
		$('.seops_main_switcher a').click(function() {
			$.fn.main_tab_init( $(this) );
		});
		$('.seops_sub_switcher a').click(function() {
			$.fn.sub_tab_init( $(this) );
		});

		// If anchor text a
		var target_idx = window.location.hash.slice(1);
		if( target_idx.length > 0 && $('.seops_main_switcher a').eq(target_idx).length )
		{
			$('.seops_main_switcher a').eq(target_idx).click();
		}

		// Add more button (contact & social in homepage & sitewide setting)
		$('.seops_add_more').click(function() {
			var newElement = $(this).prevAll(':first-child').clone().insertBefore($(this));
			newElement.find('input[type=text]').val('');
			//newElement.find('span').remove();
			newElement.append('<a class="seops_contact_remove seops_contact_remove_css"></a>');

		});

		// Remove more button (contact & social in homepage & sitewide setting)
		$(document).on( 'click', '.seops_contact_remove', function(){
			$(this).closest('.seops_grid_row').remove();
		});

		// All on/off button
		$('.seops_onoff_switch').seops_lc_switch();


		// All yes/no button
		$('.seops_yesno_switch').seops_lc_switch('YES', 'NO');


		// Search engine preview
		$('textarea[name="seops_attr[home][title]"], textarea[name="seops_attr[home][description]"]').keyup(function() {
			$.fn.setup_se_preview();
		}).keyup();


		// Robot check/uncheck all function
		$('.seops_home_checkall').on('change', this, function() {

			if( $(this).is(':checked') )
			{
				$('input[name="seops_attr[home][robot]"]').each(function(index, element) {
                    $(element).prop('checked', true);
                });
			}
			else
			{
				$('input[name="seops_attr[home][robot]"]').each(function(index, element) {
                    $(element).prop('checked', false);
                });
			}
		});


		// WP media uploader
		var frame;
		$('.seops_onscreen_uploader_wrap').on('click', this, function(e) {
			e.preventDefault();
			if( $(e.target).hasClass('seops_onscreen_uploader_remove') )
			{
				$( this ).children( '.seops_onscreen_uploader_image' ).css( 'background-image', 'none' );
				$( this ).children( 'input[type=hidden]' ).val( '' );
				$( this ).children( '.seops_onscreen_uploader_remove' ).hide();
			}
			else
			{
				var wrapper = $(this);

				frame = wp.media({
					title: 'Pick One Image',
					button: {
					  text: 'Use this image'
					},
					multiple: false  // Set to true to allow multiple files to be selected
				});

				frame.on( 'select', function() {
					var attachment = frame.state().get('selection').first().toJSON();
					$( wrapper ).children( 'input[type=hidden]' ).val( attachment.url );
					$( wrapper ).children( '.seops_onscreen_uploader_image' ).css( 'background-image', 'url('+attachment.url+')' );
					$( wrapper ).children( '.seops_onscreen_uploader_remove' ).show();
				});

				frame.open();
			}
		});


		// For Publish Local SEO tab use
		$('.seops_local_switch_tab').click(function() {
			var idx = $(this).attr('data-index');
			$('.seops_switcher_local a').eq(idx).click();
		});




		// Dashboard graph
		$('.seops_dashboard_pie').asPieProgress({
            namespace: 'seops_dashboard_pie'
        }).asPieProgress('start');


		// Smart linking
		$('.seops_sl_back').click(function() {
			$('.seops_sub_switcher a').eq(0).click();
		});


		// Site Audit
		$('.seops_view_all').click(function() {
			$('.seops_main_switcher a').eq(1).click();
		});

		// Introduction dismiss button
		$('.seops_intro_dismiss').click(function() {
			$.post( ajaxurl, {
				pointer: 'seop_ignore_tour',
				action: 'dismiss-wp-pointer'
			}, function() {
				$('.seops_intro_wrap').fadeOut('fast');
			});
		});

		// Tooltips
		$( '.seops_tooltips, .seops_tooltips_custom' ).tooltip({
			tooltipClass: "seops_tooltips_content",
			position: {
				my: "center bottom-5",
				at: 'center top'
			},
			content: function () {
				return $(this).children('span').html();
			},
			show: null,
			close: function (event, ui) {
				ui.tooltip.hover(
				function () {
					$(this).stop(true).fadeTo(400, 1);
				},
				function () {
					$(this).fadeOut("400", function () {
						$(this).remove();
					})
				});
			}
		});

		// show how many record per page
		$('.seops_number_perpage').on('change', this, function() {

			var limit = $(this).val();
			var page = $.fn.get_query_string_variable('page');
			var order = $.fn.get_query_string_variable('order');
			var order_by = $.fn.get_query_string_variable('order_by');
			var params = { 'page' : page, 'limit' : limit };
			if( order != false )
				params.order = order;
			if( order_by != false )
				params.order_by = order_by;

			var newurl = window.location.protocol + '//' + window.location.hostname + window.location.pathname;
			newurl += '?' + $.param( params );

			window.location = newurl;

		});

		// tour button
		$('.seops_intro_action').click(function() {
			//$('.seops_intro_slide').hide().eq( $(this).attr('data-slide') ).show();
			$('.seops_intro_slide').show().not(':eq('+$(this).attr('data-slide')+')').hide();
		});

		// report button
		$('.seops_trigger_report_selection').click(function() {
			var domain = $(this).attr('data-domain');
			$('.seops_report_wrap').find('input[name="seops_attr[report][domain]"]').val( domain );
			$('.seops_report_wrap').find('.seops_report_field_domain').html( domain );
			$('.seops_report_wrap').fadeIn();
		});

		// report button cancel
		$('.seops_trigger_report_cancel').click(function() {
			$('.seops_report_wrap').find('input[name="seops_attr[report][domain]"]').val( '' );
			$('.seops_report_wrap').find('.seops_report_field_domain').html( '' );
			$('.seops_report_wrap').fadeOut();
		});

		// setup fb & tw img for visual purpose
		$( 'input[name="seops_attr[sitewide_fb_img]"]' ).siblings( '.seop_sitewide_social_uploader_image' ).css( 'background-image', 'url('+$('input[name="seops_attr[sitewide_fb_img]"]').val()+')' );
		$( 'input[name="seops_attr[sitewide_fb_img]"]' ).siblings( '.seop_sitewide_social_uploader_remove' ).show();
		$( 'input[name="seops_attr[sitewide_tw_img]"]' ).siblings( '.seop_sitewide_social_uploader_image' ).css( 'background-image', 'url('+$('input[name="seops_attr[sitewide_tw_img]"]').val()+')' );
		$( 'input[name="seops_attr[sitewide_tw_img]"]' ).siblings( '.seop_sitewide_social_uploader_remove' ).show();


		/* --------------- Ajax Request ---------------- */

		// Sitewide SEO Settings
		$(".seops_update_sitewide_social").click(function() {
			var setting = {
				sitewide_fb_enable: $('input[name="seops_attr[sitewide_social][enable_sitewide_fb]"]').is(':checked') ? 1 : 0,
				sitewide_fb_type: $.trim( $('select[name="seops_attr[sitewide_fb_type]"] option:selected').val() ),
				sitewide_fb_url: $.trim( $('input[name="seops_attr[sitewide_fb_url]"]').val() ),
				sitewide_fb_name: $.trim( $('input[name="seops_attr[sitewide_fb_site_name]"]').val() ),
				sitewide_fb_title: $.trim( $('input[name="seops_attr[sitewide_fb_title]"]').val() ),
				sitewide_fb_img: $('input[name="seops_attr[sitewide_fb_img]"]').val(),
				sitewide_fb_desc: $.trim( $('textarea[name="seops_attr[sitewide_fb_description]"]').val() ),
				sitewide_fb_publisher: $.trim( $('input[name="seops_attr[sitewide_fb_publisher]"]').val() ),
				sitewide_fb_author: $.trim( $('input[name="seops_attr[sitewide_fb_author]"]').val() ),
				sitewide_fb_admin: $.trim( $('textarea[name="seops_attr[sitewide_fb_admin]"]').val() ),
				sitewide_fb_appid: $.trim( $('input[name="seops_attr[sitewide_fb_appid]"]').val() ),

				// Sitewide Social Settings (TW)
				sitewide_tw_enable: $('input[name="seops_attr[sitewide_social][enable_sitewide_tw]"]').is(':checked') ? 1 : 0,
				sitewide_tw_type: $.trim( $('select[name="seops_attr[sitewide_tw_type]"] option:selected').val() ),
				sitewide_tw_site: $.trim( $('input[name="seops_attr[sitewide_tw_site]"]').val() ),
				sitewide_tw_creator: $.trim( $('input[name="seops_attr[sitewide_tw_creator]"]').val() ),
				sitewide_tw_title: $.trim( $('input[name="seops_attr[sitewide_tw_title]"]').val() ),
				sitewide_tw_desc: $.trim( $('textarea[name="seops_attr[sitewide_tw_description]"]').val() ),
				sitewide_tw_img: $('input[name="seops_attr[sitewide_tw_img]"]').val()
			};

			$.fn.seops_ajax_request( 'sitewide_social', setting, true );
		})


		// Local SEO Update
		$('.seops_update_local').click(function() {

			var preattr_contact = [];
			$('input[name="seops_attr[local][contact]"]').each(function(index, element) {
                if( $.trim($(element).val()).length > 0 )
				{
					var row = {
						contact_type	: $(element).closest('.seops_grid_row').find('select[name="seops_attr[local][contact_type]"]').val(),
						contact			: $(element).val()
					};
					preattr_contact.push( row );
				}
            });

			var setting = {
				name					: $.trim( $('input[name="seops_attr[local][name]"]').val() ),
				type					: $.trim( $('select[name="seops_attr[local][type]"] option:selected').val() ),
				address					: $.trim( $('input[name="seops_attr[local][address]"]').val() ),
				city					: $.trim( $('input[name="seops_attr[local][city]"]').val() ),
				state					: $.trim( $('input[name="seops_attr[local][state]"]').val() ),
				postcode				: $.trim( $('input[name="seops_attr[local][postcode]"]').val() ),
				country					: $.trim( $('select[name="seops_attr[local][country]"] option:selected').val() ),
				latitude				: $.trim( $('input[name="seops_attr[local][latitude]"]').val() ),
				longitude				: $.trim( $('input[name="seops_attr[local][longitude]"]').val() ),
				website					: $.trim( $('input[name="seops_attr[local][website]"]').val() ),
				contact					: preattr_contact,
				fax						: $.trim( $('input[name="seops_attr[local][fax]"]').val() ),
				email					: $.trim( $('input[name="seops_attr[local][email]"]').val() ),
				of_monday				: $.trim( $('select[name="seops_attr[local][opening_from_monday]"] option:selected').val() ),
				of_tuesday				: $.trim( $('select[name="seops_attr[local][opening_from_tuesday]"] option:selected').val() ),
				of_wednesday			: $.trim( $('select[name="seops_attr[local][opening_from_wednesday]"] option:selected').val() ),
				of_thursday				: $.trim( $('select[name="seops_attr[local][opening_from_thursday]"] option:selected').val() ),
				of_friday				: $.trim( $('select[name="seops_attr[local][opening_from_friday]"] option:selected').val() ),
				of_saturday				: $.trim( $('select[name="seops_attr[local][opening_from_saturday]"] option:selected').val() ),
				of_sunday				: $.trim( $('select[name="seops_attr[local][opening_from_sunday]"] option:selected').val() ),
				ot_monday				: $.trim( $('select[name="seops_attr[local][opening_to_monday]"] option:selected').val() ),
				ot_tuesday				: $.trim( $('select[name="seops_attr[local][opening_to_tuesday]"] option:selected').val() ),
				ot_wednesday			: $.trim( $('select[name="seops_attr[local][opening_to_wednesday]"] option:selected').val() ),
				ot_thursday				: $.trim( $('select[name="seops_attr[local][opening_to_thursday]"] option:selected').val() ),
				ot_friday				: $.trim( $('select[name="seops_attr[local][opening_to_friday]"] option:selected').val() ),
				ot_saturday				: $.trim( $('select[name="seops_attr[local][opening_to_saturday]"] option:selected').val() ),
				ot_sunday				: $.trim( $('select[name="seops_attr[local][opening_to_sunday]"] option:selected').val() ),
			};

			$.fn.seops_ajax_request( 'local_seo', setting, true, $.fn.seops_callback_local );

		});


		// Sitemap update
		$('.seops_update_sitemap').click(function() {

			var setting = {
				enable					: $('input[name="seops_attr[sitemap][enable]"]').is(':checked') ? 1 : 0,
				frequency				: $('select[name="seops_attr[sitemap][frequency]"] option:selected').val(),
				enable_home				: $('input[name="seops_attr[sitemap][enable_home]"]').is(':checked') ? 1 : 0,
				enable_post				: $('input[name="seops_attr[sitemap][enable_post]"]').is(':checked') ? 1 : 0,
				enable_page				: $('input[name="seops_attr[sitemap][enable_page]"]').is(':checked') ? 1 : 0,
				enable_category			: $('input[name="seops_attr[sitemap][enable_category]"]').is(':checked') ? 1 : 0,
			};

			$.fn.seops_ajax_request( 'sitemap', setting, true, $.fn.seops_callback_sitemap );

		});


		// Link policy update
		$('.seops_update_link').click(function() {

			var setting = {
				external				: $('input[name="seops_attr[link][external]"]').is(':checked') ? 1 : 0,
				img						: $('input[name="seops_attr[link][img]"]').is(':checked') ? 1 : 0,
			};

			$.fn.seops_ajax_request( 'link', setting, true );

		});


		// Homepage setting update
		$('.seops_update_home').click(function() {

			var preattr_robot = [];
			$('input[name="seops_attr[home][robot]"]').each(function(index, element) {
				if( $(this).is(':checked') )
				{
					preattr_robot.push( $(this).val() );
				}
            });

			var preattr_contact = [];
			$('input[name="seops_attr[home][contact]"]').each(function(index, element) {
                if( $.trim($(element).val()).length > 0 )
				{
					var row = {
						contact_type	: $(element).closest('.seops_grid_row').find('select[name="seops_attr[home][contact_type]"]').val(),
						contact			: $(element).val()
					};
					preattr_contact.push( row );
				}
            });

			var preattr_social = [];
			$('input[name="seops_attr[home][social]"]').each(function(index, element) {
                if( $.trim($(element).val()).length > 0 )
				{
					var row = {
						social_type		: $(element).closest('.seops_grid_row').find('select[name="seops_attr[home][social_type]"]').val(),
						social			: $(element).val()
					};
					preattr_social.push( row );
				}
            });

			var setting = {
				title			: $.trim( $('textarea[name="seops_attr[home][title]"]').val() ),
				description		: $.trim( $('textarea[name="seops_attr[home][description]"]').val() ),
				canonical		: $.trim( $('input[name="seops_attr[home][canonical]"]').val() ),
				redirect		: $.trim( $('input[name="seops_attr[home][redirect]"]').val() ),
				robot			: preattr_robot,
				logo			: $.trim( $('input[name="seops_attr[home][logo]"]').val() ),
				contact			: preattr_contact,
				social			: preattr_social,
				fb_enable		: $('input[name="seops_attr[home][fb_enable]"]').is(':checked') ? 1 : 0,
				fb_title		: $.trim( $('textarea[name="seops_attr[home][fb_title]"]').val() ),
				fb_description	: $.trim( $('textarea[name="seops_attr[home][fb_description]"]').val() ),
				fb_image		: $.trim( $('input[name="seops_attr[home][fb_image]"]').val() ),
				fb_publisher	: $.trim( $('input[name="seops_attr[home][fb_publisher]"]').val() ),
				fb_author		: $.trim( $('input[name="seops_attr[home][fb_author]"]').val() ),
				tw_enable		: $('input[name="seops_attr[home][tw_enable]"]').is(':checked') ? 1 : 0,
				tw_title		: $.trim( $('textarea[name="seops_attr[home][tw_title]"]').val() ),
				tw_description	: $.trim( $('textarea[name="seops_attr[home][tw_description]"]').val() ),
				tw_image		: $.trim( $('input[name="seops_attr[home][tw_image]"]').val() ),
				tw_profile		: $.trim( $('input[name="seops_attr[home][tw_profile]"]').val() ),
			};

			$.fn.seops_ajax_request( 'home', setting, true );

		});





		// Smart linking create
		$('.seops_update_smart_linking').click(function() {

			var setting = {
				request			: 'create',
				keyword			: $.trim( $('input[name="seops_attr[smart_linking][keyword]"]').val() ),
				url				: $.trim( $('input[name="seops_attr[smart_linking][url]"]').val() ),
				cloaking		: $.trim( $('input[name="seops_attr[smart_linking][cloaking]"]').val() ),
				times			: $.trim( $('input[name="seops_attr[smart_linking][times]"]').val() ),
			};

			$.fn.seops_ajax_request( 'smart_linking', setting, true, $.fn.seops_callback_smart_link_create );

		});


		// Smart linking delete
		$('.seops_delete_smart_linking').click(function() {

			var setting = {
				request			: 'delete',
				id				: $(this).attr('data-id')
			};

			$.fn.seops_ajax_request( 'smart_linking', setting );
		});


		// Smart linking show edit screen
		$('.seops_edit_smart_linking').click(function() {

			var setting = {
				request			: 'get',
				id				: $(this).attr('data-id'),
			};

			$.fn.seops_ajax_request( 'smart_linking', setting, false, $.fn.seops_callback_show_edit_screen );
		});


		// Smart linking edit update
		$('.seops_update_smart_linking_edit').click(function() {

			var setting = {
				request			: 'update',
				id				: $.trim( $('input[name="seops_attr[smart_linking][edit_id]"]').val() ),
				keyword			: $.trim( $('input[name="seops_attr[smart_linking][edit_keyword]"]').val() ),
				url				: $.trim( $('input[name="seops_attr[smart_linking][edit_url]"]').val() ),
				cloaking		: $.trim( $('input[name="seops_attr[smart_linking][edit_cloaking]"]').val() ),
				times			: $.trim( $('input[name="seops_attr[smart_linking][edit_times]"]').val() ),
			};

			$.fn.seops_ajax_request( 'smart_linking', setting, true );
		});

		// Site Audit
		$('.seops_update_site_audit').click(function() {
			var setting = {
				request			: 'do_analyze'
			};
			$.fn.seops_ajax_request( 'site_audit', setting, true, $.fn.seops_callback_site_audit );
		});

		// Custom Role Create
		$('.seops_update_role').click(function() {

			var capabilities = [];
			$.each( $('.seops_form_role_create_capabilities').serializeArray(), function(index, row) {
				capabilities.push( row.value );
			});

			var setting = {
				request			: 'create',
				name			: $.trim( $('input[name="seops_attr[role][name]"]').val() ),
				capabilities 	: capabilities
			};

			$.fn.seops_ajax_request( 'role', setting, true, $.fn.seops_callback_role_create );
		});

		// Custom Role Delete
		$('.seops_update_role_delete').click(function() {
			var setting = {
				request		: 'delete',
				id 			: $(this).attr('data-id')
			};
			$.fn.seops_ajax_request( 'role', setting, true, $.fn.seops_callback_role_delete );
		});

		// Custom Role Apply User
		$('.seops_update_apply_user').click(function() {

			var user_name = $.trim( $(this).prev('.seops_apply_role').find('.seops_user_search').val() );
			var role_id = $(this).prev('.seops_apply_role').find('.seops_user_search').attr('data-role');
			if( user_name.length <= 0 )
			{
				$.fn.show_seops_message( 'warning', 'Please enter a user\'s name.' );
				return;
			}

			var setting = {
				request		: 'apply',
				user_name	: user_name,
				role_id		: role_id
			};

			$.fn.seops_ajax_request( 'role', setting, true, $.fn.seops_callback_role_refresh_user );
		});

		// Setting LSI Save
		$('.seops_update_lsi').click(function() {
			var setting = {
				request		: 'update',
				lsikey		: $.trim( $('input[name="seops_attr[lsi][key]"]').val() ),
				language	: $('select[name="seops_attr[lsi][language]"]').val()
			};

			$.fn.seops_ajax_request( 'lsi', setting, true );
		});

		// Setting LSI Validate Key
		$('.seops_update_lsi_validate').click(function() {
			var setting = {
				request		: 'validate',
				lsikey		: $.trim( $('input[name="seops_attr[lsi][key]"]').val() ),
				language	: $('input[name="seops_attr[lsi][language]"]').val()
			};

			$.fn.seops_ajax_request( 'lsi', setting, true );
		});

		// Setting Advanced
		$('.seops_update_setting_advanced').click(function() {

			var setting = {
				locale													: $('select[name="seops_attr[advanced][locale]"]').val(),
				analyze_full_page								: $('input[name="seops_attr[advanced][analyze_full_page]"]:checked').val(),
				on_page_box_auto_slide					: $('input[name="seops_attr[advanced][on_page_box_auto_slide]"]').is(':checked') ? 1 : 0,
				on_page_box_auto_analysis				: $('input[name="seops_attr[advanced][on_page_box_auto_analysis]"]').is(':checked') ? 1 : 0,
				on_page_automate_description		: $('input[name="seops_attr[advanced][on_page_automate_description]"]').is(':checked') ? 1 : 0,
				on_page_automate_canonical			: $('input[name="seops_attr[advanced][on_page_automate_canonical]"]').is(':checked') ? 1 : 0,
				special_characters_to_omit			: $('textarea[name="seops_attr[advanced][special_characters_to_omit]"]').val(),
				minimum_score_to_publish				: $('input[name="seops_attr[advanced][minimum_score_to_publish]"]').val(),
				support_multibyte								: $('input[name="seops_attr[advanced][support_multibyte]"]').is(':checked') ? 1 : 0,
			};

			$.fn.seops_ajax_request( 'advanced', setting, true );
		});

		$('.seops_update_upgrade').click(function() {

			var setting = {};
			$.fn.seops_ajax_request( 'upgrade', setting, true );

		});

		// Setting Activation
		$('.seops_update_activate').click(function() {

			var setting = {
				receipt		: $.trim( $('input[name="seops_attr[activation][receipt]"]').val() )
			};

			$.fn.seops_ajax_request( 'activate', setting, true );

		});

		// Link Manager Refresh All
		$('.seops_update_refreshall').click(function() {
			var setting = {
				request: 'refreshall'
			};

			$.fn.seops_ajax_request( 'linkmanager', setting, false );
		});

		// Link Manager Refresh Single
		$('.seops_update_refreshsingle').click(function() {
			var setting = {
				request: 'refreshsingle'
			};

			$.fn.seops_ajax_request( 'linkmanager', setting, false, $.fn.seops_callback_link_manager_refresh_single );
		});

		// Site Audit Cancel Button
		$(document.body).on('click', '.seops_trigger_cancel_audit' ,function(){
			$(this).prev('a').html('Cancelling');
			$(this).remove();
			var setting = {
				request: 'cancelaudit'
			};
			$.fn.seops_ajax_request( 'site_audit', setting, false, $.fn.seops_callback_site_audit_cancel );
		});

		// Report Domain Submit
		$('.seops_trigger_report').click(function() {
			var domain = $('input[name="seops_attr[report][domain]"]').val();
			var reason = $('select[name="seops_attr[report][reason]"]').val();
			var message = $('textarea[name="seops_attr[report][message]"]').val();
			var setting = {
				request: 'report',
				domain: domain,
				reason: reason,
				message: message
			};
			$.fn.seops_ajax_request( 'report_domain', setting, true, $.fn.seops_callback_report_domain );
		});


		var frame;
		$('.seop_sitewide_social_uploader_wrap').on('click', this, function(e) {
			e.preventDefault();
			if( $(e.target).hasClass('seop_sitewide_social_uploader_remove') )
			{
				$( this ).children( '.seop_sitewide_social_uploader_image' ).css( 'background-image', 'none' );
				$( this ).children( 'input[type=hidden]' ).val( '' );
				$( this ).children( '.seop_sitewide_social_uploader_remove' ).hide();
			}
			else
			{
				var wrapper = $(this);

				frame = wp.media({
					title: 'Pick One Image',
					button: {
					  text: 'Use this image'
					},
					multiple: false  // Set to true to allow multiple files to be selected
				});

				frame.on( 'select', function() {
					var attachment = frame.state().get('selection').first().toJSON();
					$( wrapper ).children( 'input[type=hidden]' ).val( attachment.url );
					$( wrapper ).children( '.seop_sitewide_social_uploader_image' ).css( 'background-image', 'url('+attachment.url+')' );
					$( wrapper ).children( '.seop_sitewide_social_uploader_remove' ).show();
				});

				frame.open();
			}
		});



	});




















	/* --------------- Custom Function Set ---------------- */

	// Main & sub tabs
	$.fn.main_tab_init = function( obj ) {
		var idx = $(obj).index();
		$(obj).addClass('active').siblings().removeClass('active');
		$('.seops_main_tab').hide().eq(idx).show();
	};
	$.fn.sub_tab_init = function( obj ) {

		var idx = $(obj).index();
		$(obj).addClass('active').siblings().removeClass('active');
		obj.parent().parent().find('.seops_sub_tab').hide().eq(idx).show();
	};


	// Ajax loading animation
	$.fn.seops_loader = function( action ) {
		if( action == 'show' )
		{
			$( '.seops_action a, .seops_s4' ).addClass('seops_loading_circle').prepend( '<img src="">' );
			$( '.seops_action a, .seops_s4' ).find( 'img' ).prop( 'src', var_js.plugin_url + 'templates/images/ajax-loader2.gif' );

		}
		else
		{
			$( '.seops_wrap' ).append('<div class="seops_overlay_white"></div>');
			$( '.seops_overlay_white' ).fadeOut(800);
			$( '.seops_action a, .seops_s4' ).removeClass('seops_loading_circle').find( 'img' ).remove();
		}
	};


	// Callback function for local setting
	$.fn.seops_callback_local = function( data ) {
		$('input[name="seops_attr[local][complete_address]"]').prop('checked', data.response.complete_address);
		$('input[name="seops_attr[local][complete_contact]"]').prop('checked', data.response.complete_contact);
		$('input[name="seops_attr[local][complete_operating]"]').prop('checked', data.response.complete_operating);
	};


	// Callback function for sitemap generator
	$.fn.seops_callback_sitemap = function( data ) {
		if(
			typeof(data.response.sitemapurl) != "undefined" &&
			data.response.sitemapurl.length > 0 &&
			typeof(data.response.creationdate) != "undefined" &&
			data.response.creationdate.length > 0
		)
		{
			$('.seops_sitemap_url').attr( 'href', data.response.sitemapurl ).html( data.response.sitemapurl );
			$('.seops_sitemap_date').html( data.response.creationdate );
			$('.seops_sitemap_info_valid').show();
			$('.seops_sitemap_info_invalid').hide();
			$('.seops_sitemap_info').show();
		}
		else
		{
			$('.seops_sitemap_info_valid').hide();
			$('.seops_sitemap_info_invalid').show();
			$('.seops_sitemap_info').hide();
		}
	};


	// Callback function for smart linking show edit screen
	$.fn.seops_callback_show_edit_screen = function( data ) {
		$('input[name="seops_attr[smart_linking][edit_id]"]').val( data.response.id );
		$('input[name="seops_attr[smart_linking][edit_keyword]"]').val( data.response.keywords );
		$('input[name="seops_attr[smart_linking][edit_url]"]').val( data.response.url );
		$('input[name="seops_attr[smart_linking][edit_cloaking]"]').val( data.response.cloaking_folder );
		$('input[name="seops_attr[smart_linking][edit_times]"]').val( data.response.how_many );
		$('.seops_sub_switcher a').eq(2).click();
	};


	// Callback function for site audit
	$.fn.seops_callback_site_audit = function( data ) {
		$( '.seops_update_site_audit' ).html( 'Analyzing <span class="seops_ajax_loader_analysis_wrap"><span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_1"></span><span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_2"></span><span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_3"></span><span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_4"></span><span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_5"></span><span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_6"></span><span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_7"></span><span class="seops_ajax_loader_analysis_bullet seops_ajax_loader_analysis_bullet_8"></span></span>' ).unbind();
		$( '.seops_update_site_audit' ).after('<a class="seops_trigger_cancel_audit seops_s16 seops_mr_16"></a>');
		$( '.seops_audit_ect' ).html( 'Estimated Completion Time: ' + data.ect );
	};


	// Callback function for custom role creation
	$.fn.seops_callback_role_create = function( data ) {
		if( data.type == 'notification' )
		{
			$('input[name="seops_attr[role][name]"]').val('');
			$('input[name="seops_attr[role][capabilities][]"]').prop('checked', false);
		}
	};


	// Callback function for custom role delete
	$.fn.seops_callback_role_delete = function( data ) {
		$('a[data-id="'+data.response.id+'"]').closest('tr').remove();
	};


	// Callback function for custom role refresh user
	$.fn.seops_callback_role_refresh_user = function( data ) {
		if( data.type == 'notification' )
		{
			var role_id = data.response.role_id;
			var user_html = '';
			$.each( data.response.active_users, function(index, value) {
				user_html += '<span class="seops_user_block" data-name="' + value + '">' + value + '<a class="seops_user_block_remove"></a></span>';
			});

			$('#seops_role_wrap_id_'+role_id).find('.seops_user_search').val('');
			$('#seops_role_wrap_id_'+role_id).find('.seops_role_active_users').html( user_html );
		}
	};


	// Callback function smart link create
	$.fn.seops_callback_smart_link_create = function( data ) {
		if( data.type == 'notification' )
		{
			$('input[name="seops_attr[smart_linking][keyword]"], input[name="seops_attr[smart_linking][url]"], input[name="seops_attr[smart_linking][cloaking]"], input[name="seops_attr[smart_linking][times]"]').val('');
		}
	};


	// Callback function link manager refresh single
	$.fn.seops_callback_link_manager_refresh_single = function( data ) {
		var httpcode = parseInt(data.httpcode);
		if( httpcode == 0 || httpcode >= 400 )
		{
			$('tr["data-id"="'+data.id+'"]').find('.col_status').html('<span class="seops_red">Broken</span>');
		}
		else
		{
			$('tr["data-id"="'+data.id+'"]').find('.col_status').html('<span class="seops_green">Alive</span>');
		}
	};

	// Callback function site audit cancel
	$.fn.seops_callback_site_audit_cancel = function( data ) {
		$('.seops_update_site_audit').html('Analyze Website');
		$('.seops_trigger_cancel_audit').remove();
		$('.seops_audit_ect').remove();
	};

	// Callback function report domain
	$.fn.seops_callback_report_domain = function( data ) {
		$('.seops_report_wrap').find('input[name="seops_attr[report][domain]"]').val('');
		$('.seops_report_wrap').find('.seops_report_field_domain').html('');
		$('.seops_report_wrap').fadeOut('fast');
	};








	// Display notification message
	$.fn.show_seops_message = function( type, message, autohide ) {


		$('.seops_message').stop(true, true).hide().removeClass( 'seops_notification seops_warning' );

		if( type == 'notification' )
		{
			$('.seops_message').addClass( 'seops_notification' );
		}

		if( type == 'warning' )
		{
			$('.seops_message').addClass( 'seops_warning' );
		}

		if( type == 'error' )
		{
			$('.seops_message').addClass( 'seops_error' );
		}

		$('.seops_message').html( message ).slideDown();

		$('html, body').animate({scrollTop:0}, 'slow');

		if( autohide == true )
		{
			clearTimeout(timer);
			timer = setTimeout(function() {
				$('.seops_message').slideUp();
			}, 6000);
		}

	};


	// Common ajax request function
	$.fn.seops_ajax_request = function( object, setting, show_message, callback_function ) {

		if( ajax_runner == true )
			return;

		var data = {
			action	: 'seops_ajax',
			object	: object,
			data	: setting
		};

		$.ajax({
			async     : true,
			cache     : false,
			type      : 'POST',
			url       : ajaxurl,
			data      : data,
			dataType  : 'json',
			timeout   : 45000,
			beforeSend: function()
			{
				ajax_runner = true;
				$.fn.seops_loader('show');
			},
			complete  : function()
			{
				ajax_runner = false;
				$.fn.seops_loader('hide');
			},
			error     : function (a, b, c)
			{
				ajax_runner = false;
			},
			success   : function(data)
			{
				ajax_runner = false;

				if( callback_function )
				{
					callback_function(data);
				}

				if( show_message == true )
				{
					$.fn.show_seops_message( data.type, data.message, true );
					if( data.do_reload == true )
					{
						setTimeout( function() {
							location.reload();
						}, 3000);
					}
				}
				else
				{
					if( data.do_reload == true )
						location.reload();
				}

			}
		});

	};


	$.fn.get_query_string_variable = function(variable)
	{
		var query = window.location.search.substring(1);
		var vars = query.split('&');
		for (var i=0; i<vars.length; i++)
		{
			var pair = vars[i].split('=');
			if (pair[0] == variable)
			{
				return pair[1];
			}
		}

		return false;
	};


	$.fn.setup_se_preview = function() {
		if( $('textarea[name="seops_attr[home][title]"]').val().length <= 0 )
			var title = $('textarea[name="seops_attr[home][title]"]').attr('data-preview');
		else
		{
			var title = $('textarea[name="seops_attr[home][title]"]').val();
			if( title.length > 100 )
				title = title.substr(0, 100) + '...';
		}
		if( $('textarea[name="seops_attr[home][description]"]').val().length <= 0 )
			var description = $('textarea[name="seops_attr[home][description]"]').attr('data-preview');
		else
		{
			var description = $('textarea[name="seops_attr[home][description]"]').val();
			if( description.length > 300 )
				description = description.substr(0, 300) + '...';
		}

		$('.seops_meta_preview_title').html( title );
		$('.seops_meta_preview_description').html( description );
	};







})(jQuery);
