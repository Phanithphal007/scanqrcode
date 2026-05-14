#!/bin/bash

echo "🚀 Starting Laravel on Render..."

# Run migrations
php artisan migrate --force

# Cache configs
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Fix PHP-FPM pool configuration to suppress the warning
echo "Fixing PHP-FPM configuration..."
cat > /usr/local/etc/php-fpm.d/www.conf << EOF
[www]
user = www-data
group = www-data
listen = /var/run/php/php8.2-fpm.sock
listen.owner = www-data
listen.group = www-data
listen.mode = 0660
pm = dynamic
pm.max_children = 5
pm.start_servers = 2
pm.min_spare_servers = 1
pm.max_spare_servers = 3
EOF

# Start services
php-fpm -D
nginx -g 'daemon off;'
