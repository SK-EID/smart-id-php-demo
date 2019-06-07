Smart-ID Relying Party PHP Api Demo
------------------

This application illustrates how to implement logging in with Smart-ID on a PHP based app.
**This PHP Demo cannot be used to create digitally signed containers as there no library like DigiDoc4J exists for PHP.**

Setup
------------
Demo has an easy [Docker](https://www.docker.com/what-docker) setup.


1. Install Docker
2. Clone the whole repo to a local directory
4. Open command-line in that directory and run following command:
  
   `docker-compose up --build`

Once the script completes the install (takes several minutes) you should have demo application available at [http://localhost:32080](http://localhost:32080).
Keep the browser's Developer's console Network tab open to the requests arriving from back-end.
If you change app files then hit CTRL+SHIFT+F5 (CMD+SHIFT+F5 for MAC) to reload changes in browser (no need to restart/rebuild container).

You can now log in with test accounts listed in 
[smart-id-documentation wiki](https://github.com/SK-EID/smart-id-documentation/wiki/Environment-technical-parameters#accounts).
Keep in mind that the demo application is configured to allow only to log in users who have QUALIFIED certificate level.
To also allow users with ADVANCED (which is weaker than QUALIFIED) certificate level one needs to update backend/app/app.php and set  `'certificate_level'  => 'ADVANCED'`.


