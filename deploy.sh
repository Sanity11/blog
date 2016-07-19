#!/bin/bash

bold=$(tput bold)
normal=$(tput sgr0)
green=$(tput setaf 2)

echo "${green}"
echo "Shutdown composer"
echo "${normal}"

docker-compose down

echo "${green}"
echo "Pull latest images"
echo "${normal}"

docker images
docker pull dionsnoeijen/blog:latest
docker pull dionsnoeijen/php_fpm:latest
docker pull composer/composer:1.0-alpine
docker images

echo "${green}"
echo "Run composer"
echo "${normal}"

cd docker/blog/app
docker run --rm -v $(pwd):/app composer/composer install

echo "${green}"
echo "Start containers"
echo "${normal}"

docker-compose up -d

echo "${bold}"
echo "YEAH! UP AND RUNNING"
