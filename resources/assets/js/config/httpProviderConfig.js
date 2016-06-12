angular.module('app').config(['$httpProvider', function ($httpProvider) {

    $httpProvider.defaults.transformResponse = function (data, headers) {
        var contentType = headers('content-type');

        if(angular.isString(contentType) && contentType.indexOf('json') !== -1) {
            var obj = JSON.parse(data);

            if(obj.hasOwnProperty('data')) {
                return obj.data;
            }

            return obj;
        }

        return data;
    }
}]);
