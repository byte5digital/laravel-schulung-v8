FROM composer:2 as vendor

COPY database/ database/
COPY packages/ packages/

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

FROM php:8-fpm-alpine3.13 as php-prod
RUN apk add php8-pecl-redis
RUN docker-php-ext-install mysqli pdo_mysql pcntl
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY php.ini /usr/local/etc/php/php.ini
COPY . /var/www/html
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
WORKDIR /var/www/html
RUN cp .env.example .env

FROM php-prod as php-debug
RUN apk add php8-pecl-xdebug

FROM httpd:2.4-alpine as web-apache
COPY . /var/www/html
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
COPY 000-default.conf /usr/local/apache2/conf/test.apache.conf
RUN echo "Include /usr/local/apache2/conf/test.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
WORKDIR /var/www/html
