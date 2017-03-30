<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/app.php';
require_once __DIR__ . '/error-management.php';

require_once __DIR__ . '/auth/is-signed-in-action.php';
require_once __DIR__ . '/auth/sign-in-action.php';
require_once __DIR__ . '/auth/validate-action.php';
require_once __DIR__ . '/auth/sign-out-action.php';

$app->run();