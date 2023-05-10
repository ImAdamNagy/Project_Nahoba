#!/bin/sh -e

COMPOSE="docker compose"

if ! $($COMPOSE 2>/dev/null); then
    COMPOSE="docker-compose"
fi

if [ -f ".env" ]; then
    echo ".env fájl már létezik!"
else 
    cp .env.example .env
fi

if [ "$1" ]; then
  MODE=$1
else
  MODE=dev
fi

# shopt -s expand_aliases

$COMPOSE -f docker-compose.yml -f docker-compose.$MODE.yml  up -d
$COMPOSE exec nahoba-app composer install
$COMPOSE exec nahoba-app php artisan key:generate
$COMPOSE exec nahoba-app npm install
$COMPOSE exec nahoba-app php artisan migrate:fresh --seed
