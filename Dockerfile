FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html
COPY setup-database.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/setup-database.sh
RUN /usr/local/bin/setup-database.sh

EXPOSE 80
