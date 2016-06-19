angular.module('app.controllers').controller('projectEditController', ['$scope', 'projectService', 'clientService', '$routeParams', '$location', function ($scope, service, clientService, $routeParams, $location) {

    service.find($routeParams.id, function (result) {
        
        $scope.project = result;        

    }, function (error) {
        console.log(error);
    });

    $scope.save = function (project) {
        
        service.update({id: project.id}, project, function () {
            return $location.path('/projects');
        }, function (error) {
            console.log(error);
        });
    };

    $scope.formatName = function (project) {
        
        if(angular.isDefined(project)) {
            return project.client.data.name;
        }
    };

    $scope.getClients = function (name) {
        var params = {
            search:name,
            searchFields:'name:like'
        }

        return clientService.findAll(params).$promise.then(function (result) {
            return result;
        },function (error) {
            console.log(error);
        });
    };

    $scope.selectClient = function (item) {
        $scope.project.client.data = item;
        $scope.project.client_id = item.id;
    };

     $scope.due_date = {
            isOpened: false
        };

        $scope.dateOptions = {
            startingDay: 0
        };

        $scope.openDatePicker = function () {            
            $scope.due_date.isOpened = true;
        };
}]);