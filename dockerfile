# Dockerfile: PHP + Apache, với mysqli & pdo_mysql
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy toàn bộ source code web vào container
COPY src/webapp/ /var/www/html/

# Cài đặt các package cần thiết và PHP extensions
RUN apt-get update \
  && apt-get install -y --no-install-recommends libzip-dev unzip git libpng-dev \
  && docker-php-ext-install mysqli pdo pdo_mysql \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

# Đặt quyền cho web server user
RUN chown -R www-data:www-data /var/www/html

# Mở port 80
EXPOSE 80

