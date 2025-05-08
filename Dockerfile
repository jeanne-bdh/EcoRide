# Image PHP avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y libpq-dev libzip-dev unzip \
    && docker-php-ext-install pdo_pgsql mysqli

# MongoDB driver pour PHP
RUN pecl install mongodb \
    && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini

# Active mod_rewrite
RUN a2enmod rewrite

# Copie du code dans le dossier web
COPY public/ /var/www/html/

# Assure-toi que tout est bien accessible
RUN chown -R www-data:www-data /var/www/html
