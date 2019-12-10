#!/usr/bin/env sh

if [ ! -d '/app/backend/vendor' ]; then
  cd /app
  cd backend
  curl -sS https://getcomposer.org/installer | php
  php composer.phar install
  cd /../..
fi

if [ ! -d '/app/bower_components' ]; then
  NODE_VERSION="7.6.0"

  # Setup demo app frontend
  cd /app
  npm install -g bower
  bower install --allow-root
fi

exec /opt/docker/bin/entrypoint.sh supervisord