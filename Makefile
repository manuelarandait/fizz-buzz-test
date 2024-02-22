#!/bin/bash

start: ## Start the containers
	docker-compose up -d

stop: ## Stop the containers
	docker-compose stop

restart: ## Restart the containers
	$(MAKE) stop && $(MAKE) start

build: ## Rebuilds all the containers
	docker-compose build

prepare: ## Runs backend commands
	$(MAKE) composer-install

migrate: ## Runs backend commands
	docker exec -it fizz-buzz-php-symfony symfony console doctrine:database:create

create-database-test: ## Runs backend commands
	docker exec fizz-buzz-php-symfony symfony console doctrine:database:create --env=test
	docker exec fizz-buzz-php-symfony symfony console doctrine:schema:update --force --env=test

test: ## Runs backend commands
	docker exec fizz-buzz-php-symfony php bin/phpunit

run: ## starts the Symfony development server
	docker exec -T fizz-buzz-php-symfony symfony serve -d

ssh-be: ## bash into the be container
	docker exec -it fizz-buzz-php-symfony sh

# Backend commands
composer-install: ## Installs composer dependencies
	docker exec composer install --no-interaction
# End backend commands
