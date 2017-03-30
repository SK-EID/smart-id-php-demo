(function() {
  angular.module('smart-id-demo', [
    'ngResource',
    'ngRoute',
    'ngCookies',
    'ngSanitize',
    'ngMessages',

    'sid'
  ]);

  angular.module('smart-id-demo')
      .config(function($routeProvider, $locationProvider) {
        $locationProvider.hashPrefix('');

        $routeProvider
            .otherwise({
              redirectTo: '/'
            });
      });

  angular.module('smart-id-demo')
      .controller('BaseCtrl', function($location) {
        $location.path('/sign-in');
      });

  angular.module('sid', [
    'sid.config',

    'sid.layout',
    'sid.auth',
    'sid.customer'
  ]);
})();