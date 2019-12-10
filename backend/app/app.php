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

use Silex\Provider\SessionServiceProvider;
use Sk\SmartId\Client;
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app->register( new SessionServiceProvider() );

$config = array(
    'host_url'           => 'https://sid.demo.sk.ee/smart-id-rp/v1/',
    'relying_party_uuid' => 'ea6bd57a-506c-4056-be56-233e25a0e6d2',
    'relying_party_name' => 'PHP library',
    'certificate_level'  => 'QUALIFIED',
);
$app['client.config'] = $config;
$client = new Client();
$client->setRelyingPartyUUID( $config['relying_party_uuid'] )
    ->setRelyingPartyName( $config['relying_party_name'] )
    ->setHostUrl( $config['host_url'] );

$app->before( function( Request $request )
{
  if ( 0 === strpos( $request->headers->get( 'Content-Type' ), 'application/json' ) )
  {
    $data = json_decode( $request->getContent(), true );
    $request->request->replace( is_array( $data ) ? $data : array() );
  }
} );
