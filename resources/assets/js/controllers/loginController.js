angular.module('app.controllers').controller('loginController', 
    ['$scope', 'OAuth', '$location', 'userService', 'localStorageService', 
    function ($scope, OAuth, $location, userService, localStorageService) {

        $scope.login = function (user) {

            OAuth.getAccessToken(user).then(function () {
                var authenticatedUser = userService.getAuthenticatedUser();

                authenticatedUser.$promise.then(function (result) {
                    localStorageService.set('authenticatedUser', result);                    
                    return $location.path('home');
                }, function (error) {
                    console.log(error);
                });
                
            }, function (error) {

                $scope.error = {
                    title: error.data.error,
                    message: error.data.error_description
                }
            });
        }
    }
]);