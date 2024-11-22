#!/bin/bash
set -e

# Generate Laravel key if not set
php artisan key:generate --force

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM
php-fpm -D

# Start Nginx
nginx -g 'daemon off;'