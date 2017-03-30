<?php

use Sk\SmartId\Api\Data\HashType;
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

  $authenticationHash = AuthenticationHash::generateRandomHash( HashType::SHA512 );
  $app['session']->set( 'authenticationHash', $authenticationHash );
  $app['session']->set( 'tmp_user', array(
      'country_code'             => $countryCode,
      'national_identity_number' => $nationalIdentityNumber
  ) );
  $response = array(
      'data' => array(
          'verificationCode' => $authenticationHash->calculateVerificationCode()
      )
  );
  return $app->json( array_merge( $response, array( 'status' => 'SUCCESS' ) ) );
} );