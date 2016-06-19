angular.module('app.controllers').controller('projectNoteNewController',
    ['$scope', 'projectNoteService', 'projectService', '$location', '$routeParams', function ($scope, service, projectService, $location, $routeParams) {

        $scope.projects = projectService.findAll();

        $scope.save = function (note) {
            
            var params = {
                id: $routeParams.id
            }

            service.save({}, note, function () {

                var url = '/project/' + $routeParams.id + '/notes';
                return $location.path(url);
            }, function (error) {
                console.log(error);
            });
        }
    }
]);