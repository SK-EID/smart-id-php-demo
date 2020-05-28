**Smart-ID php demo application**

## Requirements

You must have docker installed in order to use the application

## Building the image

This step needs to be runned only on the initial build of the application

First build the docker image, by issuing the next command in the application folder

`docker build -t smart-id-php-demo:1.0 ./`

## Running the application

For running the previously built image issue the following command

`docker run -p 8001:8000 --env-file docker.env -it smart-id-php-demo:1.0`

The application should start up in about 30 seconds

## Accessing the application

For accessing the application go to the following url in your browser

[http://localhost:8001/login](http://localhost:8001/login)

Now you can try to log in to the application
