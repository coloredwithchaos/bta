jQuery.noConflict();

(function( $ ) {

	var ajax_runner = false;

	$(function() {





        /*$('textarea[placeholder*="\n"]').each(function(){

                // Store placeholder elsewhere and blank it
                $(this).attr('data-placeholder', $(this).attr('placeholder'));
                $(this).attr('placeholder', '');

                // On focus, if value = placeholder, blank it
                $(this).focus(function(e){
                        if( $(this).val() == $(this).attr('data-placeholder') ) {
                                $(this).attr('value', '');
                                $(this).removeClass('placeholder');
                        }
                });

                // On blur, if value = blank, insert placeholder
                $(this).blur(function(e){
                        if( $(this).val() == '' ) {
                                $(this).attr('value', $(this).attr('data-placeholder'));
                                $(this).addClass('placeholder');
                        }
                });

                // Call blur method to preset element - this will insert the placeholder
                // if the value hasn't been prepopulated
                $(this).blur();
        });*/


		/*$('form').keypress(function (e) {
			var charCode = e.charCode || e.keyCode || e.which;
			if (charCode  == 13) {
				$('.seop_screen_score_refresh').click();
				return false;
			}
		});*/

		window.onload = function () {
			$.fn.init_height_main_tab();
		}

		/*
		Init Inner Content Height
		This need to execute before main tab initialization
		*/
		/*$('.seop_onscreen_subtab_inner_body').each(function(index, element) {
			//console.log( $( '.seop_onscreen_box_wrap' ).outerHeight() );
			//console.log( $( '.seop_onscreen_nav_main' ).outerHeight() );
			//console.log( $( this ).parent().siblings( '.seop_onscreen_subtab' ).outerHeight() );
			//console.log( $( this ).prev('.seop_onscreen_subtab_inner_head').outerHeight() );
			//console.log( $( this ).closest('.seop_onscreen_tab').find('.seop_onscreen_box_action').outerHeight() );
			//console.log( ( $(this).outerHeight() - $(this).height() ) );
            var height_left =
				$( '.seop_onscreen_box_wrap' ).outerHeight() - // total height
				$( '.seop_onscreen_nav_main' ).outerHeight() - // main nav height
				$( this ).parent().siblings( '.seop_onscreen_subtab' ).outerHeight() - // sub navigation height
				$( this ).prev('.seop_onscreen_subtab_inner_head').outerHeight() - // top selection height
				$( this ).closest('.seop_onscreen_tab').find('.seop_onscreen_box_action').outerHeight() - // bottom action area height
				( $(this).outerHeight() - $(this).height() ); // element padding
			$(this).css( 'height', height_left+'px' );
			//console.log( height_left );
        });*/


		/* Main Tab */
		$('.seop_onscreen_nav_main_switch').click(function() {
			$.fn.seop_switch_tab( $(this).attr( 'rel' ) );
		});

		/* Sub Tab Schema */
		$('.seop_onscreen_nav_sub_switch_schema').click(function() {
			$.fn.seop_switch_subtab_schema( $(this).attr('rel') );
		});
		// init subtab schema
		//jQuery.fn.seop_switch_subtab_schema( 'subtab_seop_schema' );


		/* Sub Tab Social */
		$('.seop_onscreen_nav_sub_switch_social').click(function() {
			$.fn.seop_switch_subtab_social( $(this).attr('rel') );
		});
		// init subtab schema
		//jQuery.fn.seop_switch_subtab_social( 'subtab_seop_facebook' );


		/* Meta Setting Preview */
		$('.seop_onscreen_box_action_preview').click(function(){
			$.fn.update_preview_box();
			if( $('.seop_onscreen_box_meta_preview_wrap').stop(true, true).css('display') == 'none' )
			{
				$(this).html('Close Preview');
			}
			else
			{
				$(this).html('Preview');
			}
			$('.seop_onscreen_box_meta_preview_wrap').fadeToggle('fast');
		});


		/* Synchronize input field and preview */
		$('textarea[name="seop_attr[meta_title]"], textarea[name="seop_attr[meta_description]"]').on('change keyup paste', function() {
			$.fn.update_preview_box();
		});


		/* Score Sub Tab */
		$('#seopressor_postbox').on('click', '.seop_onscreen_score_tab_head', function() {
			var obj = $(this).next('.seop_onscreen_score_tab_selection');
			obj.stop(true, true);
			if( obj.css('display') == 'none' )
				$(this).addClass('collapse');
			else
				$(this).removeClass('collapse');
			$(this).next('.seop_onscreen_score_tab_selection').toggle();
		});
		$('#seopressor_postbox').on('click', '.seop_onscreen_score_tab_selection a', function() {
			$.fn.seop_switch_score_tab( $(this) );
		});
		// Init score sub tab
		$('.seop_onscreen_score_tab_wrap').each(function(index, element) {
            $(this).children().children().children('a').eq(0).click();
        });


		/* Sub Tab Inner Selection */
		$('.seop_onscreen_selection_tab').on('change', this, $.fn.seop_switch_subtab_inner_selection);


		/* Input Datepicker */
		$('.seop_datepicker').datepicker({
			'dateFormat' : 'yy-mm-dd'
		});


		/* Media Uploader Button */
		/*var frame;
		$( '.seop_onscreen_uploader_open' ).on( 'click', this, function(event)
		{
			event.preventDefault();
			var obj = $(this);
			var wrapper = $(this).parent('.seop_onscreen_uploader_wrap');

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
				$( wrapper ).children( '.seop_onscreen_uploader_image' ).css( 'background-image', 'url('+attachment.url+')' );
				$( obj ).hide();
				$.fn.seop_panel( 'show' );
			});

			frame.on( 'close', function() {
				$.fn.seop_panel( 'show' );
			});

			$.fn.seop_panel( 'hide' );
			frame.open();

		});
		$( '.seop_onscreen_uploader_remove' ).on( 'click', this, function(event)
		{
			event.preventDefault();
			$( this ).prev( '.seop_onscreen_uploader_image' ).css( 'background-image', 'none' );
			$( this ).next( 'input[type=hidden]' ).val( '' );
			$( this ).next().next( '.seop_onscreen_uploader_open' ).show();
		});*/


		var frame;
		$('.seop_onscreen_uploader_wrap').on('click', this, function(e) {
			e.preventDefault();
			if( $(e.target).hasClass('seop_onscreen_uploader_remove') )
			{
				$( this ).children( '.seop_onscreen_uploader_image' ).css( 'background-image', 'none' );
				$( this ).children( 'input[type=hidden]' ).val( '' );
				$( this ).children( '.seop_onscreen_uploader_remove' ).hide();
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
					$( wrapper ).children( '.seop_onscreen_uploader_image' ).css( 'background-image', 'url('+attachment.url+')' );
					$( wrapper ).children( '.seop_onscreen_uploader_remove' ).show();
				});

				frame.open();
			}
		});


		/* Expand or Collapse whole panel */
		$('.seop_panel_action').click(function() {
			$.fn.seop_panel( $(this).attr('rel') );
		});


		/* On Off Switch */
		$('.seop_status_switch').seops_lc_switch();


		/* Hide Overlay Temporary during development period */
		$.fn.seop_loader('hide');


		/* Meta Robots Rules Check/Uncheck All Function */
		$('.seop_meta_checkall').click(function() {
			if( $(this).is(':checked') )
			{
				$('input[name="seop_attr[meta_rules][]"]').each(function(index, element) {
                    $(this).prop('checked', true);
                });
			}
			else
			{
				$('input[name="seop_attr[meta_rules][]"]').each(function(index, element) {
                    $(this).prop('checked', false);
                });
			}
		});


		/* Refresh / Update button clicked */
		$('.seop_screen_score_refresh', '#seopressor_postbox').add('.seop_onscreen_setting_update', '#seopressor_postbox').click(function() {
			$.fn.seop_update_box();
		});


		// Animation for suggestion & LSI keyword
		$('.seop_onscreen_score_result_switch').click(function() {
			var target = $(this).next('.seop_onscreen_score_result_content');
			target.stop(true, true);
			if( target.css('display') == 'block' )
			{
				$(this).removeClass('expanded');
				target.slideUp(300, function() {
					var show_hint = true;
					$('.seop_onscreen_score_result_content').each(function(idx, ele) {
                        if( $(ele).css('display') == 'block' )
							show_hint = false;
                    });
					if( show_hint == true )
						$('.seop_onscreen_score_result_hint').fadeIn('fast');
					else
						$('.seop_onscreen_score_result_hint').fadeOut('fast');
					$('.seop_onscreen_score_result_scroll').simplebar('recalculate');
					$('.seop_onscreen_score_tab_content_wrap').simplebar('recalculate');
				});
			}
			else
			{
				$(this).addClass('expanded');
				target.slideDown(300, function() {
					var show_hint = true;
					$('.seop_onscreen_score_result_content').each(function(idx, ele) {
                        if( $(ele).css('display') == 'block' )
							show_hint = false;
                    });
					if( show_hint == true )
						$('.seop_onscreen_score_result_hint').fadeIn('fast');
					else
						$('.seop_onscreen_score_result_hint').fadeOut('fast');
					$('.seop_onscreen_score_result_scroll').simplebar('recalculate');
					$('.seop_onscreen_score_tab_content_wrap').simplebar('recalculate');
				});
			}
		});


		// Meta description character counter
		$('.seop_char_counter').on('change keyup paste', function() {
			var characters = $.trim( $(this).val() ).length;
			$(this).next('.seop_char_counter_disp').html( characters );
		});

		$(document).on("click", ".editor-post-save-draft, .editor-post-publish-button", function() {
			$.fn.seop_update_box();
		})

		// Do analysis or get cache result
		if ( !$('body').hasClass('post-new-php') )
		{
        	$.fn.seop_update_box();
        }
        else // Is the Add New page so first_query == false;
		{
            first_query = false;
			$.fn.seop_append_ready_status();
        }


		// Tooltips
		$( '.seop_tooltips' ).tooltip({
			tooltipClass: "seop_tooltips_content",
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

		// Custom Tooltips
		$( '.seop_tooltips_custom' ).tooltip({
			tooltipClass: "seop_tooltips_content",
			position: {
				my: "center bottom-5",
				at: 'center top'
			},
			content: function () {
				return $(this).children('span.seop_tips').html();
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


		$('.seop_schema_review_selection').on('change', this, function() {
			var group = $('option:selected', this).attr('data-group');
			$('.seop_attr_group').hide();
			if( typeof group !== 'undefined' )
			{
				$( '.' + group ).show();
			}
		});


		/*$('.seop_screen_score_refresh').tooltip({
			tooltipClass: "seop_tooltips_content",
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
		});*/


		// off screen expand button
		$('.seop_offscreen_expand').click(function() {
			$.fn.seop_panel( 'show' );
		});


	});


	// Window loaded, postbox slide in and do some initialization
	$(window).load(function() {

		// show whole seopressor panel
		if( parseInt(var_js.auto_slide) == 1 )
			$.fn.seop_panel( 'show' );

		// init main tab
		$.fn.seop_switch_tab( 'tab_seop_score' );

		// init sub tab schema
		$.fn.seop_switch_subtab_schema( 'subtab_seop_schema' );

		// init sub tab social
		$.fn.seop_switch_subtab_social( 'subtab_seop_facebook' );

		$('.seop_onscreen_score_result_content').hide();

	});



	var first_query = true;
	var page_on_load = true;

	/* Function to update box attributes */
	$.fn.seop_update_box = function() {

		if( ajax_runner == true )
			return;

		var seop_separator = "#|#|#";

		var preattr_keywords = {};
		$('input[name="seop_attr[keyword][]"]', '#seopressor_postbox').each(function(index, element) {
            if( $.trim( $(this).val() ).length > 0 )
			{
				preattr_keywords[index] = $.trim( $(this).val() );
			}
        });

		var preattr_meta_rules = [];
		$('input[name="seop_attr[meta_rules][]"]', '#seopressor_postbox').each(function(index, element) {
			if( $(this).is(':checked') )
			{
				//preattr_meta_rules += $(this).val() + seop_separator;
				preattr_meta_rules.push( $(this).val() );
			}
		});
		preattr_meta_rules = preattr_meta_rules.join( seop_separator );

		/*var preattr_schema_NewsArticle_image = [];
		$('input[name="seop_attr[schema_NewsArticle_image][]"]', '#seopressor_postbox').each(function(index, element) {
			if( $.trim($(this).val()).length > 0 )
			{
				//preattr_schema_NewsArticle_image += $.trim($(this).val()) + seop_separator;
				preattr_schema_NewsArticle_image.push( $.trim($(this).val()) );
			}
		});
		preattr_schema_NewsArticle_image = preattr_schema_NewsArticle_image.join( seop_separator );*/

		var post_name = $('#editable-post-name-full').text() == '' ? '' : $('#editable-post-name-full').text();
		var post_content = typeof $('#content').val() == 'undefined' ? typeof $('#post-content-0').val() == 'undefined' ? $('.mce-content-body').html(): $('#post-content-0').val() : $('#content').val();
		var post_title = typeof $('#title').val() == 'undefined' ? $('#post-title-0').val() : $('#title').val();
		if (!first_query) post_name = $('#editable-post-name-full').text() == '' ? $("#wp-admin-bar-root-default > li:last-child").find("a").attr("href").split("/").reverse()[0] == "" ? $("#wp-admin-bar-root-default > li:last-child").find("a").attr('href').split("/").reverse()[1] : $("#wp-admin-bar-root-default > li:last-child").find("a").attr('href').split("/").reverse()[0] : $('#editable-post-name-full').text()
		var auto_analysis_onload = page_on_load ? var_js.auto_analysis : true;
		var data_options = {

			/* General needed data */
			first_query         	: first_query,
			action              	: 'seopressor_box_new',
			object              	: 'box',
			post_id             	: $('#seop_attr_post_id').text(),
			post_content          : post_content,
			post_title          	: post_title,
			post_name           	: post_name,
			settings				: {},
			auto_analysis		: auto_analysis_onload
		};

		// add keyword if have permission
		if( $('input[name="seop_attr[keyword][]"]', '#seopressor_postbox').length > 0 )
		{
			data_options.keywords = preattr_keywords;
		}

		// add meta tab if have permission
		if( $('textarea[name="seop_attr[meta_title]"]', '#seopressor_postbox').length > 0 )
		{
			data_options.settings.meta_title 		= $('textarea[name="seop_attr[meta_title]"]', '#seopressor_postbox').val();
			data_options.settings.meta_description 	= $('textarea[name="seop_attr[meta_description]"]', '#seopressor_postbox').val();
			data_options.settings.meta_canonical 	= $('input[name="seop_attr[meta_canonical]"]', '#seopressor_postbox').val();
			data_options.settings.meta_redirect 	= $('input[name="seop_attr[meta_redirect]"]', '#seopressor_postbox').val();
			data_options.settings.meta_rules 		= preattr_meta_rules;
		}

		// add social tab if have permission
		if( $('input[name="seop_attr[fb_enable]"]', '#seopressor_postbox').length > 0 )
		{
			// fb
			data_options.settings.fb_enable 		= $('input[name="seop_attr[fb_enable]"]', '#seopressor_postbox').is(':checked') ? 1 : 0;
			data_options.settings.fb_type 			= $('select[name="seop_attr[fb_type]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.fb_url 			= $('input[name="seop_attr[fb_url]"]', '#seopressor_postbox').val();
			data_options.settings.fb_site_name 		= $('input[name="seop_attr[fb_site_name]"]', '#seopressor_postbox').val();
			data_options.settings.fb_title 			= $('input[name="seop_attr[fb_title]"]', '#seopressor_postbox').val();
			data_options.settings.fb_img 			= $('input[name="seop_attr[fb_img]"]', '#seopressor_postbox').val();
			data_options.settings.fb_description 	= $('textarea[name="seop_attr[fb_description]"]', '#seopressor_postbox').val();
			data_options.settings.fb_publisher 		= $('input[name="seop_attr[fb_publisher]"]', '#seopressor_postbox').val();
			data_options.settings.fb_author 		= $('input[name="seop_attr[fb_author]"]', '#seopressor_postbox').val();
			data_options.settings.fb_admin 			= $('textarea[name="seop_attr[fb_admin]"]', '#seopressor_postbox').val();
			data_options.settings.fb_appid 			= $('input[name="seop_attr[fb_appid]"]', '#seopressor_postbox').val();

			// twitter
			data_options.settings.tw_enable			= $('input[name="seop_attr[tw_enable]"]', '#seopressor_postbox').is(':checked') ? 1 : 0;
			data_options.settings.tw_type			= $('select[name="seop_attr[tw_type]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.tw_site			= $('input[name="seop_attr[tw_site]"]', '#seopressor_postbox').val();
			data_options.settings.tw_creator		= $('input[name="seop_attr[tw_creator]"]', '#seopressor_postbox').val();
			data_options.settings.tw_title			= $('input[name="seop_attr[tw_title]"]', '#seopressor_postbox').val();
			data_options.settings.tw_description	= $('textarea[name="seop_attr[tw_description]"]', '#seopressor_postbox').val();
			data_options.settings.tw_image			= $('input[name="seop_attr[tw_image]"]', '#seopressor_postbox').val();
		}

		// add schema tab if have permission
		if( $('input[name="seop_attr[schema_enable]"]', '#seopressor_postbox').length > 0 )
		{
			// schema org
			data_options.settings.schema_enable						= $('input[name="seop_attr[schema_enable]"]', '#seopressor_postbox').is(':checked') ? 1 : 0;
			data_options.settings.schema_type						= $('select[name="seop_attr[schema_type]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.schema_NewsArticle_type			= $('select[name="seop_attr[schema_NewsArticle_type]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.schema_NewsArticle_headline		= $('input[name="seop_attr[schema_NewsArticle_headline]"]', '#seopressor_postbox').val();
			data_options.settings.schema_NewsArticle_description	= $('textarea[name="seop_attr[schema_NewsArticle_description]"]', '#seopressor_postbox').val();
			data_options.settings.schema_NewsArticle_image			= $('input[name="seop_attr[schema_NewsArticle_image]"]', '#seopressor_postbox').val();
			data_options.settings.schema_NewsArticle_pubname		= $('input[name="seop_attr[schema_NewsArticle_pubname]"]', '#seopressor_postbox').val();
			data_options.settings.schema_NewsArticle_publogo		= $('input[name="seop_attr[schema_NewsArticle_publogo]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_name				= $('input[name="seop_attr[schema_Product_name]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_image				= $('input[name="seop_attr[schema_Product_image]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_description		= $('textarea[name="seop_attr[schema_Product_description]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_brand				= $('input[name="seop_attr[schema_Product_brand]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_rating				= $('input[name="seop_attr[schema_Product_rating]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_review				= $('input[name="seop_attr[schema_Product_review]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_price				= $('input[name="seop_attr[schema_Product_price]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_currency			= $('input[name="seop_attr[schema_Product_currency]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Product_availability		= $('select[name="seop_attr[schema_Product_availability]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.schema_Product_condition			= $('select[name="seop_attr[schema_Product_condition]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.schema_Service_type				= $('input[name="seop_attr[schema_Service_type]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Service_provider_name		= $('input[name="seop_attr[schema_Service_provider_name]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Service_provider_type		= $('select[name="seop_attr[schema_Service_provider_type]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.schema_Service_rating				= $('input[name="seop_attr[schema_Service_rating]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Service_review				= $('input[name="seop_attr[schema_Service_review]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_name				= $('input[name="seop_attr[schema_Recipe_name]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_category			= $('input[name="seop_attr[schema_Recipe_category]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_image				= $('input[name="seop_attr[schema_Recipe_image]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_description			= $('textarea[name="seop_attr[schema_Recipe_description]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_rating				= $('input[name="seop_attr[schema_Recipe_rating]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_review				= $('input[name="seop_attr[schema_Recipe_review]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_time_preparation	= $('input[name="seop_attr[schema_Recipe_time_preparation]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_time_cook			= $('input[name="seop_attr[schema_Recipe_time_cook]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_time_total			= $('input[name="seop_attr[schema_Recipe_time_total]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_calories			= $('input[name="seop_attr[schema_Recipe_calories]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_size				= $('input[name="seop_attr[schema_Recipe_size]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_yield				= $('input[name="seop_attr[schema_Recipe_yield]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Recipe_ingredients			= $('textarea[name="seop_attr[schema_Recipe_ingredients]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_item				= $('select[name="seop_attr[schema_Review_item]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.schema_Review_rating				= $('input[name="seop_attr[schema_Review_rating]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_review				= $('input[name="seop_attr[schema_Review_review]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_article_headline	= $('input[name="seop_attr[schema_Review_article_headline]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_article_image		= $('input[name="seop_attr[schema_Review_article_image]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_article_author		= $('input[name="seop_attr[schema_Review_article_author]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_article_publisher	= $('input[name="seop_attr[schema_Review_article_publisher]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_article_publisherlogo = $('input[name="seop_attr[schema_Review_article_publisherlogo]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_book_author			= $('input[name="seop_attr[schema_Review_book_author]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_book_authorsameas	= $('input[name="seop_attr[schema_Review_book_authorsameas]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_book_isbn			= $('input[name="seop_attr[schema_Review_book_isbn]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_book_description	= $('textarea[name="seop_attr[schema_Review_book_description]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_book_publisher		= $('input[name="seop_attr[schema_Review_book_publisher]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_movie_sameas		= $('input[name="seop_attr[schema_Review_movie_sameas]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_movie_description	= $('textarea[name="seop_attr[schema_Review_movie_description]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_movie_publisher		= $('input[name="seop_attr[schema_Review_movie_publisher]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_software_category	= $('input[name="seop_attr[schema_Review_software_category]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Review_software_os				= $('input[name="seop_attr[schema_Review_software_os]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Event_name					= $('input[name="seop_attr[schema_Event_name]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Event_location				= $('input[name="seop_attr[schema_Event_location]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Event_address				= $('textarea[name="seop_attr[schema_Event_address]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Event_date					= $('input[name="seop_attr[schema_Event_date]"]', '#seopressor_postbox').val();
			data_options.settings.schema_SoftwareApplication_name	= $('input[name="seop_attr[schema_SoftwareApplication_name]"]', '#seopressor_postbox').val();
			data_options.settings.schema_SoftwareApplication_category = $('select[name="seop_attr[schema_SoftwareApplication_category]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.schema_SoftwareApplication_rating	= $('input[name="seop_attr[schema_SoftwareApplication_rating]"]', '#seopressor_postbox').val();
			data_options.settings.schema_SoftwareApplication_review	= $('input[name="seop_attr[schema_SoftwareApplication_review]"]', '#seopressor_postbox').val();
			data_options.settings.schema_SoftwareApplication_price	= $('input[name="seop_attr[schema_SoftwareApplication_price]"]', '#seopressor_postbox').val();
			data_options.settings.schema_SoftwareApplication_currency = $('input[name="seop_attr[schema_SoftwareApplication_currency]"]', '#seopressor_postbox').val();
			data_options.settings.schema_SoftwareApplication_os		= $('input[name="seop_attr[schema_SoftwareApplication_os]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Video_name					= $('input[name="seop_attr[schema_Video_name]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Video_description			= $('textarea[name="seop_attr[schema_Video_description]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Video_thumbnail			= $('input[name="seop_attr[schema_Video_thumbnail]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Video_date					= $('input[name="seop_attr[schema_Video_date]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Video_duration				= $('input[name="seop_attr[schema_Video_duration]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Video_url					= $('input[name="seop_attr[schema_Video_url]"]', '#seopressor_postbox').val();
			data_options.settings.schema_Video_url_embed			= $('input[name="seop_attr[schema_Video_url_embed]"]', '#seopressor_postbox').val();

			// dublin core
			data_options.settings.dc_enable			= $('input[name="seop_attr[dc_enable]"]', '#seopressor_postbox').is(':checked') ? 1 : 0;
			data_options.settings.dc_type			= $('select[name="seop_attr[dc_type]"] option:selected', '#seopressor_postbox').val();
			data_options.settings.dc_title			= $('input[name="seop_attr[dc_title]"]', '#seopressor_postbox').val();
			data_options.settings.dc_description	= $('textarea[name="seop_attr[dc_description]"]', '#seopressor_postbox').val();
			data_options.settings.dc_creator		= $('input[name="seop_attr[dc_creator]"]', '#seopressor_postbox').val();
		}

		$.ajax({
			cache     : false,
			data      : data_options,
			dataType  : 'json',
			type      : 'POST',
			url       : ajaxurl,
			beforeSend: function (xhr)
			{
				ajax_runner = true;
				$.fn.seop_loader( 'show' );
			},
			complete  : function()
			{
				ajax_runner = false;
				$.fn.seop_loader( 'hide' );
			},
			success   : function (response_from_server)
			{
				if( Object.keys(response_from_server.keywords).length > 0 )
				{
					if( response_from_server.analysis && typeof response_from_server.analysis != 'undefined' )
					{
						// print stat
						$.fn.seop_setup_stat( response_from_server );
					}

					// print result
					$.fn.seop_setup_result( response_from_server );
				}
				else
				{
					// reset score tab
					$.fn.seop_reset_score_tab_content( response_from_server );
				}

				var setting = response_from_server.box_settings;

				// configure all setting if first query
				if( first_query == true )
				{
					$.fn.seop_setup_box_data( setting, false );
				}
				else
				{
					$.fn.seop_setup_box_data( setting, true );
				}

				first_query = false;
				page_on_load = false;
				$.fn.seop_append_ready_status();
			}
		});

	};


	/* Function: Switch Main Tab */
	$.fn.seop_switch_tab = function( tabID ) {
		$( '.seop_onscreen_tab' ).hide();
		$( '#' + tabID ).show();
		$( '.seop_onscreen_nav_main_switch' ).removeClass('active');
		$( '.seop_onscreen_nav_main_switch[rel="'+tabID+'"]' ).addClass('active');
	};


	/* Function: Switch Sub Tab Schema */
	$.fn.seop_switch_subtab_schema = function( subtabID ) {
		$( '.seop_onscreen_subtab_schema' ).hide();
		$( '#' + subtabID ).show();
		$( '.seop_onscreen_nav_sub_switch_schema' ).removeClass('active');
		$( '.seop_onscreen_nav_sub_switch_schema[rel='+subtabID+']' ).addClass('active');
	};


	/* Function Switch Sub Tab Social */
	$.fn.seop_switch_subtab_social = function( subtabID ) {
		$( '.seop_onscreen_subtab_social' ).hide();
		$( '#' + subtabID ).show();
		$( '.seop_onscreen_nav_sub_switch_social' ).removeClass('active');
		$( '.seop_onscreen_nav_sub_switch_social[rel='+subtabID+']' ).addClass('active');
	};


	/* Function Switch Selection Score */
	$.fn.seop_switch_score_tab = function( obj ) {
		var idx = $(obj).index();
		var title = $(obj).html();
		if( title.length > 20 )
		{
			title = title.substring(0,20) + '...';
		}
		var type = $(obj).attr('data-type');
		$(obj).parent().prev('.seop_onscreen_score_tab_head').html( title ).click();
		$(obj).parent().parent().parent('.seop_onscreen_score_tab_wrap').children('.seop_onscreen_score_tab_content').hide().eq(idx).show();
		$('.seop_onscreen_score_tab_content_wrap').simplebar('recalculate');
	};


	/* Function Switch Sub Tab Inner Selection */
	$.fn.seop_switch_subtab_inner_selection = function() {
		var idx = $('option:selected', this).index();
		$(this).closest('.seop_onscreen_subtab_inner_head')
		.next('.seop_onscreen_subtab_inner_body')
		.children('.seop_onscreen_selection_content')
		.hide()
		.eq(idx)
		.show();
	};

	/* Function To Show/Hide Overlay */
	$.fn.seop_loader = function(action) {
		if( action == 'show' )
		{
			$( '.seop_screen_score_refresh' ).removeClass( 'seop_hint' ).find( 'img' ).prop( 'src', var_js.plugin_url + 'templates/images/icon-refresh.gif' );
			$( '.seop_onscreen_setting_update' ).addClass('seop_loading_circle').html( '<img src="">' + var_js.update_text );
			$( '.seop_onscreen_setting_update' ).find( 'img' ).prop( 'src', var_js.plugin_url + 'templates/images/ajax-loader2.gif' );
		}
		else
		{
			$( '.seop_onscreen_box' ).append('<div class="seop_overlay_white"></div>');
			$( '.seop_overlay_white' ).fadeOut(800);
			$( '.seop_screen_score_refresh' ).addClass( 'seop_hint' ).find( 'img' ).prop( 'src', var_js.plugin_url + 'templates/images/icon-refresh.png' );
			$( '.seop_onscreen_setting_update' ).removeClass('seop_loading_circle').html( var_js.update_text );
		}
	};

	/* Function to Expand/Collapse Whole Panel */
	$.fn.seop_panel = function(action) {
		if( action == 'show' )
		{
			$('.seop_onscreen_box_wrap').stop(true, true).animate({
				'right' : '0'
			},500);
			$('.seop_panel_expand').stop(true, true).attr('rel', 'hide').animate({
				'right' : '305px'
			}, 500);
			$('.seop_panel_expand').find('img').prop( 'src', var_js.plugin_url + 'templates/images/minify-right.png' );
			$(".edit-post-sidebar").css("overflow", "hidden");
		}
		else
		{
			$('.seop_onscreen_box_wrap').stop(true, true).animate({
				'right' : '-300px'
			},500);
			let rightIndex = $("div").hasClass("gutenberg") ? "16px" : "5px";
			$('.seop_panel_expand').stop(true, true).attr('rel', 'show').animate({
				'right' : rightIndex
			}, 500);
			$('.seop_panel_expand').find('img').prop( 'src', var_js.plugin_url + 'templates/images/minify-left.png' );
			$(".edit-post-sidebar").css("overflow", "auto");
		}
	};

	/* setup text fields */
	$.fn.seop_setup_box_data_text = function(key, value) {
		if( value != undefined && value != '' )
		{
			$('input[name="seop_attr['+key+']"]', '#seopressor_postbox').val( value );
		}
	};

	/* setup textarea fields */
	$.fn.seop_setup_box_data_textarea = function(key, value) {
		if( value != undefined && value != '' )
		{
			$('textarea[name="seop_attr['+key+']"]', '#seopressor_postbox').val( value ).trigger('change');
		}
	};

	/* setup select fields */
	$.fn.seop_setup_box_data_select = function(key, value) {
		if( value != undefined && value != '' )
		{
			$('select[name="seop_attr['+key+']"] option[value="'+value+'"]', '#seopressor_postbox').prop('selected', true);
		}
	};

	/* setup lcs on/off fields */
	$.fn.seop_setup_box_data_lcs = function(key, value) {
		if( value != undefined && value == 1 )
		{
			$('input[name="seop_attr['+key+']"]').seops_lcs_on();
		}
	};

	/* setup image fields */
	$.fn.seop_setup_box_data_image = function(multiple, key, value) {
		var seop_separator = "#|#|#";
		if( multiple == true )
		{
			if( value != undefined && value != '' )
			{
				var image_arr = value.split( seop_separator );
				$('input[name="seop_attr['+key+'][]"]', '#seopressor_postbox').each(function(index, element) {
					if( image_arr[index] != undefined && image_arr[index] != '' )
					{
						$(this).val( image_arr[index] );
						$(this).prev().prev('.seop_onscreen_uploader_image').css('background-image', 'url('+image_arr[index]+')');
						$(this).prev('.seop_onscreen_uploader_remove').show();
					}
				});
			}
		}
		else
		{
			if( value != undefined && value != '' )
			{
				$('input[name="seop_attr['+key+']"]', '#seopressor_postbox').val( value );
				$('input[name="seop_attr['+key+']"]', '#seopressor_postbox').prev().prev('.seop_onscreen_uploader_image').css('background-image', 'url('+value+')');
				$('input[name="seop_attr['+key+']"]', '#seopressor_postbox').prev('.seop_onscreen_uploader_remove').show();
			}
		}
	};

	/* main function to display previous setting when first ajax call */
	$.fn.seop_setup_box_data = function( setting, do_mandatory ) {

		var seop_separator = "#|#|#";

		/* only update few uneditable fields */
		if( do_mandatory == true )
		{
			$.fn.seop_setup_box_data_text( 'fb_url', setting.fb_url );
			$.fn.seop_setup_box_data_text( 'fb_site_name', setting.fb_site_name );
			$.fn.seop_setup_box_data_text( 'tw_site', setting.tw_site );
			$.fn.seop_setup_box_data_text( 'tw_creator', setting.tw_creator );
			$.fn.seop_setup_box_data_text( 'dc_creator', setting.dc_creator );
			// return;
		}



		/* Meta settings */
		$.fn.seop_setup_box_data_textarea( 'meta_title', setting.meta_title );
		$.fn.seop_setup_box_data_textarea( 'meta_description', setting.meta_description );
		$.fn.seop_setup_box_data_text( 'meta_canonical', setting.meta_canonical );
		$.fn.seop_setup_box_data_text( 'meta_redirect', setting.meta_redirect );
		if( setting.meta_rules != undefined && setting.meta_rules != '' )
		{
			var meta_rules_arr = setting.meta_rules.split( seop_separator );
			$('input[name="seop_attr[meta_rules][]"]', '#seopressor_postbox').each(function(index, element) {
				if( $.inArray( $(this).val(), meta_rules_arr) != -1 )
				{
					$(this).prop('checked', true);
				}
			});
		}

		/* Facebook setting */
		$.fn.seop_setup_box_data_lcs( 'fb_enable', setting.fb_enable );
		$.fn.seop_setup_box_data_select( 'fb_type', setting.fb_type );
		$.fn.seop_setup_box_data_text( 'fb_url', setting.fb_url );
		$.fn.seop_setup_box_data_text( 'fb_site_name', setting.fb_site_name );
		$.fn.seop_setup_box_data_text( 'fb_title', setting.fb_title );
		$.fn.seop_setup_box_data_image( false, 'fb_img', setting.fb_img );
		$.fn.seop_setup_box_data_textarea( 'fb_description', setting.fb_description );
		$.fn.seop_setup_box_data_text( 'fb_publisher', setting.fb_publisher );
		$.fn.seop_setup_box_data_text( 'fb_author', setting.fb_author );
		$.fn.seop_setup_box_data_textarea( 'fb_admin', setting.fb_admin );
		$.fn.seop_setup_box_data_text( 'fb_appid', setting.fb_appid );

		/* Twitter setting */
		$.fn.seop_setup_box_data_lcs( 'tw_enable', setting.tw_enable );
		$.fn.seop_setup_box_data_select( 'tw_type', setting.tw_type );
		$.fn.seop_setup_box_data_text( 'tw_site', setting.tw_site );
		$.fn.seop_setup_box_data_text( 'tw_creator', setting.tw_creator );
		$.fn.seop_setup_box_data_text( 'tw_title', setting.tw_title );
		$.fn.seop_setup_box_data_textarea( 'tw_description', setting.tw_description );
		$.fn.seop_setup_box_data_image( false, 'tw_image', setting.tw_image );

		/* Dublin Core setting */
		$.fn.seop_setup_box_data_lcs( 'dc_enable', setting.dc_enable );
		$.fn.seop_setup_box_data_select( 'dc_type', setting.dc_type );
		$.fn.seop_setup_box_data_text( 'dc_title', setting.dc_title );
		$.fn.seop_setup_box_data_textarea( 'dc_description', setting.dc_description );
		$.fn.seop_setup_box_data_text( 'dc_creator', setting.dc_creator );

		/* Schema setting */
		$.fn.seop_setup_box_data_lcs( 'schema_enable', setting.schema_enable );
		$.fn.seop_setup_box_data_select( 'schema_type', setting.schema_type );
		$.fn.seop_setup_box_data_select( 'schema_NewsArticle_type', setting.schema_NewsArticle_type );
		$.fn.seop_setup_box_data_text( 'schema_NewsArticle_headline', setting.schema_NewsArticle_headline );
		$.fn.seop_setup_box_data_textarea( 'schema_NewsArticle_description', setting.schema_NewsArticle_description );
		$.fn.seop_setup_box_data_image( false, 'schema_NewsArticle_image', setting.schema_NewsArticle_image );
		$.fn.seop_setup_box_data_text( 'schema_NewsArticle_pubname', setting.schema_NewsArticle_pubname );
		$.fn.seop_setup_box_data_image( false, 'schema_NewsArticle_publogo', setting.schema_NewsArticle_publogo );
		$.fn.seop_setup_box_data_text( 'schema_Product_name', setting.schema_Product_name );
		$.fn.seop_setup_box_data_image( false, 'schema_Product_image', setting.schema_Product_image );
		$.fn.seop_setup_box_data_textarea( 'schema_Product_description', setting.schema_Product_description );
		$.fn.seop_setup_box_data_text( 'schema_Product_brand', setting.schema_Product_brand );
		$.fn.seop_setup_box_data_text( 'schema_Product_rating', setting.schema_Product_rating );
		$.fn.seop_setup_box_data_text( 'schema_Product_review', setting.schema_Product_review );
		$.fn.seop_setup_box_data_text( 'schema_Product_price', setting.schema_Product_price );
		$.fn.seop_setup_box_data_text( 'schema_Product_currency', setting.schema_Product_currency );
		$.fn.seop_setup_box_data_select( 'schema_Product_availability', setting.schema_Product_availability );
		$.fn.seop_setup_box_data_select( 'schema_Product_condition', setting.schema_Product_condition );
		$.fn.seop_setup_box_data_text( 'schema_Service_type', setting.schema_Service_type );
		$.fn.seop_setup_box_data_text( 'schema_Service_provider_name', setting.schema_Service_provider_name );
		$.fn.seop_setup_box_data_select( 'schema_Service_provider_type', setting.schema_Service_provider_type );
		$.fn.seop_setup_box_data_text( 'schema_Service_rating', setting.schema_Service_rating );
		$.fn.seop_setup_box_data_text( 'schema_Service_review', setting.schema_Service_review );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_name', setting.schema_Recipe_name );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_category', setting.schema_Recipe_category );
		$.fn.seop_setup_box_data_image( false, 'schema_Recipe_image', setting.schema_Recipe_image );
		$.fn.seop_setup_box_data_textarea( 'schema_Recipe_description', setting.schema_Recipe_description );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_rating', setting.schema_Recipe_rating );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_review', setting.schema_Recipe_review );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_time_preparation', setting.schema_Recipe_time_preparation );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_time_cook', setting.schema_Recipe_time_cook );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_time_total', setting.schema_Recipe_time_total );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_calories', setting.schema_Recipe_calories );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_size', setting.schema_Recipe_size );
		$.fn.seop_setup_box_data_text( 'schema_Recipe_yield', setting.schema_Recipe_yield );
		$.fn.seop_setup_box_data_textarea( 'schema_Recipe_ingredients', setting.schema_Recipe_ingredients );
		$.fn.seop_setup_box_data_select( 'schema_Review_item', setting.schema_Review_item );
		$.fn.seop_setup_box_data_text( 'schema_Review_rating', setting.schema_Review_rating );
		$.fn.seop_setup_box_data_text( 'schema_Review_review', setting.schema_Review_review );
		$.fn.seop_setup_box_data_text( 'schema_Review_article_headline', setting.schema_Review_article_headline );
		$.fn.seop_setup_box_data_image( false, 'schema_Review_article_image', setting.schema_Review_article_image );
		$.fn.seop_setup_box_data_text( 'schema_Review_article_author', setting.schema_Review_article_author );
		$.fn.seop_setup_box_data_text( 'schema_Review_article_publisher', setting.schema_Review_article_publisher );
		$.fn.seop_setup_box_data_image( false, 'schema_Review_article_publisherlogo', setting.schema_Review_article_publisherlogo );
		$.fn.seop_setup_box_data_text( 'schema_Review_book_author', setting.schema_Review_book_author );
		$.fn.seop_setup_box_data_text( 'schema_Review_book_authorsameas', setting.schema_Review_book_authorsameas );
		$.fn.seop_setup_box_data_text( 'schema_Review_book_isbn', setting.schema_Review_book_isbn );
		$.fn.seop_setup_box_data_textarea( 'schema_Review_book_description', setting.schema_Review_book_description );
		$.fn.seop_setup_box_data_text( 'schema_Review_book_publisher', setting.schema_Review_book_publisher );
		$.fn.seop_setup_box_data_text( 'schema_Review_movie_sameas', setting.schema_Review_movie_sameas );
		$.fn.seop_setup_box_data_textarea( 'schema_Review_movie_description', setting.schema_Review_movie_description );
		$.fn.seop_setup_box_data_text( 'schema_Review_movie_publisher', setting.schema_Review_movie_publisher );
		$.fn.seop_setup_box_data_text( 'schema_Review_software_category', setting.schema_Review_software_category );
		$.fn.seop_setup_box_data_text( 'schema_Review_software_os', setting.schema_Review_software_os );
		$.fn.seop_setup_box_data_text( 'schema_Event_name', setting.schema_Event_name );
		$.fn.seop_setup_box_data_text( 'schema_Event_location', setting.schema_Event_location );
		$.fn.seop_setup_box_data_textarea( 'schema_Event_address', setting.schema_Event_address );
		$.fn.seop_setup_box_data_text( 'schema_Event_date', setting.schema_Event_date );
		$.fn.seop_setup_box_data_text( 'schema_SoftwareApplication_name', setting.schema_SoftwareApplication_name );
		$.fn.seop_setup_box_data_select( 'schema_SoftwareApplication_category', setting.schema_SoftwareApplication_category );
		$.fn.seop_setup_box_data_text( 'schema_SoftwareApplication_rating', setting.schema_SoftwareApplication_rating );
		$.fn.seop_setup_box_data_text( 'schema_SoftwareApplication_review', setting.schema_SoftwareApplication_review );
		$.fn.seop_setup_box_data_text( 'schema_SoftwareApplication_price', setting.schema_SoftwareApplication_price );
		$.fn.seop_setup_box_data_text( 'schema_SoftwareApplication_currency', setting.schema_SoftwareApplication_currency );
		$.fn.seop_setup_box_data_text( 'schema_SoftwareApplication_os', setting.schema_SoftwareApplication_os );
		$.fn.seop_setup_box_data_text( 'schema_Video_name', setting.schema_Video_name );
		$.fn.seop_setup_box_data_textarea( 'schema_Video_description', setting.schema_Video_description );
		$.fn.seop_setup_box_data_image( false, 'schema_Video_thumbnail', setting.schema_Video_thumbnail );
		$.fn.seop_setup_box_data_text( 'schema_Video_date', setting.schema_Video_date );
		$.fn.seop_setup_box_data_text( 'schema_Video_duration', setting.schema_Video_duration );
		$.fn.seop_setup_box_data_text( 'schema_Video_url', setting.schema_Video_url );
		$.fn.seop_setup_box_data_text( 'schema_Video_url_embed', setting.schema_Video_url_embed );

		$('.seop_onscreen_selection_tab').change();
		$('.seop_schema_review_selection').change();

	};

	/* main function to display analyze result (Priority, LSI, Over Optimization Warning) */
	$.fn.seop_setup_result = function( response_from_server ) {

		if( response_from_server.analysis && typeof response_from_server.analysis != 'undefined' )
			var analysis = response_from_server.analysis.analysis;
		else
			var analysis = false;

		var priority_html = '';
		if( analysis && Object.keys(analysis).length > 0 )
		{

			priority_html += '<div class="seop_onscreen_score_result_scroll" data-simplebar-direction="vertical">';
				priority_html += '<div class="seop_onscreen_score_result_scroll_css">';

					if( analysis[0].status == 1 )
						var score_class = 'seop_suggestion_score seop_suggestion_green';
					else if( analysis[0].status == 2 )
						var score_class = 'seop_suggestion_score seop_suggestion_red';
					else
						var score_class = 'seop_suggestion_score seop_suggestion_yellow';

					priority_html += '<p class="' + score_class + '">' + analysis[0].msg + '</p>';
					analysis.splice(0,1);

					// print red row
					$.each(analysis, function(idx, row) {
						if( row.status != 2 )
							return true;
						priority_html += '<p class="seop_suggestion_indicator seop_suggestion_false seop_suggestion_red">' + row.msg + '</p>';
					});

					// print yellow row
					$.each(analysis, function(idx, row) {
						if( row.status != 3 )
							return true;
						priority_html += '<p class="seop_suggestion_indicator seop_suggestion_incomplete seop_suggestion_yellow">' + row.msg + '</p>';
					});

					// print green row
					$.each(analysis, function(idx, row) {
						if( row.status != 1 )
							return true;
						priority_html += '<p class="seop_suggestion_indicator seop_suggestion_true seop_suggestion_green">' + row.msg + '</p>';
					});

				priority_html += '</div>';
			priority_html += '</div>';
		}
		else
		{
			priority_html += '<p>' + response_from_server.message.analysis + '</p>';
		}

		// LSI
		var lsi_html = '';

		if( response_from_server.analysis && typeof response_from_server.analysis != 'undefined' )
			var lsi = response_from_server.analysis.lsi_keywords;
		else
			var lsi = false;

		if( lsi && Object.keys(lsi).length > 0 && response_from_server.analysis.lsi_status == 0)
		{
			lsi_html += '<div class="seop_onscreen_score_tab_wrap">';
				lsi_html += '<div class="seop_onscreen_score_tab_head_wrap">';
					lsi_html += '<div class="seop_onscreen_score_icon seop_bg_blue">LSI</div>';
					lsi_html += '<a class="seop_onscreen_score_tab_head"></a>';
					lsi_html += '<div class="seop_onscreen_score_tab_selection">';
						$.each(lsi, function(key, row) {
							lsi_html += '<a data-type="lsi">'+row.keyword+'</a>';
						});
					lsi_html += '</div>';
				lsi_html += '</div>';
				$.each(lsi, function(key, row) {
					lsi_html += '<div class="seop_onscreen_score_tab_content">';
						lsi_html += '<div class="seop_onscreen_score_tab_content_wrap ' + (Object.keys(row.lsi).length > 0 ? '' : 'seop_nolsi') + '" data-simplebar-direction="vertical">';
							lsi_html += '<div class="seop_onscreen_score_tab_content_wrap_listing">';
								if( Object.keys(row.lsi).length > 0 )
								{
									$.each(row.lsi, function(key2, row2) {
										lsi_html += '<p class="seop_suggestion_indicator ' + (row2.count_in_use > 0 ? 'seop_suggestion_red seop_suggestion_true' : 'seop_suggestion_green seop_suggestion_false') + '">' + row2.lsi + '</p>';
									});
								}
								else
								{
									lsi_html += '<p><img src="'+var_js.plugin_url+'/templates/images/nolsi.png" alt="" /></p>';
									lsi_html += '<p>' + row.message + '</p>';
								}
							lsi_html += '</div>';
						lsi_html += '</div>';
					lsi_html += '</div>';
				});
			lsi_html += '</div>';

		}
		else
		{
			lsi_html += '<div class="seop_lsiExceeded">';
			lsi_html += '<p><img src="'+var_js.plugin_url+'/templates/images/nolsi.png" alt="" /></p>';
			lsi_html += '<p>' + response_from_server.message.lsi + '</p>';
			lsi_html += '</div>';
		}

		$('.seop_onscreen_score_result_suggestion').html( priority_html );
		$('.seop_onscreen_score_result_lsi').html( lsi_html );
		$('.seop_onscreen_score_result_scroll').simplebar().simplebar('recalculate');
		$('.seop_onscreen_score_tab_content_wrap').simplebar().simplebar('recalculate');
		$('.seop_onscreen_score_result_suggestion_nokw, .seop_onscreen_score_result_lsi_nokw').hide();

		// init select
		$('.seop_onscreen_score_tab_wrap').each(function(index, element) {
			$(this).children().children().children('a').eq(0).click();
		});
	};

	/* main function to display stat & keywords */
	$.fn.seop_setup_stat = function( response_from_server ) {

		// Keywords
		$('input[name="seop_attr[keyword][]"]', '#seopressor_postbox').val('');
		if( Object.keys(response_from_server.keywords).length > 0 )
		{
			$('input[name="seop_attr[keyword][]"]', '#seopressor_postbox').val('');
			$.each(response_from_server.keywords, function(index, value) {
				$('input[name="seop_attr[keyword][]"]', '#seopressor_postbox').eq(index).val(value);
			});
		}

		// word count
		$('.seop_result_wordcount').html( response_from_server.analysis.word_count );
		if( parseInt(response_from_server.analysis.word_count) < 300 )
			$('.seop_result_wordcount').seop_status_color( 'red' );
		else if( parseInt(response_from_server.analysis.word_count) < 1500 )
			$('.seop_result_wordcount').seop_status_color( 'blue' );
		else
			$('.seop_result_wordcount').seop_status_color( 'green' );

		// readability
		$('.seop_result_readability .seop_number').html( response_from_server.analysis.readability + '%' );
		if( parseFloat(response_from_server.analysis.readability) < 50 )
			$('.seop_result_readability').seop_status_color( 'red' );
		else if( parseFloat(response_from_server.analysis.readability) < 65 )
			$('.seop_result_readability').seop_status_color( 'yellow' );
		else
			$('.seop_result_readability').seop_status_color( 'green' );

		// density
		$('.seop_result_density .seop_number').html( response_from_server.analysis.density + '%' );
		if( parseFloat(response_from_server.analysis.density) < 2 )
			$('.seop_result_density').seop_status_color( 'red' );
		else if( parseFloat(response_from_server.analysis.density) < 5 )
			$('.seop_result_density').seop_status_color( 'green' );
		else if( parseFloat(response_from_server.analysis.density) < 8 )
			$('.seop_result_density').seop_status_color( 'yellow' );
		else
			$('.seop_result_density').seop_status_color( 'red' );

		// score
		$('.seop_result_score').html( response_from_server.analysis.score );

		if( parseInt(response_from_server.analysis.score) < 80 )
		{
			$('.seop_onscreen_score_stat_hint').hide();
			$('.seop_onscreen_score_stat_percentage').removeClass('seop_bg_good seop_bg_over').addClass('seop_bg_normal');
		}
		else if( parseInt(response_from_server.analysis.score) <= 100 )
		{
			$('.seop_onscreen_score_stat_hint').hide();
			$('.seop_onscreen_score_stat_percentage').removeClass('seop_bg_over seop_bg_normal').addClass('seop_bg_good');
		}
		else
		{
			$('.seop_onscreen_score_stat_hint').show();
			$('.seop_onscreen_score_stat_percentage').removeClass('seop_bg_normal seop_bg_good').addClass('seop_bg_over');
		}
	};

	/* Reset the text color, for score board use */
	$.fn.seop_status_color = function( color ) {
		$(this).removeClass( 'seop_grey seop_green seop_red seop_blue' );
		switch( color ) {
			case 'green': var classname = 'seop_green'; break;
			case 'red': var classname = 'seop_red'; break;
			case 'blue': var classname = 'seop_blue'; break;
			case 'yellow': var classname = 'seop_yellow'; break;
			case 'grey': default: var classname = 'seop_grey'; break;
		}
		$(this).addClass( classname );
	};

	/* Reset score tab content */
	$.fn.seop_reset_score_tab_content = function( response_from_server ) {
		$('.seop_onscreen_score_stat_hint').hide();
		$('.seop_result_wordcount').html( '-' ).seop_status_color('grey');
		$('.seop_result_readability .seop_number').html( '- %' ).seop_status_color('grey');
		$('.seop_result_density .seop_number').html( '- %' ).seop_status_color('grey');
		$('.seop_result_score').html('0');
		$('.seop_onscreen_score_stat_percentage').removeClass('seop_bg_normal seop_bg_good seop_bg_over');
		$('.seop_onscreen_score_result_suggestion, .seop_onscreen_score_result_lsi').html('');
		$('.seop_onscreen_score_result_lsi_nokw, .seop_onscreen_score_result_suggestion_nokw').show();
	};


	/* Initialize main tab height */
	$.fn.init_height_main_tab = function() {

		var admin_bar_height = $('#wpadminbar').height();
		$( '.seop_onscreen_box_wrap' ).css({
			'top' : admin_bar_height,
			'height' : 'calc(100% - '+admin_bar_height+'px)'
		});

		var wrapper_height = $( '.seop_onscreen_box_wrap' ).outerHeight(); // total height of side panel
		var main_navigation_height = $( '.seop_onscreen_nav_main' ).outerHeight(); // height of top navigation
		var subtab_height = $('.seop_onscreen_subtab:eq(0)').outerHeight(); // height of sub navigation

		// init scrollbar without action
		$('.seop_onscreen_tab_scroll').height( wrapper_height-main_navigation_height );
		$('.seop_onscreen_tab_scroll').simplebar('recalculate');

		// init scrollbar with action
		$('.seop_onscreen_tab_scroll_action').height( wrapper_height-main_navigation_height );
		$('.seop_onscreen_tab_scroll_action').simplebar('recalculate');

		// init scrollbar with action & side navigation
		$('.seop_onscreen_subtab_scroll').height(  wrapper_height-main_navigation_height-subtab_height-32  );
		$('.seop_onscreen_subtab_scroll').simplebar('recalculate');
	};


	/* Update meta preview box */
	$.fn.update_preview_box = function() {

		var preview_title = $.trim($('textarea[name="seop_attr[meta_title]"]').val()).length <= 0 ? $('#seop_attr_post_title').html() : $('textarea[name="seop_attr[meta_title]"]').val();
		var preview_permalink = $('#seop_attr_post_permalink').html();
		var preview_description = $.trim($('textarea[name="seop_attr[meta_description]"]').val()).length <= 0 ? $('#seop_attr_post_description').html() : $('textarea[name="seop_attr[meta_description]"]').val();

		if( preview_title.length > 55 )
			preview_title = preview_title.substr(0, 55) + '...';

		if( preview_description.length > 155 )
			preview_description = preview_description.substr(0, 155) + '...';

		$('#seop_meta_preview_title').html( preview_title );
		$('#seop_meta_preview_url').html( preview_permalink );
		$('#seop_meta_preview_description').html( preview_description );
	};

	$.fn.seop_append_ready_status = function() {
		var obj = $('#seopressor_postbox').find('input[name="seop_attr[fetch_ready]"]');
		if( obj.length <= 0 )
		{
			$('<input type="hidden" name="seop_attr[fetch_ready]" value="yes" />').insertAfter('.seop_panel_action');
		}
	};


})(jQuery);
