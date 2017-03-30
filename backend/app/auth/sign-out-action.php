<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../CustomerCredentialsValidator.php';

$app->post( '/sign-out', function( Request $request ) use ( $app, $client )
{
  $app['session']->clear();
  $response = array(
      'data' => array(
          'isSignedIn' => false
      )
  );
  return $app->json( array_merge( $response, array( 'status' => 'SUCCESS' ) ) );
} );