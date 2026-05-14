#!/bin/bash

echo "✅ Starting POS System..."

# Final cache (in case)
php artisan config:clear
php artisan cache:clear

echo "🚀 Application is ready!"
exec /start.sh-original   # or just let nginx start
