angular.module('app').config(['OAuthTokenProvider', function (OAuthTokenProvider) {
    OAuthTokenProvider.configure({
        name: 'token',
        options: {
            secure: false
        }
    });
}]);
