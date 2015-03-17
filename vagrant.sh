#!/bin/sh
mysql --user=root --password=root --execute="CREATE DATABASE IF NOT EXISTS larabook; \
    GRANT ALL ON *.* TO 'larabook'@'localhost' IDENTIFIED BY 'larabook'; \
    FLUSH PRIVILEGES;"

cd /vagrant/
# Install composer dependencies
#composer install

# Install NPM dependencies
NPM=`which npm`
$NPM install

# migrate and seed database
php artisan migrate --seed

# compile css
GULP=`which gulp`
$GULP css
