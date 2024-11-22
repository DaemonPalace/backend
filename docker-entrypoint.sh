#!/bin/bash
set -e

# If APP_KEY doesn't exist in .env, generate it
if ! grep -q "^APP_KEY=" .env; then
    php artisan key:generate
fi

# Set environment variables from Render
if [ ! -z "$APP_KEY" ]; then
    sed -i "s|APP_KEY=.*|APP_KEY=$APP_KEY|g" .env
fi

if [ ! -z "$DB_CONNECTION" ]; then
    sed -i "s|DB_CONNECTION=.*|DB_CONNECTION=$DB_CONNECTION|g" .env
fi

if [ ! -z "$DB_HOST" ]; then
    sed -i "s|DB_HOST=.*|DB_HOST=$DB_HOST|g" .env
fi

if [ ! -z "$DB_PORT" ]; then
    sed -i "s|DB_PORT=.*|DB_PORT=$DB_PORT|g" .env
fi

if [ ! -z "$DB_DATABASE" ]; then
    sed -i "s|DB_DATABASE=.*|DB_DATABASE=$DB_DATABASE|g" .env
fi

if [ ! -z "$DB_USERNAME" ]; then
    sed -i "s|DB_USERNAME=.*|DB_USERNAME=$DB_USERNAME|g" .env
fi

if [ ! -z "$DB_PASSWORD" ]; then
    sed -i "s|DB_PASSWORD=.*|DB_PASSWORD=$DB_PASSWORD|g" .env
fi

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
php-fpm -D

# Start Nginx
nginx -g 'daemon off;'