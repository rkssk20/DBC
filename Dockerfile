FROM php:7-apache
COPY ./app /var/www/html
RUN apt-get update && apt-get install -y cron && apt-get install -y vim
RUN docker-php-ext-install pdo_mysql

ADD crontab /etc/cron.d/crontab
RUN crontab 0644 /etc/cron.d/crontab