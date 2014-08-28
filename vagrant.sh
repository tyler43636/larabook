#!/bin/sh
mysql --user=root --password=root --execute="CREATE DATABASE IF NOT EXISTS larabook; \
    GRANT ALL ON *.* TO 'larabook'@'localhost' IDENTIFIED BY 'larabook'; \
    FLUSH PRIVILEGES;"

cd /vagrant/
# Install composer dependencies
composer install
# Install NPM dependencies
npm install
# migrate and seed database
php artisan migrate --seed
# compile css
gulp css
