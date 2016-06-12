angular.module('app.controllers').controller('projectNewController',
    ['$scope', 'projectService', 'clientService', '$location', '$routeParams', 'localStorageService', function ($scope, service, clientService, $location, $routeParams, localStorageService) {        

        $scope.clients = clientService.findAll();

        $scope.save = function (project) {
            project.owner_id = localStorageService.get('authenticatedUser').id;
                        
            service.save(project, function () {                
                return $location.path('/projects');
            }, function (error) {
                console.log(error);
            });
        }
    }
]);