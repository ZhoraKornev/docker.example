#!/usr/bin/env bash

chmod +x artisan

composer install --no-progress --prefer-dist --working-dir=/app

sleep 10

exec php-fpm --nodaemonize
