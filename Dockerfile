# Use the official PHP 8.2 Apache production image
FROM php:8.2-apache

# 1. Install system dependencies required for MongoDB & Laravel
RUN apt-get update && apt-get install -y \
    openssl \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    && rm -rf /var/lib/apt/lists/*

# 2. Configure and install extensions (including GD with JPEG support)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Configure Apache to point to Laravel's /public directory
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Enable Apache mod_rewrite for Laravel routes
RUN a2enmod rewrite

# 5. Set working directory and copy your project files
WORKDIR /var/www/html
COPY . /var/www/html

# 6. Install Composer and run production optimization
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# 7. Create missing public folders and set correct storage permissions
RUN mkdir -p /var/www/html/public/images
RUN php artisan storage:link --force
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/images
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/images

# 8. Render injects the PORT dynamically. Configure Apache to listen to it.
RUN sed -i 's/Listen 80/Listen ${PORT}/g' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/g' /etc/apache2/sites-available/000-default.conf

# 9. Expose the port and start Apache
EXPOSE 80
CMD ["apache2-foreground"]