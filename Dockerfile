FROM php:7.4-apache

WORKDIR /project

RUN docker-php-ext-install mysqli