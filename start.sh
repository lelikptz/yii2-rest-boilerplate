#!/usr/bin/env bash
docker-compose up -d
chmod 755 ./init
if [[ "$1" == "prod" ]]
then
docker exec -w /var/www/html rest-container sh -c "composer install --no-dev && ./init --env=Production --overwrite=All && ./yii migrate"
else
docker exec -w /var/www/html rest-container sh -c "composer install && ./init --env=Development --overwrite=All && ./yii migrate"
fi
