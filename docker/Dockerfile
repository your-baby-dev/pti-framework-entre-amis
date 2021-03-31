FROM php:8.0-apache

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install -j$(nproc) pdo_mysql

RUN a2enmod rewrite

WORKDIR /app

COPY . /app

RUN chown -R www-data:www-data /app
