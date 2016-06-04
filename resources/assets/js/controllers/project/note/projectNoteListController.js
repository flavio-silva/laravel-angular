angular.module('app.controllers').controller('projectNoteListController',
    ['$scope', 'projectNoteService', 'projectService', function ($scope, service) {

        $scope.notes = service.findAll({id: 1});
}]);