#!/bin/sh

# Run Laravel migrations
php artisan migrate --force

# Run Laravel seeders
php artisan db:seed

# Start the PHP-FPM server
php-fpm
