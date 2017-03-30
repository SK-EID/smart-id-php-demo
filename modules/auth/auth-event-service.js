(function() {
  'use strict';

  angular.module('sid.auth')
      .factory('SidAuthEventService', SidAuthEventService);

  function SidAuthEventService($rootScope) {
    return {
      subscribeToSignIn: subscribeToSignIn,
      notifyOfSignIn: notifyOfSignIn,
      subscribeToSignOut: subscribeToSignOut,
      notifyOfSignOut: notifyOfSignOut
    };

    function subscribeToSignIn(scope, callback) {
      var handler = $rootScope.$on('SidAuthEventService.signIn', callback);
      scope.$on('$destroy', handler);
    }

    function notifyOfSignIn(userInfo) {
      $rootScope.$emit('SidAuthEventService.signIn', userInfo);
    }

    function subscribeToSignOut(scope, callback) {
      var handler = $rootScope.$on('SidAuthEventService.signOut', callback);
      scope.$on('$destroy', handler);
    }

    function notifyOfSignOut() {
      $rootScope.$emit('SidAuthEventService.signOut');
    }
  }
})();