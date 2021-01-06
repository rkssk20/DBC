FROM php:7-apache
COPY ./app /var/www/html
RUN apt-get update
RUN docker-php-ext-install pdo_mysql
