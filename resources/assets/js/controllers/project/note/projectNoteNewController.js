angular.module('app.controllers').controller('projectNoteNewController',
    ['$scope', 'projectNoteService', 'projectService', '$location', '$routeParams', function ($scope, service, projectService, $location, $routeParams) {

        $scope.projects = projectService.findAll();

        $scope.save = function (note, projectId) {
            var params = {
                id: projectId
            }

            service.save(params, note, function () {

                var url = '/project/' + $routeParams.id + '/notes';
                return $location.path(url);
            }, function (error) {
                console.log(error);
            });
        }
    }
]);