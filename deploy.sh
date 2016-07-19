#!/bin/bash

bold=$(tput bold)
normal=$(tput sgr0)
green=$(tput setaf 2)
red=$(tput setaf 1)
yellow=$(tput setaf 3)
dim=$(tput dim)

echo "${green}"
echo "Shutdown composer"

docker-compose down

echo "Pull latest images"

docker images
docker pull dionsnoeijen/blog:latest
docker pull dionsnoeijen/php_fpm:latest
docker pull composer/composer:1.0-alpine
docker images

echo "Start containers"

docker-compose up

echo "Run composer"

cd docker/blog/app
docker run --rm -v $(pwd):/app composer/composer install

echo "YEAH! UP AND RUNNING"
