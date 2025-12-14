FROM php:8.2-apache

# Bật Apache rewrite
RUN a2enmod rewrite

# Cài driver PDO PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copy source code
COPY . /var/www/html/

# Set quyền
RUN chown -R www-data:www-data /var/www/html