# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install ekstensi yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy semua file project ke container
WORKDIR /var/www/html
COPY . .

# Jalankan composer install
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Aktifkan mod_rewrite untuk Laravel
RUN a2enmod rewrite

# Set permission agar Laravel bisa menulis ke storage & bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80
