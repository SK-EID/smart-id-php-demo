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
