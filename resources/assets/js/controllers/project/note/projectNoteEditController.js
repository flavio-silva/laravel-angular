angular.module('app.controllers').controller('projectNoteEditController', ['$scope', 'projectNoteService', '$location', '$routeParams', 'projectService', function ($scope, service, $location, $routeParams, projectService) {

    $scope.projects = projectService.findAll();

    service.find($routeParams, function (result) {
        $scope.note = result;

        $scope.project = {
            id: result.project.data.id
        }

    }, function (error) {
        console.log(error);
    });

    $scope.save = function (note, projectId) {

        var params = {
            noteId: note.id,
            id: projectId
        }

        service.update(params, note, function () {
            var url = '/project/' + params.id + '/notes';

            return $location.path(url);
        }, function (error) {
            console.log(error);
        });
    }
}]);