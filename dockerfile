FROM php:8.2-apache

# Copy source code web
COPY src/ /var/www/html/

# Cài PHP extension nếu cần
RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 80

