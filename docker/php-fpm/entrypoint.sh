#!/bin/sh

# Set permissions for Laravel storage and cache
chmod -R 755 /var/www/html/storage
chmod -R 755 /var/www/html/bootstrap/cache

exec apache2-foreground
