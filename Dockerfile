# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install ekstensi yang dibutuhkan Laravel
<<<<<<< HEAD
RUN docker-php-ext-install pdo pdo_mysql

# Copy semua file project ke container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html
=======
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
>>>>>>> 58e6e0856c534c18660f50251073092e46e5918b

# Aktifkan mod_rewrite untuk Laravel
RUN a2enmod rewrite

<<<<<<< HEAD
# Set Apache DocumentRoot ke folder public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

=======
>>>>>>> 58e6e0856c534c18660f50251073092e46e5918b
# Set permission agar Laravel bisa menulis ke storage & bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80
