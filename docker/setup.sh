#!/usr/bin/env sh

if [[ ! -d '/app/bower_components' ]]; then
  NODE_VERSION="7.6.0"

  cd /app/backend
  curl -sS https://getcomposer.org/installer | php
  php composer.phar install

  # Setup demo app frontend
  cd /app
  npm install -g bower
  bower install --allow-root
fi

exec /opt/docker/bin/entrypoint.sh supervisord
