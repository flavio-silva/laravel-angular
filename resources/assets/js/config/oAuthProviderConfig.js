angular.module('app').config(['OAuthProvider', function (OAuthProvider) {

    OAuthProvider.configure({
        baseUrl: 'http://localhost:8000',
        clientId: 'projectapp',
        clientSecret: 'secret',
        grantPath: '/oauth'
    });
}]);
