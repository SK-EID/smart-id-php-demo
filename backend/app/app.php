<?php

use Silex\Provider\SessionServiceProvider;
use Sk\SmartId\Client;
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();
$app->register( new SessionServiceProvider() );

$config = array(
    'host_url'           => 'https://sid.demo.sk.ee/smart-id-rp/v1/',
    'relying_party_uuid' => 'ea6bd57a-506c-4056-be56-233e25a0e6d2',
    'relying_party_name' => 'PHP library',
    'certificate_level'  => 'ADVANCED',
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