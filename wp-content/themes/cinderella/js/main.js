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

    var identifier,
        top = 0,
        headerPoint = top + parseInt(jQuery("#header").offset().top),
        btnDisapear = top + parseInt(jQuery("#header").offset().top + 280),
        mainPoint = top + parseInt(jQuery("#main").offset().top),
        studiosPoint = top + parseInt(jQuery("#studios").offset().top),
        instPoint = top + parseInt(jQuery("#instagram").offset().top),
        aboutPoint = top + parseInt(jQuery("#about").offset().top),

        statisticsPoint = top + parseInt(jQuery("#statistics").offset().top),
        navTopPoint = top + parseInt(jQuery("#header").offset().top + 520);


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

        if (scrolled >= btnDisapear) {
            jQuery(".entry_big").hide();
        }

        if (scrolled < btnDisapear) {
            jQuery(".entry_big").show();
        }

    });

    /*Изменение вида tоp-nav главной страницы*/

    jQuery(window).bind('scroll', function () {
        var scrolled = jQuery(window).scrollTop();

        with (jQuery(".page-id-1240")) {

            if (scrolled >= navTopPoint) {
                jQuery(".logo__link").removeClass("logo__link_non-active").addClass("logo__link_active");
                jQuery(".top_nav .top_nav_wrapper").removeClass("top_nav_non-active").addClass("top_nav_active");
                jQuery(".top_nav_wrapper > ul > li > a").removeClass("top_nav__link_non-active").addClass("top_nav__link_active");
                jQuery(".top_nav .icon_text strong").removeClass("icon_text_phone_non-active").addClass("icon_text_phone_active");
                jQuery(".top_nav .icon_text span").removeClass("icon_text_phone-text_non-active").addClass("icon_text_phone-text_active");
                jQuery(".current-city__item").removeClass("current-city__item_non-active").addClass("current-city__item_active");
                jQuery(".social__link_to_inst_small").removeClass("social__link_to_inst_small_non-active").addClass("social__link_to_inst_small_active");
                jQuery(".social__link_to_vk_small").removeClass("social__link_to_vk_small_non-active").addClass("social__link_to_vk_small_active");
                jQuery(".social__link_to_youtube_small").removeClass("social__link_to_youtube_small_non-active").addClass("social__link_to_youtube_small_active");
            }

            if (scrolled < navTopPoint) {
                jQuery(".logo__link").removeClass("logo__link_active").addClass("logo__link_non-active");
                jQuery(".top_nav .top_nav_wrapper").removeClass("top_nav_active").addClass("top_nav_non-active");
                jQuery(".top_nav_wrapper > ul > li > a").removeClass("top_nav__link_active").addClass("top_nav__link_non-active");
                jQuery(".top_nav .icon_text strong").removeClass("icon_text_phone_active").addClass("icon_text_phone_non-active");
                jQuery(".top_nav .icon_text span").removeClass("icon_text_phone-text_active").addClass("icon_text_phone-text_non-active");
                jQuery(".current-city__item").removeClass("current-city__item_active").addClass("current-city__item_non-active");
                jQuery(".social__link_to_inst_small").removeClass("social__link_to_inst_small_active").addClass("social__link_to_inst_small_non-active");
                jQuery(".social__link_to_vk_small").removeClass("social__link_to_vk_small_active").addClass("social__link_to_vk_small_non-active");
                jQuery(".social__link_to_youtube_small").removeClass("social__link_to_youtube_small_active").addClass("social__link_to_youtube_small_non-active");
            }
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
        jQuery('.ouibounce-modal_city').fadeIn(400);
    });

    jQuery(".popup__cross-btn").click(function () {
        jQuery('.ouibounce-modal_city').fadeOut(400);
    });

    jQuery(".city__item").click(function () {
        jQuery('.ouibounce-modal_city').delay(700).fadeOut(400);
    });

    jQuery(".ouibounce-modal_city").click(function (e) {
        if (jQuery(e.target).closest(".popup").length == 0)
            jQuery(".ouibounce-modal_city").fadeOut(400);
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

    /*Slider buttons*/
    setTimeout(function () {
        jQuery(".ms-container").append("<button class='share-image__button'>Акции</button>").fadeIn(70);
        jQuery(".master-slider").append("<div class='entry entry_share entry_share_01'><button class='entry__button entry__button_share'>Записаться</button></div>").fadeIn(70);
    }, 50);

    /* var entryShare_01 = jQuery.create("div");
     entryShare_01.addClass("entry").addClass("entry_share").addClass("entry_share_01");
     jQuery(".ms-container").append(shareButton); */


  /*  Popup Instagram*/

     jQuery('.ouibounce-modal_instagram').delay(2500).fadeIn(250);

     jQuery(".popup-instagram__cross").click(function (event) {
     event.preventDefault();
     jQuery('.ouibounce-modal_instagram').fadeOut(200);
     });

     jQuery(this).keydown(function (event) {
     if (event.which == 27)
     jQuery('.ouibounce-modal_instagram').fadeOut(200);
     });

/*    Блок Карта Slidedown*/

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

    /*Initial Video Play*/

    setTimeout(function () {
        jQuery(".video")[0].play();
    }, 3000);

    /*  Карта yandex API*/

    /*Инициализация счетчика spincrement*/

    /*  jQuery(".statistics-item__number").spincrement({
     thousandSeparator: "",
     duration: 1300
     });
     */

    function funcAdd() {
        var scrollTop = jQuery(window).scrollTop();
        if (scrollTop >= mainPoint + 950) {
            jQuery(".statistics-item__number").spincrement({
                thousandSeparator: "",
                duration: 1300
            });
            window.removeEventListener('scroll', funcAdd);
        }
    }

    window.addEventListener('scroll', funcAdd);


    /*jQuery(window).one("scroll", function () {
     var scrollTop = jQuery(window).scrollTop();

     /!*  bodyHeight = jQuery('body').outerHeight(),
     height = winPos + bodyHeight;*!/

     /!*  var scrollBottom = jQuery(window).scrollTop() + jQuery(window).height();
     console.log(scrollBottom);*!/

     if (scrollTop >= mainPoint + 1200) {
     jQuery(".statistics-item__number").spincrement({
     thousandSeparator: "",
     duration: 1300
     });
     /!*   jQuery(window).off('scroll');*!/
     }
     });*/


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