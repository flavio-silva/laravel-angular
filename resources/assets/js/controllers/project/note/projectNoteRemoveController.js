angular.module('app.controllers').controller('projectNoteRemoveController', ['$scope', 'projectNoteService', '$location', '$routeParams', function ($scope, service, $location, $routeParams) {

    service.find($routeParams, function (result) {
        $scope.note = result;
    }, function (error) {
        console.log(error);
    });

    $scope.remove = function (noteId, id) {
        var params = {
            noteId: noteId,
            id: id
        }

        service.delete(params, function () {
            var url = '/project/' + params.id + '/notes';
            return $location.path(url);
        }, function (error) {
            $scope.error = {
                message: error.data
            }
        });
    }
}]);