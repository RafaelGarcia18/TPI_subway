FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
&& docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www

#RUN chmod -R 777 /var/www/storage