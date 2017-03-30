(function() {
  'use strict';

  angular.module( 'sid.config', [] )
      .constant( 'config', {
        api: '/backend/app'
      } );
})();