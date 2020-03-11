#!/usr/bin/env bash

chmod +x artisan

composer install --no-progress --prefer-dist --working-dir=/app

sleep 10

php artisan key:generate
php artisan migrate --no-interaction
php artisan locotrade:translates --no-interaction
sleep 2
php artisan db:seed
sleep 2

php artisan key:generate --env=testing
sleep 10
php artisan migrate  --env=testing --no-interaction
sleep 5
php artisan locotrade:translates --env=testing --no-interaction
sleep 2
php artisan db:seed --env=testing
sleep 2

exec php-fpm --nodaemonize
