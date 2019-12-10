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
  'use strict';

  angular.module('sid.auth')
      .component('sidSignIn', {
        templateUrl: 'modules/auth/sign-in.html',
        controller: SidSignInController
      });

  function SidSignInController($routeParams, $location, SidAuthService, SidVerificationCodeService) {
    var ctrl = this;

    ctrl.$onInit = function() {
      ctrl.signIn = signIn;

      ctrl.countries = [
        {code: 'EE', label: 'Estonia'},
        {code: 'LV', label: 'Latvia'},
        {code: 'LT', label: 'Lithuania'}
      ];
      ctrl.country = ctrl.countries[0];
      ctrl.nationalIdentityNumber = null;

      checkInvalidState();
    };

    function signIn() {
      SidAuthService.postSignIn(ctrl.country.code, ctrl.nationalIdentityNumber, function(response) {
        if ( response && response.data && response.data.verificationCode ) {
          SidVerificationCodeService.storeVerificationCode(response.data.verificationCode);
          $location.path('/verification');
        }
      }, function(response) {
        if ( response.data.status == 'ERROR' ) {
          ctrl.invalid = true;
          ctrl.code = response.data.code;
        }
      });
    }

    function checkInvalidState() {
      ctrl.invalid = false;

      if ($routeParams.invalid) {
        ctrl.invalid = true;
        ctrl.code = $routeParams.code;
      }
    }
  }
})();
