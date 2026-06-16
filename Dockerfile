# Use the official production-ready FrankenPHP image
FROM dunglas/frankenphp:1-php8.2

# 1. Install system dependencies required for MongoDB & Laravel
RUN apt-get update && apt-get install -y \
    libnss3-tools \
    openssl \
    libssl-dev \
    libcurl4-openssl-dev \
    pkg-config \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# 2. Install and enable the PHP MongoDB extension via PECL
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# 3. Install core PHP extensions for Laravel (OPcache for speed)
RUN docker-php-ext-install pcntl opcache

# 4. Set the working directory inside the container
WORKDIR /app

# 5. Copy the application code into the container
COPY . /app

# 6. Install Composer and run production optimization (Bypassing strict local platform locks)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# 7. Set correct folder permissions for Laravel
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache

# 8. Expose the port Render expects
EXPOSE 80

# 9. Start FrankenPHP server pointing to Laravel's public entrypoint
CMD ["frankenphp", "php-server", "--public-url", "http://localhost", "--root", "/app/public"]