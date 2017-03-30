<?php

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