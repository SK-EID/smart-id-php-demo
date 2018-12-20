Smart-ID Relying Party PHP Api Demo
------------------

This application illustrates how to implement logging in with Smart-ID on a PHP based app.

Setup
------------
Demo has an easy [Docker](https://www.docker.com/what-docker) setup. You don't even need to download/export repository yourself.

1. Install Docker
2. Either clone the repo or only copy `docker-compose.yml` and `docker` directory from repository to local directory
3. If you want to run a forked repo then add your git username into variable GIT_USERNAME in docker/setup.sh
3. Open command-line in that directory and run following command:
  * `docker-compose build --force-rm`
  * `docker-compose up`

After that you should have demo application available at [http://localhost:32080](http://localhost:32080).

You can now log in with test accounts listed here:
https://github.com/SK-EID/smart-id-documentation/wiki/Environment-technical-parameters#accounts