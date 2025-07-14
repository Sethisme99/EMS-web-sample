#!/bin/bash

echo "Installing Composer dependencies..."
composer install

echo "Copying .env file..."
cp .env.example .env

echo "Generating application key..."
php artisan key:generate

echo "Running migrations..."
php artisan migrate

echo "Clearing config and cache..."
php artisan config:clear
php artisan cache:clear

echo "✅ Laravel setup completed successfully!"
