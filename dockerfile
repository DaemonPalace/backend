# Use an official PHP image
FROM php:8.1-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql && \
    apt-get clean

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Set the working directory
WORKDIR /var/www

# Copy the composer.lock and composer.json files
COPY composer.json composer.lock /var/www/

# Install PHP dependencies (Composer)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-scripts --no-autoloader

# Copy the rest of the application files
COPY . /var/www

# Set appropriate file permissions
RUN chown -R www-data:www-data /var/www

# Run composer dump-autoload
RUN composer dump-autoload --optimize

# Expose port 80
EXPOSE 80

# Start the PHP-FPM server
CMD ["php-fpm"]