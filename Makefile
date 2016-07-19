# Spaces instead of tabs
.RECIPEPREFIX +=

.DEFAULT_GOAL := all

SHELL=/bin/bash

CONTAINER_TAG=dionsnoeijen/blog:latest
CONTAINER_TAG=dionsnoeijen/php_fpm:latest

all: build_container_image

build_container_image:
    docker-compose build