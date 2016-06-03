angular.module('app', ['ngRoute', 'app.controllers', 'app.services', 'angular-oauth2']);
angular.module('app.controllers', ['angular-oauth2', 'ngMessages']);
angular.module('app.services', ['ngResource']);