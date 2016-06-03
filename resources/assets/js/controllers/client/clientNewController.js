angular.module('app.controllers').controller('clientNewController', ['$scope', 'clientService', '$location', function ($scope, clientService, $location) {

    $scope.save = function (client) {

        clientService.save(client, function (res) {
            return $location.path('/clients');
        }, function (error) {
            console.log(error);
        });
    }
}]);