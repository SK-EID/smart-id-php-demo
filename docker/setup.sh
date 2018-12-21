#!/bin/sh

if [ ! -d '/app/bower_components' ]; then
  NODE_VERSION="7.6.0"
  GIT_USERNAME="SK-EID" # add your own username here if you have forked the original repository
  GIT_BRANCH="master"

  cd /app
  git clone -b "$GIT_BRANCH" "https://github.com/$GIT_USERNAME/smart-id-php-demo.git" .
  cd backend
  curl -sS https://getcomposer.org/installer | php
  php composer.phar install

  # Setup demo app frontend
  cd /app
  npm install -g bower
  bower install --allow-root
fi

exec /opt/docker/bin/entrypoint.sh supervisord