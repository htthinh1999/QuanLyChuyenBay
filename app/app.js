var myApp = angular.module('MVC', ['ui.router', 'ui.bootstrap']);

myApp.config(function ($stateProvider, $locationProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/');
    $stateProvider
            .state('/', {
                url: '/',
                templateUrl: 'templates/Hoso.php',
                controller: 'sinhvien_controler',
                controllerAs: "std_ctrl",
              
                resolve: {
                    'title': ['$rootScope', function ($rootScope) {
                            $rootScope.title = "Kết hợp Angular với PHP trên mô hình MVC";
                        }]
                }
            })
            .state('cau-1', {
                url: '/cau-1',
                templateUrl: 'templates/Cau1.php',
                controller: 'cau1_controller',
                controllerAs: "std_ctrl1",
              
                resolve: {
                    'title': ['$rootScope', function ($rootScope) {
                            $rootScope.title = "Kết hợp Angular với PHP trên mô hình MVC";
                        }]
                }
            })
            .state('cau-2', {
                url: '/cau-2',
                templateUrl: 'templates/Cau2.php',
                controller: 'cau2_controller',
                controllerAs: "std_ctrl2",
              
                resolve: {
                    'title': ['$rootScope', function ($rootScope) {
                            $rootScope.title = "Kết hợp Angular với PHP trên mô hình MVC";
                        }]
                }
            });
            
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });

});