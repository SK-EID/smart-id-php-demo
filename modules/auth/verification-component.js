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
      .component('sidVerification', {
        templateUrl: 'modules/auth/verification.html',
        controller: SidVerificationController
      });

  function SidVerificationController($location, SidVerificationCodeService, SidAuthService, SidAuthEventService) {
    var ctrl = this;

    ctrl.$onInit = function() {
      ctrl.verificationCode = SidVerificationCodeService.flushVerificationCode();

      validate();
    };

    function validate() {
      SidAuthService.postValidate(function(response) {
        if ( response && !!response.data && !!response.data.isSignedIn ) {
          SidAuthEventService.notifyOfSignIn(response.data);
          $location.path('/dashboard');
        } else if (response && !!response.data && !!response.data.isRequestingValidation) {
          validate();
        }
      }, function(response) {
        if ( response.data.status == 'ERROR' ) {
          $location.search('invalid');
          $location.search('code', response.data.code);
          $location.path('/sign-in');
        }
      });
    }
  }
})();
