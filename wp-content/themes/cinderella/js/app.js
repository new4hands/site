var app = angular.module('app', ['ngRoute']);

    // configure our routes
    app.config(function($routeProvider) {
        $routeProvider

            // route for the home page
            .when('/moscow', {
                templateUrl : '/wp-content/themes/cinderella/html/prices-msk.html',
               /* controller  : 'mainController1'*/
            })

             .when('/novosibirsk', {
                templateUrl : '/wp-content/themes/cinderella/html/prices-nsk.html',
           /*     controller  : 'mainController2'*/
            })
 
    });



           jQuery(".pi-title").each(function(index) {
            jQuery(".address_list-content").delegate("click", ".pi-title", function(){
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

 /*   // create the controller and inject Angular's $scope
    app.controller('mainController', function($scope) {
        // create a message to display in our view
        $scope.message = 'Everyone come and see how good I look!';
    });*/

 