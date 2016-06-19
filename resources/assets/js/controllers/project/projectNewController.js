angular.module('app.controllers').controller('projectNewController',
    ['$scope', 'projectService', 'clientService', '$location', '$routeParams', 'localStorageService', function ($scope, service, clientService, $location, $routeParams, localStorageService) {        

        $scope.due_date = {
            isOpened: false
        };

        $scope.dateOptions = {
            startingDay: 0
        };

        $scope.openDatePicker = function () {            
            $scope.due_date.isOpened = true;
        };

        $scope.save = function (project) {
            
            project.owner_id = localStorageService.get('authenticatedUser').id;

            service.save(project, function () {                
                return $location.path('/projects');
            }, function (error) {
                console.log(error);
            });
        };

        $scope.formatName = function (id) {

            if(angular.isDefined(id)) {
                
                return $scope.clients.find(function (elem) {
                    return elem.id === id;
                }).name;
            }
        };

        $scope.getClients = function (name) {
            var params = {
                search: name,
                searchFields: 'name:like'
            }
            
            return clientService.findAll(params).$promise.then(function (clients) {
                $scope.clients = clients;
                return clients;
            }, function (error) {
                console.log(error);
            });
        };

    }
]);