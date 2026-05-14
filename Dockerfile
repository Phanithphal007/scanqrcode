FROM richarvey/nginx-php-fpm:3.1.6

COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV APP_ENV=production
ENV APP_DEBUG=false

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan storage:link

# Important: Use the built-in start command
CMD ["/start.sh"]
