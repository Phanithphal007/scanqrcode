FROM richarvey/nginx-php-fpm:3.1.6

# Copy your Laravel project
COPY . /var/www/html

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Environment settings
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV APP_ENV=production
ENV APP_DEBUG=false

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Laravel caching
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Create storage link
RUN php artisan storage:link

# Start command
CMD ["/start.sh"]
