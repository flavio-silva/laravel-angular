angular.module('app.services').factory('projectNoteService',['$resource', 'configConstant',
    function ($resource, configConstant) {

        var url = configConstant.baseUrl + '/projects/:id/note/:noteId';

        var service = $resource(url, {notedId: '@noteId', id: '@id'}, {
            update: {method: 'PUT'},
            delete: {method: 'DELETE'}
        });

        return {

            find: function (params, success, error) {

                if (!angular.isObject(params)) {
                    throw new TypeError('Object was expected in the first parameter "params"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the second parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the third parameter "error"');
                }

                return service.get(params, success, error);
            },

            findAll: function (params) {

                if (!angular.isObject(params)) {
                    throw new TypeError('Object was expected in the first parameter "params"');
                }

                return service.query(params);
            },

            save: function (params, note, success, error) {

                if (!angular.isObject(params)) {
                    throw new TypeError('Object was expected in the first parameter "params"');
                }

                if (!angular.isObject(note)) {
                    throw new TypeError('Object was expected in the first parameter "note"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the second parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the third parameter "error"');
                }

                return service.save(params, note, success, error);
            },

            update: function (params, note, success, error) {
                if (!angular.isObject(params)) {
                    throw new TypeError('Object was expected in the first parameter "params"');
                }

                if (!angular.isObject(note)) {
                    throw new TypeError('Object was expected in the second parameter "note"');
                }

                if (!angular.isFunction(success)) {
                    throw new TypeError('Callback was expected in the third parameter "success"');
                }

                if (!angular.isFunction(error)) {
                    throw new TypeError('Callback was expected in the fourth parameter "error"');
                }

                return service.update(params, note, success, error);
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
