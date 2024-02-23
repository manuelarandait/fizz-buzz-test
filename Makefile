#!/bin/bash

start: ## Start the containers
	docker-compose up -d

stop: ## Stop the containers
	docker-compose stop

restart: ## Restart the containers
	$(MAKE) stop && $(MAKE) start

build: ## Rebuilds all the containers
	docker-compose build

prepare: ## Exec composer install
	composer install

create-database: ## Migrate database
	docker exec -it fizz-buzz-php-symfony symfony console doctrine:database:create

migrate: ## Migrate database
	docker exec fizz-buzz-php-symfony symfony console doctrine:migrations:migrate

create-database-test: ## Create test database, and migrate
	docker exec fizz-buzz-php-symfony symfony console doctrine:database:create --env=test
	docker exec fizz-buzz-php-symfony symfony console doctrine:migrations:migrate --env=test

test: ## Runs test
	docker exec fizz-buzz-php-symfony php bin/phpunit

run: ## starts the Symfony development server
	docker exec -it fizz-buzz-php-symfony symfony serve -d

ssh-be: ## bash into the be container
	docker exec -it fizz-buzz-php-symfony sh

analyse: ## Clean php code
	docker exec -it vendor/bin/phpstan analyse
