/*
 *     This file is part of Smart-ID PHP Demo.
 *
 *     Smart-ID PHP Demo is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     Smart-ID PHP Demo is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with Smart-ID PHP Demo.  If not, see <https://www.gnu.org/licenses/>.
 */

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
