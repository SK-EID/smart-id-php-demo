(function() {
  'use strict';

  angular.module('sid.customer', [])
      .config(function($routeProvider) {
        $routeProvider
            .when('/dashboard', {
              template: '<sid-dashboard></sid-dashboard>'
            });
      });
})();