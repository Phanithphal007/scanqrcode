#!/bin/bash

# Run migrations
php artisan migrate --force

# Clear and cache configs
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start PHP-FPM and Nginx
php-fpm -D
nginx -g 'daemon off;'
