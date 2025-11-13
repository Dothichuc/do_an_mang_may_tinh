FROM php:8.2-apache

WORKDIR /var/www/html

# Copy toàn bộ source code web vào container
COPY src/webapp /var/www/html/webapp

# Cài đặt PHP extensions và package cần thiết
RUN apt-get update \
    && apt-get install -y --no-install-recommends libzip-dev unzip git libpng-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Phân quyền cho Apache
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

#  Giữ DocumentRoot mặc định /var/www/html
#    nhưng cấu hình thêm alias để webapp chạy đúng thư mục
RUN echo '<Directory /var/www/html/webapp>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' >> /etc/apache2/apache2.conf \
    && echo 'ServerName localhost' >> /etc/apache2/apache2.conf

