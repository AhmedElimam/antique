#!/bin/bash

# Get the current user
CURRENT_USER=$(whoami)

# Set proper ownership
chown -R $CURRENT_USER:nobody .

# Set proper permissions for directories
find . -type d -exec chmod 755 {} \;

# Set proper permissions for files
find . -type f -exec chmod 644 {} \;

# Make storage and cache directories writable
chmod -R 775 storage bootstrap/cache
chown -R $CURRENT_USER:nobody storage bootstrap/cache

# Make sure the storage link exists
php artisan storage:link

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

echo "Permissions have been set for CentOS Web Panel" 