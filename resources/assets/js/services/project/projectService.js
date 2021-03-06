angular.module('app.services').factory('projectService',['$resource', 'configConstant', '$filter', '$httpParamSerializer',
    function ($resource, configConstant) {

        var service = $resource(configConstant.baseUrl + '/projects/:id', {id: '@id'}, {
            update: {method: 'PUT'},
            delete: {method: 'DELETE'},
            get: {
                method: 'GET',
                transformResponse: function (result) {
                    data = JSON.parse(result).data;
                    var date = data.due_date.split('-');
                    data.due_date = new Date(date[0], date[1] - 1, date[2]);
                    return data;
                }
            },
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

            findAll: function () {
                return service.query();
            },

            save: function (project, success, error) {

                if (!angular.isObject(project)) {
                    throw new TypeError('Object was expected in the first parameter "project"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the second parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the third parameter "error"');
                }

                return service.save(project, success, error);
            },

            update: function (params, project, success, error) {
                if (!angular.isObject(params)) {
                    throw new TypeError('Object was expected in the first parameter "params"');
                }

                if (!angular.isObject(project)) {
                    throw new TypeError('Object was expected in the second parameter "project"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the third parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the fourth parameter "error"');
                }

                return service.update(params, project, success, error);
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
