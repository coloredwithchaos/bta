/**
 * seops_lc_switch.js
 * Version: 1.0
 * Author: LCweb - Luca Montanari
 * Website: http://www.lcweb.it
 * Licensed under the MIT license
 */

(function($){
	if(typeof($.fn.seops_lc_switch) != 'undefined') {return false;} // prevent dmultiple scripts inits

	$.fn.seops_lc_switch = function(on_text, off_text) {

		// destruct
		$.fn.lcs_destroy = function() {

			$(this).each(function() {
                var $wrap = $(this).parents('.seops_lcs_wrap');

				$wrap.children().not('input').remove();
				$(this).unwrap();
            });

			return true;
		};


		// set to ON
		$.fn.seops_lcs_on = function() {

			$(this).each(function() {
                var $wrap = $(this).parents('.seops_lcs_wrap');
				var $input = $wrap.find('input');

				if(typeof($.fn.prop) == 'function') {
					$wrap.find('input').prop('checked', true);
				} else {
					$wrap.find('input').attr('checked', true);
				}

				$wrap.find('input').trigger('seops_lcs-on');
				$wrap.find('input').trigger('seops_lcs-statuschange');
				$wrap.find('.seops_lcs_switch').removeClass('seops_lcs_off').addClass('seops_lcs_on');

				// if radio - disable other ones
				if( $wrap.find('.seops_lcs_switch').hasClass('lcs_radio_switch') ) {
					var f_name = $input.attr('name');
					$wrap.parents('form').find('input[name='+f_name+']').not($input).seops_lcs_off();
				}
            });

			return true;
		};


		// set to OFF
		$.fn.seops_lcs_off = function() {

			$(this).each(function() {
                var $wrap = $(this).parents('.seops_lcs_wrap');

				if(typeof($.fn.prop) == 'function') {
					$wrap.find('input').prop('checked', false);
				} else {
					$wrap.find('input').attr('checked', false);
				}

				$wrap.find('input').trigger('seops_lcs-off');
				$wrap.find('input').trigger('seops_lcs-statuschange');
				$wrap.find('.seops_lcs_switch').removeClass('seops_lcs_on').addClass('seops_lcs_off');
            });

			return true;
		};


		// construct
		return this.each(function(){

			// check against double init
			if( !$(this).parent().hasClass('seops_lcs_wrap') ) {

				// default texts
				var ckd_on_txt = (typeof(on_text) == 'undefined') ? 'ON' : on_text;
				var ckd_off_txt = (typeof(off_text) == 'undefined') ? 'OFF' : off_text;

			   // labels structure
				var on_label = (ckd_on_txt) ? '<div class="lcs_label lcs_label_on">'+ ckd_on_txt +'</div>' : '';
				var off_label = (ckd_off_txt) ? '<div class="lcs_label lcs_label_off">'+ ckd_off_txt +'</div>' : '';


				// default states
				var disabled 	= ($(this).is(':disabled')) ? true: false;
				var active 		= ($(this).is(':checked')) ? true : false;

				var status_classes = '';
				status_classes += (active) ? ' seops_lcs_on' : ' seops_lcs_off';
				if(disabled) {status_classes += ' lcs_disabled';}


				// wrap and append
				var structure =
				'<div class="seops_lcs_switch '+status_classes+'">' +
					'<div class="lcs_cursor"></div>' +
					on_label + off_label +
				'</div>';

				if( $(this).is(':input') && ($(this).attr('type') == 'checkbox' || $(this).attr('type') == 'radio') ) {

					$(this).wrap('<div class="seops_lcs_wrap"></div>');
					$(this).parent().append(structure);

					$(this).parent().find('.seops_lcs_switch').addClass('lcs_'+ $(this).attr('type') +'_switch');
				}
			}
        });
	};



	// handlers
	$(document).ready(function() {

		// on click
		$(document).off('click tap', '.seops_lcs_switch:not(.lcs_disabled)').on('click tap', '.seops_lcs_switch:not(.lcs_disabled)', function(e) {
			if( $(this).hasClass('seops_lcs_on') ) {
				if( !$(this).hasClass('lcs_radio_switch') ) { // not for radio
					$(this).seops_lcs_off();
				}
			} else {
				$(this).seops_lcs_on();
			}
		});



		// on checkbox status change
		$(document).off('change', '.seops_lcs_wrap input').on('change', '.seops_lcs_wrap input', function() {
			if( $(this).is(':checked') ) {
				$(this).seops_lcs_on();
			} else {
				$(this).seops_lcs_off();
			}
		});


	});

})(jQuery);
