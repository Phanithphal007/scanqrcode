FROM richarvey/nginx-php-fpm:8.2

# Copy project
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Environment
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV APP_ENV=production
ENV APP_DEBUG=false

# Install dependencies and optimize
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Laravel optimizations
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link

# Run migrations on startup (safer)
CMD ["sh", "-c", "php artisan migrate --force && /start.sh"]
