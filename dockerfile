FROM php:8.2-apache

# Cài các extension cần thiết
RUN apt-get update && \
    apt-get install -y libzip-dev unzip git libpng-dev libonig-dev && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy toàn bộ project vào /var/www/html
COPY . /var/www/html/

# Set quyền
RUN chown -R www-data:www-data /var/www/html

# Nếu bạn muốn Apache mở trực tiếp trang loginadmin.php khi truy cập root
RUN echo "DirectoryIndex loginadmin.php" >> /etc/apache2/apache2.conf

WORKDIR /var/www/html

CMD ["apache2-foreground"]

