Smart-ID Relying Party PHP Api Demo
------------------

This application illustrates how to implement logging in with Smart-ID on a PHP based app.

Setup
------------
Demo has an easy [Docker](https://www.docker.com/what-docker) setup.
You don't need to download/export repository yourself but bare in mind that this approach always clones the app code from Github.
If you want to make changes and see them in effect you have to first push the changes to your own forked repo in Github to have the script clone from there.

1. Install Docker
2. Either clone the whole repo or only copy `docker-compose.yml` and `docker` directory from repository to local directory
3. If you want to run a forked repo then add your git username into variable GIT_USERNAME in docker/setup.sh
3. Open command-line in that directory and run following command:
  * `docker-compose build --force-rm`
  * `docker-compose up`

After that you should have demo application available at [http://localhost:32080](http://localhost:32080).
Have the browser's Developer's console Network tab open to the requests arriving from back-end.

The demo application is configured to allow only to log in users who have ADVANCED certificate level.
To also allow users with QUALIFIED certificate level one needs to update app.php and set  `'certificate_level'  => 'QUALIFIED'`.


You can now log in with test accounts listed in 
[wiki](https://github.com/SK-EID/smart-id-documentation/wiki/Environment-technical-parameters#accounts)