(function() {
  'use strict';

  angular.module('sid.customer')
      .component('sidDashboard', {
        templateUrl: 'modules/customer/dashboard.html',
        controller: SidDashboardController
      });

  function SidDashboardController($scope, $location, SidAuthEventService, SidAuthService) {
    var ctrl = this;

    ctrl.$onInit = function() {
      SidAuthEventService.subscribeToSignOut($scope, function() {
        signOut();
      });
    };

    function signOut() {
      SidAuthService.postSignOut(ctrl.nationalIdentityNumber, function() {
        $location.path('/sign-in');
      }, function(response) {
        if ( response.data.status == 'ERROR' ) {
          ctrl.invalid = true;
        }
      });
    }
  }
})();