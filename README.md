# 2020 fwdays Domain-driven Design Workshop

If you want to follow along on your own computer and IDE I would suggest doing the following before the presentation:
* Install a recent version of Docker and Docker Compose [https://www.docker.com/products/docker](https://www.docker.com/products/docker)
* Clone this repo
````
git clone git@github.com:cassell/2020-fwdays-ddd-workshop.git
````
* If you are on Linux or Mac run "make beer" and that will build the project, otherwise you can use docker compose (Windows users may have the change the slashes in the folder path):
* I will likely not have time to help troubleshoot your setup during the presentation.
* I would suggest pulling changes again right before the workshop as I might have changed something last minute
* BYOIDE - Use the code editor that you are most comfortable with. 
* No web server required. Code will be all backend code.

However, you will be fine without any preparation for this workshop.

````
make beer
````
or
````
docker-compose build
docker-compose up -d
docker-compose run --rm --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app mariadb  mysql --host=mariadb --user=root --password=password --batch -e "drop database if exists beeriously; create database beeriously;"
docker-compose run --rm --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app beeriously-php-fpm composer install
docker-compose run --rm --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app beeriously-php-fpm /app/bin/console doctrine:migrations:migrate --no-interaction -v
````

If you can then run and only see that tests are failing then you are good to go:
````
make unit
make integration
````
or
````
docker-compose run --rm --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app beeriously-php-fpm /app/vendor/bin/phpunit --configuration /app/src/Tests/Unit/phpunit.xml.dist
docker-compose run --rm --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app beeriously-php-fpm /app/vendor/bin/phpunit --configuration /app/src/Tests/Integration/phpunit.xml.dist
````


