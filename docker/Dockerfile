FROM webdevops/php-apache-dev:ubuntu-15.10

# replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

RUN apt-get install -y curl

# nvm environment variables
ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 7.6.0

# install nvm
RUN curl --silent -o- https://raw.githubusercontent.com/creationix/nvm/v0.31.2/install.sh | bash

# install node and npm
RUN source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default

# add node and npm to path so the commands are available
ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

COPY setup.sh /setup.sh

RUN ["chmod", "+x", "/setup.sh"]

CMD /bin/bash -c /setup.sh
