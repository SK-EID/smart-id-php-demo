<?php

use Sk\SmartId\Api\AuthenticationResponseValidator;

$app->post( 'validate', function() use ( $app, $client )
{
  $tmpUser = $app['session']->get( 'tmp_user' );
  $countryCode = $tmpUser['country_code'];
  $nationalIdentityNumber = $tmpUser['national_identity_number'];
  /** @var \Sk\SmartId\Api\Data\AuthenticationHash $authenticationHash */
  $authenticationHash = $app['session']->get( 'authenticationHash' );

  if ( null === $app['session']->get( 'sign_in_in_action' ) )
  {
    $app['session']->set( 'sign_in_in_action', true );
    $authenticationResponse = $client->authentication()
        ->createAuthentication()
        ->withNationalIdentityNumber( $nationalIdentityNumber )
        ->withCountryCode( $countryCode )
        ->withDisplayText( 'Log in to Smart-ID demo portal' )
        ->withAuthenticationHash( $authenticationHash )
        ->authenticate();

    $authenticationResponseValidator = new AuthenticationResponseValidator();
    $authenticationResult = $authenticationResponseValidator->validate( $authenticationResponse );
    $authenticationIdentity = $authenticationResult->getAuthenticationIdentity();
    $app['session']->remove( 'tmp_user' );
    $app['session']->remove( 'authenticationHash' );
    $app['session']->remove( 'sign_in_in_action' );
    $app['session']->set( 'user', $authenticationIdentity );

    $response = array(
        'data' => array(
            'isSignedIn'   => true,
            'firstName'    => $authenticationIdentity->getGivenName(),
            'lastName'     => $authenticationIdentity->getSurName(),
            'personalCode' => $authenticationIdentity->getIdentityCode()
        )
    );
    return $app->json( array_merge( $response, array( 'status' => 'SUCCESS' ) ) );
  }

  if ( !isset( $response ) )
  {
    $response = array(
        'data' => array(
            'isRequestingValidation' => true
        )
    );
  }

  return $app->json( array_merge( $response, array( 'status' => 'SUCCESS' ) ) );
} );