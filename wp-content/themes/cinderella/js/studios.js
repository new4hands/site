/**
 * Created by PK on 10.11.2017.
 */

jQuery(document).ready(function () {

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

    var сhosenCityText,
        apps = {},
        cityMass = ["Новосибирск", "Москва", "Санкт-Петербург", "Сочи", "Томск", "Норильск", "Барнаул",
            "Старый Оскол", "Владивосток", "Севастополь", "Казань", "Липецк", "Ялта", "Воронеж"],
        studiosList = document.querySelector(".studios-list");


    jQuery(".city__item").bind("click", function () {
        сhosenCityText = jQuery(this).text();
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

    navigator.geolocation.getCurrentPosition(
        function(position) {
            console.log('Позиция пользователя: ' +
                position.coords.latitude + ", " + position.coords.longitude);
        }
    );

    /*Определение текущего города:*/

    ymaps.ready(init);

    function init() {
        ymaps.geolocation.get({
            provider: 'yandex',
        }).then(function (result) {

            var retObj = JSON.parse(localStorage.getItem("object"));
            if ( retObj.city) {
                console.log(retObj.city);
                jQuery(".current-city__item").html(retObj.city);
                jQuery(".studios__current-city").html(retObj.city);

            } else {
                 currentCity = result.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AddressLine');
                 jQuery(".current-city__item").html(currentCity);
                 jQuery(".studios__current-city").html(currentCity);

                var city;
                var obj = { city: currentCity };
                var sObj = JSON.stringify(obj)
                localStorage.setItem("object", sObj);
            }

            defineCity();
        });
    }

    jQuery(".city__item").bind("click", function () {
        jQuery(".studios-list").empty();
        defineCity();
    });

    function defineCity() {
        var xhr = new XMLHttpRequest();
        var currentCityItem = jQuery(".current-city__item").text().trim();

        if (currentCityItem === cityMass[0]) {
            jQuery(".studios__current-city").html(сhosenCityText);

            var city;
            var obj = { city: сhosenCityText };
            var sObj = JSON.stringify(obj)
            localStorage.setItem("object", sObj);
            console.log(city);

            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-nsk.json", true);
        }

        if (currentCityItem === cityMass[1]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-msk.json", true);
        }

        if (currentCityItem === cityMass[2]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-spb.json", true);
        }

        if (currentCityItem === cityMass[3]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-sochi.json", true);
        }

        if (currentCityItem === cityMass[4]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-tomsk.json", true);
        }

        if (currentCityItem === cityMass[5]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-norilsk.json", true);
        }

        if (currentCityItem === cityMass[6]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-barnaul.json", true);
        }

        if (currentCityItem === cityMass[7]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-stariyoskol.json", true);
        }

        if (currentCityItem === cityMass[8]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-vladik.json", true);
        }

        if (currentCityItem === cityMass[9]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-sevastopol.json", true);
        }

        if (currentCityItem === cityMass[10]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-kazan.json", true);
        }

        if (currentCityItem === cityMass[11]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-lipeck.json", true);
        }

        if (currentCityItem === cityMass[12]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-yalta.json", true);
        }

        if (currentCityItem === cityMass[13]) {
            jQuery(".studios__current-city").html(сhosenCityText);
            xhr.open("GET", "/wp-content/themes/cinderella/json/studios-voroneg.json", true);
        }


        xhr.send();
        xhr.onload = function () {
            if (xhr.status === 200) {
                var data = xhr.responseText;
            }
            var apps = JSON.parse(data);
            var li = apps.length;

            for (var i = 0; i < li; i++) {
                setInterval(insertBlock(i, apps), 5000);
            }
            jQuery(".search-studios__digit").html(apps.length)
                .spincrement({
                    duration: 950
                });
        };
    }


    function insertBlock(i, apps) {
        if (i < apps.length) {
            var blockWrapper = document.createElement("div");
            studiosList.appendChild(blockWrapper);
            blockWrapper.classList.add("studios-item__wrapper");

            var block = document.createElement("div");
            blockWrapper.appendChild(block);
            block.classList.add("studios-item");

            var block_link = document.createElement("a");
            block.appendChild(block_link);
            block_link.classList.add("studios-item__link");
            block_link.href = apps[i].link;

            var blockInfoblock = block.appendChild(document.createElement("div"));
            blockInfoblock.classList.add("studios-item__info-block");
            blockInfoblock.classList.add("clearfix");

            /* var block_distance = blockInfoblock.appendChild(document.createElement("div"));
             block_distance.classList.add("studios-item__distance");
             block_distance.innerHTML = apps[i].distance;*/

            var block_name = blockInfoblock.appendChild(document.createElement("div"));
            block_name.classList.add("studios-item__name");
            block_name.innerHTML = apps[i].name;

            var block_type = blockInfoblock.appendChild(document.createElement("div"));
            block_type.classList.add("studios-item__type");
            block_type.innerHTML = apps[i].type;

            var block_time = blockInfoblock.appendChild(document.createElement("span"));
            block_time.classList.add("studios-item__time");
            block_time.innerHTML = apps[i].Time;

            var block_phone = blockInfoblock.appendChild(document.createElement("span"));
            block_phone.classList.add("studios-item__phone");
            block_phone.innerHTML = apps[i].Number;

            var block_address = blockInfoblock.appendChild(document.createElement("address"));
            block_address.classList.add("studios-item__address");
            block_address.innerHTML = apps[i].Address;

            var block_btn = blockInfoblock.appendChild(document.createElement("a"));
            block_btn.classList.add("studios-item__btn");
            block_btn.innerHTML = "Подробнее";
            block_btn.href = "#";

            var block_description = block.appendChild(document.createElement("p"));
            block_description.classList.add("studios-item__description");
            block_description.innerHTML = apps[i].description;

            var block_details = block.appendChild(document.createElement("div"));
            block_details.classList.add("studios-item__details");


        }

        jQuery(".studios-item__wrapper").each(function (index) {
            jQuery(this).delay(137 * index).show()
                .css({"display": "inline-block", "vertical-align": "top"})
                .animate({'opacity': 1}, 400);
            jQuery(".studios-item__image").animate({width: 350}, 350).animate({height: 253}, 400);
        });

        showDescription();
    }

    function showDescription() {

        jQuery(".studios-item__wrapper").mouseover(function (event) {
            event.preventDefault();
            /*  jQuery(this).find(".studios-item__image").animate({height:273});*/
            jQuery(this).find(".studios-item").find(".studios-item__description").show();
            jQuery(this).find(".studios-item").find(".studios-item__details").show();
            jQuery(this).find(".studios-item").addClass("studios-item__appear");

        });

        jQuery(".studios-item__wrapper").mouseleave(function (event) {
            event.preventDefault();
            /*         jQuery(this).find(".studios-item__image").animate({height:243});*/
            var that = jQuery(this).find(".studios-item");
            that.each(function (index) {
                that.removeClass('studios-item__appear');
                that.find(".studios-item__description").hide();
                that.find(".studios-item__details").hide();

            });

        });
    }
});
