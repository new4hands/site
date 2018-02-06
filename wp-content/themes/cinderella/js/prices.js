/**
 * Created by PK on 10.11.2017.
 */

 jQuery(document).ready(function () {

    /*    Блок Карта Slidedown*/

    var сhosenCityText,
    apps = {},
    cityMass = ["Новосибирск", "Москва", "Санкт-Петербург", "Сочи", "Томск", "Норильск", "Барнаул",
    "Старый Оскол", "Владивосток", "Севастополь", "Казань", "Липецк", "Ялта", "Воронеж"],
    pricesList = jQuery(".prices-list");


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

   /* navigator.geolocation.getCurrentPosition(
        function(position) {
            console.log('Позиция пользователя: ' +
                position.coords.latitude + ", " + position.coords.longitude);
        }
        );*/

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
                    /*  jQuery(".prices__current-city").html(retObj.city);*/

                } else {
                   currentCity = result.geoObjects.get(0).properties.get('metaDataProperty.GeocoderMetaData.AddressDetails.Country.AddressLine');
                   jQuery(".current-city__item").html(currentCity);
                   /* jQuery(".prices__current-city").html(currentCity);*/

                   var city;
                   var obj = { city: currentCity };
                   var sObj = JSON.stringify(obj)
                   localStorage.setItem("object", sObj);
               }

           });
        }

        function defineCity() {
            var xhr = new XMLHttpRequest();
            var currentCityItem = jQuery(".current-city__item").text().trim();
        }

        /*Подгрузка контента*/

        jQuery('.pi-title').eq(0).click(function(){  

         jQuery(".address_list-content").empty();
         jQuery(".prices__current-city").html(jQuery(this).text());
         jQuery.ajax({  
            url: "/wp-content/themes/cinderella/html/prices-msk.html",  
            cache: false,  
            success: function(html){  
                jQuery(".address_list-content").append(html);  
            }  
        });  
     });  

        jQuery('.pi-title').eq(1).click(function(){  
          jQuery(".address_list-content").empty();
          jQuery(".prices__current-city").html(jQuery(this).text());
          jQuery.ajax({  
            url: "/wp-content/themes/cinderella/html/prices-nsk.html",  
            cache: false,  
            success: function(html){  
                jQuery(".address_list-content").append(html);  
            }  
        });  
      });  

        jQuery('.pi-title').eq(2).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-barnaul.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        });  

        jQuery('.pi-title').eq(3).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-sochi.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(4).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-vladik.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(5).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-tomsk.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(6).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-seva.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(7).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-piter.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(8).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-norilsk.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(9).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-oldoskol.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(10).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-kazan.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(11).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-lipeck.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(13).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-yalta.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        jQuery('.pi-title').eq(14).click(function(){  
            jQuery(".address_list-content").empty();
            jQuery(".prices__current-city").html(jQuery(this).text());
            jQuery.ajax({  
                url: "/wp-content/themes/cinderella/html/prices-voroneg.html",  
                cache: false,  
                success: function(html){  
                    jQuery(".address_list-content").append(html);  
                }  
            });  
        }); 

        /*Раскрывающаяся таблица адресов*/


        jQuery(".pi-title").each(function(index) {
            jQuery(".address_list-content").on("click", ".pi-title", function(){
                var dataPrice = jQuery(this).data("price");

                if (jQuery("#price_"+ dataPrice).is(':hidden')) {
                   jQuery(".price_detail").each(function(index) {
                    jQuery(this).hide();
                });
                   jQuery("#price_"+ dataPrice).show();

               } else {
                   jQuery("#price_"+ dataPrice).hide();
               }

           });
        });


    });


