angular.module('app').config(['$routeProvider', function ($routeProvider) {
    $routeProvider
    .when('/login', {
        templateUrl: 'build/views/login.html',
        controller: 'loginController'

    })
    .when('/home', {
        templateUrl: 'build/views/home.html',
        controller: 'homeController'
    });
}]);