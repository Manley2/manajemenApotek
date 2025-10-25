# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install dependencies sistem & ekstensi PHP yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip curl \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer (dari image composer resmi)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy semua file project ke container
COPY . .

# Jalankan composer install untuk menginstall dependency Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Aktifkan mod_rewrite (penting untuk routing Laravel)
RUN a2enmod rewrite

# Ubah konfigurasi Apache agar document root mengarah ke /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Beri permission agar Laravel bisa menulis ke folder storage & cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 untuk HTTP
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
