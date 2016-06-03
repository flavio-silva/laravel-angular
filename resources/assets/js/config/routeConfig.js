angular.module('app').config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when('/login', {
            templateUrl: 'build/views/login.html',
            controller: 'loginController'

        })
        .when('/home', {
            templateUrl: 'build/views/home.html',
            controller: 'homeController'
        })
        .when('/clients', {
            templateUrl: 'build/views/client/list.html',
            controller: 'clientListController'
        })
        .when('/clients/new', {
            templateUrl: 'build/views/client/new.html',
            controller: 'clientNewController'
        })
        .when('/clients/:id/edit', {
            templateUrl: 'build/views/client/edit.html',
            controller: 'clientEditController'
        });
}]);