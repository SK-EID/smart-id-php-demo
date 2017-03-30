(function() {
  'use strict';

  angular.module('sid.auth', [])
      .config(function($routeProvider) {
        $routeProvider
            .when('/sign-in', {
              template: '<sid-sign-in></sid-sign-in>'
            })
            .when('/verification', {
              template: '<sid-verification></sid-verification>'
            });
      });

  angular.module('sid.auth')
      .run(function($location, SidAuthService, SidAuthEventService) {
        SidAuthService.getIsSignedIn(function(response) {
          if ( response && response.data && response.data.isSignedIn ) {
            SidAuthEventService.notifyOfSignIn(response.data);
            $location.path('/dashboard');
          }
        });
      });
})();