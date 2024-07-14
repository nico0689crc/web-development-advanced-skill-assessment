#!/bin/sh
php artisan key:generate

# Run Laravel migrations
php artisan migrate --force

# Run Laravel seeders
php artisan db:seed --force

# Start the PHP-FPM server
# By default containers start in bridge network, inside which the host available by the address 0.0.0.0.
php artisan serve --port=3000 --host=0.0.0.0
