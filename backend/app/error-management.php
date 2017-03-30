<?php

use Sk\SmartId\Exception\SmartIdException;

require_once __DIR__ . '/Exception/UserNotFoundException.php';

$app->error( function( Exception $e ) use ( $app )
{
  $app['session']->clear();

  $error = array(
      'status' => 'ERROR',
      'error'  => 'USER_NOT_FOUND',
      'data'   => new stdClass()
  );

  if ( $e instanceof UserNotFoundException )
  {
    return $app->json( $error );
  }
  elseif ( $e instanceof SmartIdException )
  {
    $error['data'] = $e->getTrace();
    $error['error'] = get_class( $e );
    return $app->json( $error );
  }

  return $app->json( array(
      'message'    => 'Undetermined error!',
      'stacktrace' => $e->getTrace()
  ) );
} );