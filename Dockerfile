FROM webdevops/php-apache-dev:ubuntu-15.10

ENV NODE_VERSION 7.6.0

# Install node
RUN \
	curl -SLO "https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.xz" && \
	tar -xJf "node-v$NODE_VERSION-linux-x64.tar.xz" -C /usr/local --strip-components=1 && \
	rm "node-v$NODE_VERSION-linux-x64.tar.xz" && \
	ln -s /usr/local/bin/node /usr/local/bin/nodejs

# Setup demo app backaend
RUN \
	cd /app && \
	git clone https://github.com/SK-EID/smart-id-php-demo.git . && \
	cd backend && \
	curl -sS https://getcomposer.org/installer | php && \
	php composer.phar install

# Setup demo app frontend
RUN \
	cd /app && \
	npm install -g bower && \
	bower install --allow-root

VOLUME /app

# Required commands for creating docker image and container
# docker build -t sipd .
# docker run --name sipd sipd