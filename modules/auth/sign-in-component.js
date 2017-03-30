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
        }
      });
    }

    function checkInvalidState() {
      ctrl.invalid = false;

      if ($routeParams.invalid) {
        ctrl.invalid = true;
      }
    }
  }
})();