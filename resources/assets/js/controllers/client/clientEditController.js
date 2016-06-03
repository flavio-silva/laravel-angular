angular.module('app.controllers').controller('clientEditController', ['$scope', 'clientService', '$location', '$routeParams', function ($scope, clientService, $location, $routeParams) {

    clientService.find($routeParams.id, function (result) {
        $scope.client = result.data;
    }, function (error) {
        console.log(error);
    });

    $scope.save = function (client) {

        clientService.update({id: client.id}, client, function (result) {
            return $location.path('/clients');
        }, function (error) {
            console.log(error);
        });
    }
}]);