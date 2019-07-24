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

$app->get( '/is-signed-in', function() use ( $app )
{
  $response = array(
      'data' => array(
          'isSignedIn' => false
      )
  );

  /** @var \Sk\SmartId\Api\Data\AuthenticationIdentity|null $user */
  if ( null !== $user = $app['session']->get( 'user' ) )
  {
    $response['data'] = array(
        'isSignedIn'   => true,
        'firstName'    => $user->getGivenName(),
        'lastName'     => $user->getSurName(),
        'personalCode' => $user->getIdentityCode()
    );
  }

  return $app->json( array_merge( $response, array( 'status' => 'SUCCESS' ) ) );
} );
