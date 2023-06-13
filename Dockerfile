FROM php:latest

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
