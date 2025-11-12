# Dockerfile: PHP + Apache, mysqli & pdo_mysql
FROM php:8.2-apache

WORKDIR /var/www/html

# Copy toàn bộ webapp vào container
COPY src/webapp/ /var/www/html/webapp/

# Cài đặt PHP extensions và package cần thiết
RUN apt-get update \
    && apt-get install -y --no-install-recommends libzip-dev unzip git libpng-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Phân quyền cho Apache
RUN chown -R www-data:www-data /var/www/html

# Expose port
EXPOSE 80

