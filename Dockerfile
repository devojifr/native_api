FROM php:7.4.28-fpm-alpine3.14

RUN apk update
RUN apk add busybox-extras redis --update tzdata

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install xdebug
RUN apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
  && pecl install xdebug-3.1.6 \
  && docker-php-ext-enable xdebug \
  && apk del .phpize-deps

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-enable mysqli

# Add Composer to the PATH
ENV PATH="$PATH:/usr/local/bin"

# Change TimeZone
ENV TZ=Europe/Paris