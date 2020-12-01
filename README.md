**Smart-ID php demo application**

This application demonstrates how to use the smart-id-php-client in a symfony application to authenticate and authorize users.

## Building and running with Docker

### Requirements

You must have Docker installed in order to use the application

### Building the image

This step needs to be run only on the initial build of the application

First build the docker image, by issuing the next command in the application folder

`docker build -t smart-id-php-demo:1.0 ./`

### Running the Docker Image

For running the previously built image issue the following command

`docker run -p 8001:8000 --env-file docker.env -it smart-id-php-demo:1.0`

The application should start up in about 30 seconds

### Accessing the application

For accessing the application go to the following url in your browser

[http://localhost:8001/login](http://localhost:8001/login)

Now you can try to log in to the application

## Running the application without Docker

### Requirements

- php >= 7.3, including curl, mysql, dom extensions
- [symfony cli tool](https://symfony.com/download)
- mysql server installed

    (or run it from Docker: `docker run -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 mysql:latest`)

### Database migration
- create database mid_rest_demo
    - `CREATE DATABASE smart_id_demo;`
- create user mid_rest_demo, with password mid_rest_demo
    - `CREATE USER 'smart_id_demo' IDENTIFIED WITH mysql_native_password BY 'smart_id_demo';`
- grant the new user all privileges on the database
    - `GRANT ALL PRIVILEGES ON smart_id_demo.* TO 'smart_id_demo';`
- Run migration script

    `php bin/console --no-interaction doctrine:migrations:migrate`

### Configuring the application

- You might need to change the server name in DATABASE_URL constant in the .env file to match your sql server host

### Running the application
Start Symfony in the project folder.
Depending on how you installed it there can be different options for it.

If you have Symfony installed locally into your home directory then run it from there:

`~/.symfony/bin/symfony serve`

Or if you have installed it globally (or added it into your path) you can run it like this:

`symfony serve` 


### Accessing the application

Access the application from [localhost:8000](http://localhost:8000)
Now you can try to log in to the application using test numbers.