angular.module('app.controllers').controller('clientListController',
    ['$scope', 'clientService', function ($scope, clientService) {
        $scope.clients = clientService.findAll();
}]);