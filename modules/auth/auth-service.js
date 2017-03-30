(function() {
  'use strict';

  angular.module('sid.auth')
      .factory('SidAuthService', SidAuthService);

  function SidAuthService($resource, config) {
    var url = config.api;

    var AuthResource = $resource(url, {}, {
      getIsSignedIn: {url: url + '/is-signed-in', method: 'GET', isArray: false},
      postSignIn: {url: url + '/sign-in', method: 'POST'},
      postValidate: {url: url + '/validate', method: 'POST'},
      postSignOut: {url: url + '/sign-out', method: 'POST'}
    });

    return {
      getIsSignedIn: getIsSignedIn,
      postSignIn: postSignIn,
      postValidate: postValidate,
      postSignOut: postSignOut
    };

    function getIsSignedIn(successFn, errorFn) {
      return AuthResource.getIsSignedIn({}, {}, successFn, errorFn);
    }

    function postSignIn(country, nationalIdentityNumber, successFn, errorFn) {
      return AuthResource.postSignIn({}, {
        country: country,
        nationalIdentityNumber: nationalIdentityNumber
      }, successFn, errorFn);
    }

    function postValidate(successFn, errorFn) {
      return AuthResource.postValidate({}, {}, successFn, errorFn);
    }
    
    function postSignOut(nationalIdentityNumber, successFn, errorFn) {
      return AuthResource.postSignOut({}, {
        nationalIdentityNumber: nationalIdentityNumber
      }, successFn, errorFn);
    }
  }
})();