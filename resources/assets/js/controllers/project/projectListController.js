angular.module('app.controllers').controller('projectListController', 
    ['$scope', 'projectService', function ($scope, projectService) {
        $scope.projects = projectService.findAll();
    }]
);