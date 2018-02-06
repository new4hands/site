jQuery(document).ready(function () {
    /*Выбор города*/

    jQuery(".showf-btn").click(function () {
        jQuery('.ouibounce-modal_city').fadeIn(400);
    });

    jQuery(".current-city__item").click(function () {
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



    ymaps.ready(init);

    function init() {
        ymaps.geolocation.get({
            provider: 'yandex',
            autoReverseGeocode: true
        }).then(function (result) {
            currentCity = result.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AddressLine');
            jQuery(".current-city__item").html(currentCity);
            jQuery(".studios__current-city").html(currentCity);

            var city;
            var obj = { city: currentCity };
            var sObj = JSON.stringify(obj)
            localStorage.setItem("object", sObj);
        });
    }

});





