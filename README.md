**Smart-ID php demo application**

This application demonstrates how to use the smart-id-php-client in a symfony application to authenticate and authorize users.

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

## Running the application without Docker

### Requirements

- php >= 7.3, including curl, mysql, dom extensions
- [symfony cli tool](https://symfony.com/download)
- mysql server installed

### Database migration
- create database mid_rest_demo
    - `CREATE DATABASE smart_id_demo;`
- create user mid_rest_demo, with password mid_rest_demo
    - `CREATE USER 'smart_id_demo' IDENTIFIED WITH mysql_native_password BY 'smart_id_demo;`
- grant the new user all privileges on the database
    - `GRANT ALL PRIVILEGES ON smart_id_demo.* TO 'smart_id_demo';`
- Run migration scripts

    1. `php bin/console make:migrate`
    1. `php bin/console doctrine:migrations:migrate`

### Configuring the application

- Change the DB url in the .env file to match your sql server

### Running the application
1. run `symfony serve` in the project folder

### Accessing the aplication

Access the application from [localhost:8000/login](localhost:8000/login)