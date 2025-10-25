# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install ekstensi yang dibutuhkan Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Copy semua file project ke container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Aktifkan mod_rewrite untuk Laravel
RUN a2enmod rewrite

# Set Apache DocumentRoot ke folder public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Set permission agar Laravel bisa menulis ke storage & bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80
