angular.module('app.services').factory('clientService',['$resource', 'configConstant',
    function ($resource, configConstant) {

        var service = $resource(configConstant.baseUrl + '/clients/:id', {id: '@id'}, {
            update: {method: 'PUT'},
            delete: {method: 'DELETE'}
        });

        return {

            find: function (id, success, error) {

                if (!angular.isString(id)) {
                    throw new TypeError('String was expected in the first parameter "id"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the second parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the third parameter "error"');
                }

                return service.get({id: id}, success, error);
            },

            findAll: function (params) {
                params = params || {}

                if(!angular.isObject(params)) {
                    throw new TypeError('Object was expected in the parameter "params"');
                }

                return service.query(params);
            },

            save: function (client, success, error) {

                if (!angular.isObject(client)) {
                    throw new TypeError('Object was expected in the first parameter "client"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the second parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the third parameter "error"');
                }

                return service.save(client, success, error);
            },

            update: function (params, client, success, error) {
                if (!angular.isObject(params)) {
                    throw new TypeError('Object was expected in the first parameter "params"');
                }

                if (!angular.isObject(client)) {
                    throw new TypeError('Object was expected in the second parameter "client"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the third parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the fourth parameter "error"');
                }

                return service.update(params, client, success, error);
            },
            delete: function (params, success, error) {

                if (!angular.isObject(params)) {
                    throw new TypeError('Object was expected in the first parameter "params"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the second parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the third parameter "error"');
                }

                return service.delete(params, success, error);
            }
        };
    }
]);
