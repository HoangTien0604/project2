FROM php:8.2-apache

# Bật rewrite
RUN a2enmod rewrite

# Copy source code vào Apache web root
COPY . /var/www/html/

# Set quyền để tránh lỗi permission
RUN chown -R www-data:www-data /var/www/html