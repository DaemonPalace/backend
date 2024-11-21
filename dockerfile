# Start with a PHP-FPM base image
FROM php:8.2-fpm

# Install dependencies for Nginx, Composer, and PHP extensions for Laravel
RUN apt-get update && apt-get install -y \
    nginx \
    curl \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    && rm -rf /var/lib/apt/lists/*

# Install required PHP extensions for Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql xml

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www/html (Laravel's default directory)
WORKDIR /var/www/html

# Copy the Laravel project into the container
COPY . .

# Set permissions on Laravel's storage and bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose necessary ports (HTTP and PHP-FPM)
EXPOSE 80 9000

# Copy Nginx configuration
COPY nginx/default.conf /etc/nginx/sites-available/default

# Start both Nginx and PHP-FPM
CMD service nginx start && php-fpm
