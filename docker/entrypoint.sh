#!/bin/bash

# Exit on error
set -e

echo "Starting Laravel application setup..."

# Check if vendor directory exists, if not run composer install
if [ ! -d "vendor" ]; then
    echo "Installing composer dependencies..."
    composer install --no-interaction --prefer-dist
fi

# Check if .env file exists, if not copy from .env.example
if [ ! -f ".env" ]; then
    echo "Creating .env file..."
    cp .env.example .env
fi

# Generate application key if not set
if ! grep -q "APP_KEY=base64:" .env; then
    echo "Generating application key..."
    php artisan key:generate
fi

# Set proper permissions
echo "Setting permissions..."
chown -R www-data:www-data /var/www/html
chmod -R 775 storage bootstrap/cache

echo "Setup complete! Starting PHP-FPM..."

# Execute the main container command
exec "$@"
