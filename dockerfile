FROM php:8.2-apache

# Cài các extension PHP cần thiết
RUN apt-get update && \
    apt-get install -y libzip-dev unzip git libpng-dev libonig-dev && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy toàn bộ project vào /var/www/html
COPY src/ /var/www/html/

# Đặt quyền cho Apache
RUN chown -R www-data:www-data /var/www/html

# Thiết lập trang login.php làm mặc định khi truy cập root
RUN echo "DirectoryIndex webapp/login/dangnhap.php" >> /etc/apache2/apache2.conf

WORKDIR /var/www/html

CMD ["apache2-foreground"]

