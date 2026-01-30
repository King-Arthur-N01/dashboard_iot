# Gunakan image PHP dengan Apache bawaan
FROM php:8.4-apache

# Install ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Aktifkan mod_rewrite untuk Laravel
RUN a2enmod rewrite
RUN php artisan storage:link || true

COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Salin project Laravel ke dalam container
COPY . /var/www/html

WORKDIR /var/www/html

# Beri izin pada storage dan cache Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Copy composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Jalankan composer install
RUN composer install --no-dev --optimize-autoloader

# Expose port Apache
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
