FROM php:7.4.28-fpm-alpine3.14

RUN apk update
RUN apk add busybox-extras

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add Composer to the PATH
ENV PATH="$PATH:/usr/local/bin"

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-enable xdebug

# Change TimeZone
RUN apk add --update tzdata
ENV TZ=Europe/Paris