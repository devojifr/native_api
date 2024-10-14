
# Native API

This project is built from the following stack:
- A docker compose file with php:7.4.28-fpm-alpine3.14
    - web container with Xdebug 3
    - mysql:5.7 container
    - phpmyadmin container
    - nginx container with a nginx.conf

composer is used to manage dependencies.


## Installation

Clone the repo.
Then, go to your cloned repo and call:

```bash
docker compose up --build  
```

Now, you can access to project with the following url:
```bash
http://localhost:8081
```

## Access PhpMyAdmin (PMA)
To access to your database, PMA has been installed:
```bash
http://localhost:8082
```
You can log in with these credentials:
```bash
user: user
password: user
```

## Running Tests
First, connect to your web container:

```bash
docker exec -it php_web sh
```

To run tests, run the following command:

```bash
  ./vendor/bin/phpunit tests/
```

## Swagger
You can see available API endpoints with Swagger UI:
```bash
http://localhost:8081/swagger
```

