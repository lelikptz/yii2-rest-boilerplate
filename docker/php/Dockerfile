FROM php:7.4-fpm

MAINTAINER Alexey Orlov <alexey@orlov.tech>

RUN apt-get update && apt-get install -y git ssh zip && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD ./php.ini /usr/local/etc/php/conf.d/40-custom.ini
