/**
 * Created by PK on 10.11.2017.
 */

jQuery(document).ready(function () {




    jQuery('.nav-services__list li a').each(function (index) {
        jQuery(this).removeClass('nav-services__link_active');
    });

    jQuery('.nav-services__list li a').eq(0).addClass("nav-services__link_active");

    jQuery(".service-item__wrapper").hide();

    jQuery(".service-item__wrapper").each(function (index) {
        jQuery(this).delay(167 * index).show()
                                       .animate({'opacity': 1}, 300);
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





