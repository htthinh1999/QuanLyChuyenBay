var myApp = angular.module('MVC', ['ui.router', 'ui.bootstrap']);

myApp.config(function ($stateProvider, $locationProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/');
    $stateProvider
      .state("/", {
        url: "/",
        templateUrl: "templates/Hoso.php",
        controller: "sinhvien_controler",
        controllerAs: "std_ctrl",

        resolve: {
          title: [
            "$rootScope",
            function ($rootScope) {
              $rootScope.title = "Kết hợp Angular với PHP trên mô hình MVC";
            },
          ],
        },
      })

      .state("cau 12", {
        url: "/truyvan12",
        templateUrl: "templates/truyvan12.php",
        controller: "Cau12",
        controllerAs: "std_ctrl12",

        resolve: {
          title: [
            "$rootScope",
            function ($rootScope) {
              $rootScope.title = "Cau 12";
            },
          ],
        },
      })

      .state("/cau 21", {
        url: "/truyvan21",
        templateUrl: "templates/truyvan21.php",
        controller: "Cau21",
        controllerAs: "std_ctrl",

        resolve: {
          title: [
            "$rootScope",
            function ($rootScope) {
              $rootScope.title = "Cau 21";
            },
          ],
        },
      });
            
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });




});

