FROM php:7.3-apache
COPY app /var/www/html/
RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
  && docker-php-ext-install pdo_mysql mysqli mbstring gd iconv
RUN curl -sSLO https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64 \
    && chmod +x mhsendmail_linux_amd64 \
    && mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail \
    && echo 'sendmail_path = "/usr/local/bin/mhsendmail --smtp-addr=mailhog:1025"' > /usr/local/etc/php/conf.d/sendmail.ini