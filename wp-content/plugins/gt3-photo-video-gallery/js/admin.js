jQuery(function () {
	"use strict";
	jQuery(document).ready(function ($) {
		if (jQuery("input[name='gt3pg_border']").val() == "1") jQuery(".border-setting").show(); else jQuery(".border-setting").hide();
		jQuery("input[name='gt3pg_border']").on("change", function () {
			if (jQuery("input[name='gt3pg_border']").val() == "1") jQuery(".border-setting").show(); else jQuery(".border-setting").hide();
		});
		jQuery('input[name="gt3pg_color_picker"]').wpColorPicker();
		jQuery('.gt3pg_admin_save_all').on("mouseover", function () {
			if (jQuery('input[name="gt3pg_color_picker"]').val() != "undefined")
				jQuery('input[name="gt3pg_border_col"]').val(jQuery('input[name="gt3pg_color_picker"]').val()).trigger("change").trigger("input").trigger("focus").trigger("blur");
		});


		jQuery('[name="gt3pg_link_to"]').on('change', function () {
			if (jQuery('[name="gt3pg_link_to"]').val() == 'lightbox') {
				jQuery('.hidden_gt3pg_link_to_lightbox').show();
			} else {
				jQuery('.hidden_gt3pg_link_to_lightbox').hide();
			}
		});

		$('[name="gt3pg_lightbox_image_size"]').on('change', function () {
			if ($(this).val() == 'full') $('.gt3pg_lightbox_image_size_full_hidden').show();
			else $('.gt3pg_lightbox_image_size_full_hidden').hide();
		});

		$('[name="gt3pg_size"]').on('change', function () {
			if ($(this).val() == 'full') $('.hidden_gt3pg_size').show();
			else $('.hidden_gt3pg_size').hide();
		});

		$('[name="gt3pg_slider_image_size"]').on('change', function () {
			if ($(this).val() == 'full') $('.gt3pg_slider_image_size_full_hidden').show();
			else $('.gt3pg_slider_image_size_full_hidden').hide();
		});

		$('[name="gt3pg_link_to"]').trigger('change');
		$('[name="gt3pg_lightbox_image_size"]').trigger('change');
		$('[name="gt3pg_size"]').trigger('change');
		$('[name="gt3pg_slider_image_size"]').trigger('change');

		$('.selectBox-disabled [rel="gt3pg_optimized"]').hover(function (e) {
				var not = $('.gt3pg_optimized_notice');
				// console.log(window.innerWidth);
				var w = window.innerWidth;
				var pos = $(this).parent().parent().position();
				var p_pos = $(this).parent().position();
				pos.top += p_pos.top;
				pos.left += p_pos.left;

				if (w <= 782) {
					not.css('left', pos.left + 155).css('top', pos.top - 26).fadeIn(200);
				} else if (w > 782 && w <= 960) {
					not.css('left', pos.left + 110).css('top', pos.top - 12).fadeIn(200);
				} else {
					not.css('left', pos.left - 10).css('top', pos.top - 12).fadeIn(200);
				}
			},
			function () {
				var not = $('.gt3pg_optimized_notice');
				not.fadeOut(200);
			}
		);


		//gt3pg_page_settings
		$(".gt3pg_page_settings .onoff-input").on("change", function () {
			var id = $(this).attr('id');
			if ($(this).prop('checked')) $('[name="' + id + '"]').val(1).trigger('change');
			else $('[name="' + id + '"]').val(0).trigger('change');
		});


	});

	jQuery(".gt3pg_admin_reset_settings").on("click", function () {
		var agree = confirm("Are you sure?");
		if (!agree) {
			return false;
		}
		jQuery.post(ajaxurl, {action: 'gt3_reset_gt3pg_settings'}, function (response) {
			window.location.reload(true);
		});
		return false;
	});

	// Popup
	function gt3pg_show_admin_pop(gt3_message_text, gt3_message_type) {
		// Success - gt3_message_type = 'info_message'
		// Error - gt3_message_type = 'error_message'
		jQuery(".gt3pg_result_message").remove();
		jQuery("body").removeClass('active_message_popup').addClass('active_message_popup');
		jQuery("body").append("<div class='gt3pg_result_message " + gt3_message_type + "'>" + gt3_message_text + "</div>");
		var messagetimer = setTimeout(function () {
			jQuery(".gt3pg_result_message").fadeOut();
			jQuery("body").removeClass('active_message_popup');
			clearTimeout(messagetimer);
		}, 3000);
	}

	jQuery(".gt3pg_page_settings").submit(function (event) {
		event.preventDefault();
		var gt3pg_page_settings = jQuery(this);
		jQuery.post(gt3pg_admin_ajax_url, {
			action: 'gt3_save_gt3pg_options',
			serialize_string: JSON.stringify(gt3pg_page_settings.serializeArray())
		}, function (response) {
			var gt3pg_saved_response = JSON.parse(response);
			gt3pg_show_admin_pop('<b>DONE! You\'ve successfully saved the changes.</b>', 'info_message');
		});
	});

	jQuery(".gt3pg_admin_mix-container2 select").selectBox();


})

