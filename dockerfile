FROM php:8.2-apache

WORKDIR /var/www/html

# Copy toàn bộ source code web vào container
COPY src/webapp/ /var/www/html/

# Cài đặt PHP extensions và package cần thiết
RUN apt-get update \
    && apt-get install -y --no-install-recommends libzip-dev unzip git libpng-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Phân quyền cho Apache
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
# Chỉnh DocumentRoot của Apache
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/login|' /etc/apache2/sites-available/000-default.conf \
    && echo 'ServerName localhost' >> /etc/apache2/apache2.conf

