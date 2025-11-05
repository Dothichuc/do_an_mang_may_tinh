# Dockerfile: PHP + Apache, with mysqli & pdo_mysql
FROM php:8.2-apache

WORKDIR /var/www/html

# Copy source code
COPY src/ /var/www/html/

# Install required packages and PHP extensions
RUN apt-get update \
  && apt-get install -y --no-install-recommends libzip-dev unzip git libpng-dev libonig-dev \
  && docker-php-ext-install mysqli pdo pdo_mysql \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

# Set permissions for web server user
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]

