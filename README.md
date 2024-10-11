
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
Go to your cloned repo and call:

```bash
docker compose up --build  
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

