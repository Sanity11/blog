#!/bin/bash

docker-compose down

docker images
docker pull dionsnoeijen/blog:latest
docker pull dionsnoeijen/php_fpm:latest
docker pull composer/composer:1.0-alpine
docker images

cd ../../..
docker-compose up
cd docker/blog/app
docker run --rm -v $(pwd):/app composer/composer install
