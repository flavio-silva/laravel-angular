angular.module('app.controllers').controller('projectEditController', ['$scope', 'projectService', 'clientService', '$routeParams', '$location', function ($scope, service, clientService, $routeParams, $location) {

    $scope.clients = clientService.findAll();

    service.find($routeParams.id, function (result) {        
        $scope.project = result;

    }, function (error) {
        console.log(error);
    });

    $scope.save = function (project) {
        
        service.update({id: project.id}, project, function () {
            return $location.path('/projects');
        }, function (error) {
            console.log(error);
        });
    }
}]);