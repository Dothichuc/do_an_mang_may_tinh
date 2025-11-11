# Dockerfile: PHP + Apache, với mysqli & pdo_mysql
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy toàn bộ source code web vào đúng vị trí (root)
COPY src/webapp/ /var/www/html/

# Copy index.php ra DocumentRoot để Apache load trang chủ
COPY src/webapp/login/index.php /var/www/html/index.php

# Cài đặt PHP extensions và package cần thiết
RUN apt-get update \
    && apt-get install -y --no-install-recommends libzip-dev unzip git libpng-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Phân quyền
RUN chown -R www-data:www-data /var/www/html

# Expose port
EXPOSE 80

