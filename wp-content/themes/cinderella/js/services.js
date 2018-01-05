/**
 * Created by PK on 10.11.2017.
 */

 jQuery(document).ready(function () {

    (function (jQuery) {
        jQuery.lockfixed(".services-sticky", {offset: {top: 10, bottom: 10}});
    })(jQuery);

    var serviceList = document.querySelector(".services-list");
    var apps = {};

    jQuery(".services-sticky__link").eq(0).bind("click", function() {

            jQuery(".services-list").empty();
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/wp-content/themes/cinderella/json/manicure.json", true);
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
                jQuery(".services-title__text").empty().text("Маникюр");
            };
    });

     jQuery(".services-sticky__link").eq(0).trigger('click');

     jQuery(".services-sticky__link").eq(1).bind("click", function() {
     jQuery(".services-list").empty();
     var xhr = new XMLHttpRequest();
     xhr.open("GET", "/wp-content/themes/cinderella/json/pedicure.json", true);
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
        jQuery(".services-title__text").empty().text("Педикюр");
    };
});

    function insertBlock(i, apps) {
        if (i < apps.length) {
            var blockWrapper = document.createElement("div");
            serviceList.appendChild(blockWrapper);
            blockWrapper.classList.add("service-item__wrapper");

            var block = document.createElement("div");
            blockWrapper.appendChild(block);
            block.classList.add("service-item");

            var block_link = document.createElement("a");
            block.appendChild(block_link);
            block_link.classList.add("service-item__link");
            block_link.href = apps[i].link;

            var blockItemimg = block_link.appendChild(document.createElement("div"));
            blockItemimg.classList.add("service-item__image");

            var block_img = blockItemimg.appendChild(document.createElement("img"));
            block_img.classList.add("img-rounded");
            block_img.src = apps[i].image_path;

            var block_price = blockItemimg.appendChild(document.createElement("div"));
            block_price.classList.add("service-item__price");
            block_price.innerHTML = apps[i].price;

            var blockInfoblock = block.appendChild(document.createElement("div"));
            blockInfoblock.classList.add("service-item__info-block");
            blockInfoblock.classList.add("clearfix");

            var block_name = blockInfoblock.appendChild(document.createElement("div"));
            block_name.classList.add("service-item__name");
            block_name.innerHTML = apps[i].name;

            var block_icon = blockInfoblock.appendChild(document.createElement("a"));
            block_icon.classList.add("service-item__info-icon");
            block_icon.href = "#";

            var blockTimeblock = block.appendChild(document.createElement("div"));
            blockTimeblock.classList.add("service-item__time-block");
            blockTimeblock.classList.add("clearfix");

            var block_time = blockTimeblock.appendChild(document.createElement("span"));
            block_time.classList.add("service-item__time");
            block_time.innerHTML = apps[i].time;

            var block_description = block.appendChild(document.createElement("p"));
            block_description.classList.add("service-item__description");
            block_description.innerHTML = apps[i].description;
        }
        showDescription();


        jQuery(".service-item__wrapper").each(function (index) {
            jQuery(this).delay(167 * index).animate({'opacity': 1}, 300);
        });
    }

    jQuery(".search").bind("click", function () {
        jQuery(this).delay(70).animate({width: "100%"}, 350);
    });


    function showDescription() {

        jQuery(".service-item__info-icon").bind("click", function (event) {
            event.preventDefault();
            var that = jQuery(this).closest(".service-item");

            jQuery(this).closest(".service-item").find(".service-item__description").show();
            jQuery(this).closest(".service-item").addClass("service-item__appear");

        });


        jQuery(".service-item__wrapper").mouseleave(function(event){
            event.preventDefault();
            var that = jQuery(this).find(".service-item");
            that.removeClass('service-item__appear');
            that.find(".service-item__description").hide();
        });


    }

});