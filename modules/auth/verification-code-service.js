(function() {
  'use strict';

  angular.module('sid.auth')
      .factory('SidVerificationCodeService', SidVerificationCodeService);

  function SidVerificationCodeService() {
    var holder = null;

    return {
      storeVerificationCode: storeVerificationCode,
      flushVerificationCode: flushVerificationCode
    };

    function storeVerificationCode(verificationCode) {
      holder = verificationCode;
    }

    function flushVerificationCode() {
      var flush = holder;
      holder = null;
      return flush;
    }
  }
})();