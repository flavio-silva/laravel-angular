angular.module('app.controllers').controller('clientRemoveController', ['$scope', 'clientService', '$location', '$routeParams', function ($scope, clientService, $location, $routeParams) {

    clientService.find($routeParams.id, function (result) {
        $scope.client = result.data;
    }, function (error) {
        console.log(error);
    });

    $scope.remove = function (id) {

        clientService.delete({id: id}, function () {
            return $location.path('/clients');
        }, function (error) {
            $scope.error = {
                message: error.data
            }
        });
    }
}]);