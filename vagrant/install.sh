#!/bin/bash

# Setup database
echo 'Setting up Databases'

MYSQL=`which mysql`
Q1="CREATE DATABASE IF NOT EXISTS larabook;"
Q2="CREATE DATABASE IF NOT EXISTS larabook_testing;"
Q3="GRANT ALL ON *.* TO 'larabook'@'localhost' IDENTIFIED BY 'larabook';"
Q4="FLUSH PRIVILEGES;"
SQL="${Q1}${Q2}${Q3}${Q4}"
$MYSQL -uhomestead -psecret -e "$SQL"

# Setup project
echo 'Installing Composer dependencies'
cd /vagrant
composer install --dev
echo 'Migrating Database'
php artisan migrate --seed --env=local
php artisan migrate --env=testing
echo 'Install NPM dependencies'
npm install
echo 'Compiling CSS'
gulp css
