(function() {
  'use strict';

  angular.module( 'sid.layout' )
      .factory( 'SidErrorEventService', SidErrorEventService );

  function SidErrorEventService( $rootScope ) {
    return {
      subscribe: subscribe,
      notify: notify
    };

    function subscribe( scope, callback ) {
      var handler = $rootScope.$on( 'SidErrorEventService.notify', callback );
      scope.$on( '$destroy', handler );
    }

    function notify() {
      $rootScope.$emit( 'SidErrorEventService.notify' );
    }
  }
})();