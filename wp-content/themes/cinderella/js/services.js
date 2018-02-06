/**
 * Created by PK on 10.11.2017.
 */

jQuery(document).ready(function () {

    jQuery('.nav-services__list li a').each(function (index) {
        jQuery(this).removeClass('nav-services__link_active');
    });

    switch (true) {
        case jQuery('body').is('.page-id-40') :
            jQuery('.nav-services__list li').eq(1).addClass("nav-services__item_active");
            break;

        case jQuery('body').is('.page-id-43') :
            jQuery('.nav-services__list li').eq(2).addClass("nav-services__item_active");
            break;

        case jQuery('body').is('.page-id-1750') :
            jQuery('.nav-services__list li').eq(3).addClass("nav-services__item_active");
            break;

        case jQuery('body').is('.page-id-1760') :
            jQuery('.nav-services__list li').eq(5).addClass("nav-services__item_active");
            break;

        case jQuery('body').is('.page-id-1762') :
            jQuery('.nav-services__list li').eq(6).addClass("nav-services__item_active");
    }

    jQuery(".services-title__text").fadeIn(300);
    jQuery(".service-item__wrapper").each(function (index) {
        jQuery(this).delay(167 * index)
            .css({"display": "inline-block", "vertical-align": "top"})
            .show()
            .animate({'opacity': 1}, 300);
    });

       /*jQuery(".info-services").delay(300).fadeIn(200);*/

    jQuery(".service-item__link").bind("click", function (event) {
        event.preventDefault();
    });

    jQuery(".service-item__info-icon").bind("click", function (event) {
        event.preventDefault();
        var that = jQuery(this).closest(".service-item");

        jQuery(this).closest(".service-item").find(".service-item__description").fadeIn(200);
        jQuery(this).closest(".service-item").addClass("service-item__appear");

    });

    jQuery(".service-item__wrapper").mouseleave(function (event) {
        event.preventDefault();
        var that = jQuery(this).find(".service-item");
        that.removeClass('service-item__appear');
        that.find(".service-item__description").fadeOut(200);
    });

});





