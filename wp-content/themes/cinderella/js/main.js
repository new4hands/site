/*Перемещение по блокам*/

jQuery(document).ready(function () {

    jQuery(".js_scroll").bind("click", function (event) {
        event.preventDefault();
        var id = jQuery(this).attr('href'),
            top = jQuery(id).offset().top;
        jQuery('body,html').animate({scrollTop: top}, 500);
    });

    jQuery(".js-menu-item").bind("click", function () {
        var id = jQuery(this).find("a").attr('href'),
            top = jQuery(id).offset().top;
        jQuery('body,html').animate({scrollTop: top}, 500);
    });

    /*Появление больших меток в вертикальном скроллбаре */

    var top = 0;
    var headerPoint = top + parseInt(jQuery("#header").offset().top);
    var mainPoint = top + parseInt(jQuery("#main").offset().top);
    var studiosPoint = top + parseInt(jQuery("#studios").offset().top);
    var instPoint = top + parseInt(jQuery("#instagram").offset().top);
    var aboutPoint = top + parseInt(jQuery("#about").offset().top);

    var identifier;

    jQuery(window).bind('scroll', function () {
        var scrolled = jQuery(window).scrollTop();

        if ((scrolled >= headerPoint) && (scrolled < mainPoint)) {
            jQuery('.attached-nav__list li').each(function (index) {
                jQuery(this).removeClass('active');
            });
            jQuery(".attached-nav__item").eq(0).addClass("active");
            identifier = 1;
        }

        if ((scrolled >= mainPoint) && (scrolled < studiosPoint)) {
            jQuery('.attached-nav__list li').each(function (index) {
                jQuery(this).removeClass('active');
            });
            jQuery(".attached-nav__item").eq(1).addClass("active");
            identifier = 2;
        }

        if ((scrolled >= studiosPoint) && (scrolled < instPoint)) {
            jQuery('.attached-nav__list li').each(function (index) {
                jQuery(this).removeClass('active');
            });
            jQuery(".attached-nav__item").eq(2).addClass("active");
            identifier = 3;
        }

        if ((scrolled >= instPoint) && (scrolled < aboutPoint)) {
            jQuery('.attached-nav__list li').each(function (index) {
                jQuery(this).removeClass('active');
            });
            jQuery(".attached-nav__item").eq(3).addClass("active");
            identifier = 4;
        }

        if ((scrolled >= aboutPoint)) {
            jQuery('.attached-nav__list li').each(function (index) {
                jQuery(this).removeClass('active');
            });
            jQuery(".attached-nav__item").eq(4).addClass("active");
        }
    });

    /*Переключение на блок вниз*/


    jQuery(".js-next").bind("click", function () {
        if (identifier == 1) {
            jQuery('body,html').animate({scrollTop: mainPoint}, 500);
        }

        if (identifier == 2) {
            jQuery('body,html').animate({scrollTop: studiosPoint}, 500);
        }

        if (identifier == 3) {
            jQuery('body,html').animate({scrollTop: instPoint}, 500);
        }

        if (identifier == 4) {
            jQuery('body,html').animate({scrollTop: aboutPoint}, 500);
        }
    });


    /*Выбор города*/

    jQuery(".showf-btn").click(function () {
        jQuery('#ouibounce-modal').fadeIn(400);
    });

    jQuery(".popup__cross-btn").click(function () {
        jQuery('#ouibounce-modal').fadeOut(400);
    });

    jQuery(".city__item").click(function () {
        jQuery('#ouibounce-modal').delay(700).fadeOut(400);
    });

    jQuery("#ouibounce-modal").click(function (e) {
        if (jQuery(e.target).closest(".popup").length == 0)
            jQuery("#ouibounce-modal").fadeOut(400);
    });

    /*Отображение текущего города*/

    jQuery(".city__item").bind("click", function () {
        var сhosenCityText = jQuery(this).text();
        var currentCity = jQuery(".current-city__item");

        if (!(currentCity.text())) {
            currentCity.append(сhosenCityText).addClass("city_animation");

        } else if (!(currentCity.html() == сhosenCityText)) {
            currentCity.empty().append(сhosenCityText).removeClass("city_animation");
            setTimeout(function () {
                currentCity.addClass("city_animation");
            }, 1);
        } else {

        }
    });


    /*Popup Instagram


    jQuery('.ouibounce-modal_instagram').delay(2500).fadeIn(250);

    jQuery(".popup-instagram__cross").click(function (event) {
        event.preventDefault();
        jQuery('.ouibounce-modal_instagram').fadeOut(200);
    });


    jQuery(this).keydown(function (event) {
        if (event.which == 27)
            jQuery('.ouibounce-modal_instagram').fadeOut(200);
    });*/


    /*Рисование фона для блока slider, slder2, slder3

     function drawBackgrounds() {
     var canvas = document.querySelector('#canvas');
     var canvas_2 = document.querySelector('#canvas2');
     var canvas_3 = document.querySelector('#canvas3');

     if (canvas.getContext) {
     var figure = canvas.getContext('2d');
     figure.beginPath();
     figure.moveTo(0, 0);
     figure.lineTo(960, 0);
     figure.lineTo(710, 305);
     figure.lineTo(980, 580);
     figure.lineTo(0, 520);
     figure.fillStyle = "#e3c9d9";
     figure.fill();
     }
     if (canvas_2.getContext) {
     var figure_2 = canvas_2.getContext('2d');
     figure_2.beginPath();
     figure_2.moveTo(1920, 50);
     figure_2.lineTo(980, 0);
     figure_2.lineTo(1130, 305);
     figure_2.lineTo(970, 580);
     figure_2.lineTo(1920, 560);
     figure_2.fillStyle = "#fff7c7";
     figure_2.fill();

     }
     if (canvas_3.getContext) {
     var figure_3 = canvas_3.getContext('2d');
     figure_3.beginPath();
     figure_3.moveTo(0, 20);
     figure_3.lineTo(970, 0);
     figure_3.lineTo(770, 305);
     figure_3.lineTo(920, 580);
     figure_3.lineTo(0, 580);
     figure_3.fillStyle = "#f3aabe";
     figure_3.fill();
     }
     }

     drawBackgrounds();*/

    /*Блок Карта Slidedown*/

    jQuery(".studios__slide").bind('click', function () {
        if (jQuery("div").is(".up")) {
            jQuery(".chosen-studio").fadeOut(50);
            jQuery(".studios-info_map").delay(70).animate({"height": "105px", "margin-top": "470px"}, 220)
                .animate({"height": "560px", "margin-top": "0px"}, "250", function () {
                    jQuery(".studios-info").delay(50).fadeIn("slow");
                    jQuery(".studios-salon_small").delay(170).fadeIn("slow");
                });
            jQuery(this).removeClass("up").addClass("down");
        } else {
            jQuery(".studios-info").fadeOut(50);
            jQuery(".studios-salon_small").fadeOut(50);
            jQuery(".studios-info_map").delay(70).animate({"height": "105px", "margin-top": "470px"}, 220)
                .animate({"height": "140px", "margin-top": "450px"}, "250", function () {
                    jQuery(".chosen-studio").fadeIn(300);
                });
            jQuery(this).addClass("up").removeClass("down");
        }
    });


    /*Подгрузка контента страницы в зависимости от города*/

    /*  var target = document.querySelector('.target');
     jQuery(".text_block").appendChild(target);*/


    /*
     function loadContent() {
     jQuery(".text_block").load("/wp-content/themes/cinderella/html/nsk.html #target");
     }

     loadContent();
     */

    /*Формирование страницы услуги динамически*/


    /*Геолокация

     navigator.geolocation.getCurrentPosition(
     function(position) {
     alert('Позиция пользователя: ' +
     position.coords.latitude + ", " + position.coords.longitude);
     }
     );*/


});