angular.module('app.controllers').controller('projectRemoveController', ['$scope', 'projectService', '$location', '$routeParams', function ($scope, service, $location, $routeParams) {

    service.find($routeParams.id, function (result) {
        $scope.project = result;
    }, function (error) {
        console.log(error);
    });

    $scope.remove = function (id) {
        
        service.delete({id: id}, function () {            
            return $location.path('/projects');
        }, function (error) {
            $scope.error = {
                message: error.data
            }
        });
    }
}]);