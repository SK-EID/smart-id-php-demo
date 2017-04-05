#!/bin/sh

if [ ! -d '/app/bower_components' ]; then
  NODE_VERSION="7.6.0"

  # Install node
  curl -SLO "https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.xz"
  tar -xJf "node-v$NODE_VERSION-linux-x64.tar.xz" -C /usr/local --strip-components=1
  rm "node-v$NODE_VERSION-linux-x64.tar.xz"
  ln -s /usr/local/bin/node /usr/local/bin/nodejs

  # Setup demo app backend
  cd /app
  git init
  git remote add origin https://github.com/SK-EID/smart-id-php-demo.git
  git fetch --all
  git checkout HEAD^
  git checkout -f master
  cd backend
  curl -sS https://getcomposer.org/installer | php
  php composer.phar install

  # Setup demo app frontend
  cd /app
  npm install -g bower
  bower install --allow-root
fi

exec /opt/docker/bin/entrypoint.sh supervisord