#!/bin/bash

# Exit immediately if a command exits with a non-zero status
set -e

# If the .env file does not exist, copy the .env.example
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Run composer install if vendor folder does not exist
if [ ! -d "vendor" ]; then
    composer install
fi

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate --force

# Start PHP-FPM
php-fpm
