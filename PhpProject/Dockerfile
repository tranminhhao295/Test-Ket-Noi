FROM php:8.0-apache
# Cài đặt extension để PHP kết nối được với MySQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY . /var/www/html/