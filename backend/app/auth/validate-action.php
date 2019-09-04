<?php

use Sk\SmartId\Api\AuthenticationResponseValidator;

$app->post( 'validate', function() use ( $app, $client )
{
  /** @var \Sk\SmartId\Api\Data\AuthenticationHash $authenticationHash */
  $authenticationHash = $app['session']->get( 'authenticationHash' );
  $sessionId = $app['session']->get( 'sessionId' );

  $authenticationResponse = $client->authentication()
      ->createSessionStatusFetcher()
      ->withSessionId( $sessionId )
      ->withAuthenticationHash( $authenticationHash )
      ->getAuthenticationResponse();

  if ($authenticationResponse->isRunningState())
  {
    $response = array(
        'data' => array(
            'isRequestingValidation' => true
        )
    );
  }
  else
  {
      $authenticationResponseValidator = new AuthenticationResponseValidator();
      $authenticationResult = $authenticationResponseValidator->validate( $authenticationResponse );
      $isValidResult = $authenticationResult->isValid();
      $authenticationIdentity = $authenticationResult->getAuthenticationIdentity();
      $app['session']->set( 'user', $authenticationIdentity );

      $response = array(
          'data' => ($isValidResult) ? array(
              'isSignedIn'   => true,
              'firstName'    => $authenticationIdentity->getGivenName(),
              'lastName'     => $authenticationIdentity->getSurName(),
              'personalCode' => $authenticationIdentity->getIdentityCode()
          ) :
          array(
              'isSignedIn'  => false,
              'errors' => $authenticationResult->getErrors(),
              )
          );
  }


  return $app->json(array_merge($response, array( 'status' => (($isValidResult) ? 'SUCCESS' : 'ERROR')) ), $isValidResult ? 200 : 401);
} );
