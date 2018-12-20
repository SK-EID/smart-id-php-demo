<?php

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
