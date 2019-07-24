<?php
/**
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

use Sk\SmartId\Api\Data\AuthenticationHash;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../CustomerCredentialsValidator.php';

$app->post( '/sign-in', function( Request $request ) use ( $app, $client )
{
  $countryCode = $request->request->get( 'country' );
  $nationalIdentityNumber = $request->request->get( 'nationalIdentityNumber' );

  if ( !CustomerCredentialsValidator::validate( $countryCode, $nationalIdentityNumber ) )
  {
    throw new UserNotFoundException();
  }

  $authenticationHash = AuthenticationHash::generate();
  $app['session']->set( 'authenticationHash', $authenticationHash );

  $sessionId = $client->authentication()
      ->createAuthentication()
      ->withNationalIdentityNumber( $nationalIdentityNumber )
      ->withCountryCode( $countryCode )
      ->withDisplayText( 'Log in to Smart-ID demo portal' )
      ->withAuthenticationHash( $authenticationHash )
      ->withCertificateLevel( $app['client.config']['certificate_level'] )
      ->startAuthenticationAndReturnSessionId();

  $app['session']->set( 'sessionId', $sessionId );
  $response = array(
      'data' => array(
          'verificationCode' => $authenticationHash->calculateVerificationCode()
      )
  );
  return $app->json( array_merge( $response, array( 'status' => 'SUCCESS' ) ) );
} );
