(function() {
  'use strict';

  angular.module('sid.layout')
      .component('sidHeader', {
        templateUrl: 'modules/layout/header.html',
        controller: SidHeaderController
      });

  function SidHeaderController($scope, SidAuthEventService) {
    var ctrl = this;

    ctrl.$onInit = function() {
      ctrl.isSignedIn = false;
      ctrl.signOut = signOut;
      
      SidAuthEventService.subscribeToSignIn($scope, function(event, userInfo) {
        ctrl.isSignedIn = true;
        ctrl.userInfo = userInfo;
      });
    };
    
    function signOut() {
      SidAuthEventService.notifyOfSignOut();
      ctrl.isSignedIn = false;
    }
  }
})();