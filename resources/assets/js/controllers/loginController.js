angular.module('app.controllers').controller('loginController', ['$scope', 'OAuth', '$location', function ($scope, OAuth, $location) {

    $scope.login = function (user) {

        OAuth.getAccessToken(user).then(function () {
            $location.path('home');
        }, function (error) {

            $scope.error = {
                title: error.data.error,
                message: error.data.error_description
            }
        });
    }
}]);