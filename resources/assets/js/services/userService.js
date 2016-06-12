angular.module('app.services').factory('userService', 
    ['$resource', 'configConstant', function ($resource, configConstant) {
        var url = configConstant.baseUrl + '/authenticatedUser';

        return $resource(url, {}, {
            'getAuthenticatedUser': {
                method: 'GET'
            }
        });    
    }]
);