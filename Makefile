default: beer

RUN_COMMAND_ON_PHP = docker-compose run --rm --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app beeriously-php-fpm

beer: down build up install sleepForDatabase clean-database run-migrations cache-clear

down:
	docker-compose down	

build:
	docker-compose build

up:
	docker-compose up -d

install:
	$(RUN_COMMAND_ON_PHP) composer install

update:
	$(RUN_COMMAND_ON_PHP) composer update

unit:
	$(RUN_COMMAND_ON_PHP) /app/vendor/bin/phpunit --configuration /app/tests/Unit/phpunit.xml.dist

integration:
	$(RUN_COMMAND_ON_PHP) /app/vendor/bin/phpunit --configuration /app/tests/Integration/phpunit.xml.dist

bash:
	$(RUN_COMMAND_ON_PHP) bash

chrome:
	open -a "Google Chrome" http://localhost:62337/

sleepForDatabase:
	@echo "Sleeping while MariaDB loads. I didn't want to cause more Docker problems by using healthcheck :)"
	sleep 30

clean-database:
	docker-compose run --rm --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app mariadb  mysql --host=mariadb --user=root --password=password --batch -e "drop database if exists beeriously; create database beeriously;"

run-migrations:
	$(RUN_COMMAND_ON_PHP) /app/bin/console doctrine:migrations:migrate --no-interaction -v

refresh-db: clean-database run-migrations

cache-clear:
	$(RUN_COMMAND_ON_PHP) /app/vendor/bin cache:clear