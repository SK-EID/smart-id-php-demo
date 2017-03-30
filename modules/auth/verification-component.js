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
        if ( response && response.data && response.data.isSignedIn ) {
          SidAuthEventService.notifyOfSignIn(response.data);
          $location.path('/dashboard');
        }
      }, function(response) {
        if ( response.data.status == 'ERROR' ) {
          $location.search('invalid');
          $location.path('/sign-in');
        }
      });
    }
  }
})();