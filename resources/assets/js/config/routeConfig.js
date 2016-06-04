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
        })
        .when('/clients/:id/remove', {
            templateUrl: 'build/views/client/remove.html',
            controller: 'clientRemoveController'
        })
        .when('/project/:id/notes', {
            templateUrl: 'build/views/project/note/list.html',
            controller: 'projectNoteListController'
        })
        .when('/project/:id/notes/new', {
            templateUrl: 'build/views/project/note/new.html',
            controller: 'projectNoteNewController'
        })
        .when('/project/:id/notes/:noteId/edit', {
            templateUrl: 'build/views/project/note/edit.html',
            controller: 'projectNoteEditController'
        })
        .when('/project/:id/notes/:noteId/remove', {
            templateUrl: 'build/views/project/note/remove.html',
            controller: 'projectNoteRemoveController'
        });
}]);