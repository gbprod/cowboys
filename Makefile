.SILENT:
.PHONY: help

## Colors
COLOR_RESET   = \033[0m
COLOR_INFO    = \033[32m
COLOR_COMMENT = \033[33m

## Help
help:
	printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	printf " make <target>\n\n"
	printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	awk '/^[a-zA-Z\-\_0-9\.@]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf " ${COLOR_INFO}%-16s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)


################
# Start & stop #
################

bootstrap:
	mysql-ctl install
	wget https://download.elastic.co/elasticsearch/release/org/elasticsearch/distribution/tar/elasticsearch/2.3.2/elasticsearch-2.3.2.tar.gz
	tar xf elasticsearch-2.3.2.tar.gz 
	mv elasticsearch-2.3.2 bin/elasticsearch
	rm elasticsearch-2.3.2.tar.gz
	
start:
	mysql-ctl start
	bin/elasticsearch/bin/elasticsearch

###########
# Install #
###########

## Install application
install: install-deps install-database install-assets

install-deps:
	composer install

install-database:
	php bin/console doctrine:database:create --if-not-exists
	php bin/console doctrine:schema:update --force

install-assets:
	php bin/console assetic:dump
	php bin/console assets:install

##########
# Update #
##########

## Update application
update: update-deps update-database update-assets

update-deps:
	composer update

update-database:
	php bin/console doctrine:schema:update --force

update-assets: install-assets

########
# Test #
########

## Run tests
test: 
	vendor/bin/phpunit

## Code coverage
test-coverage:
	vendor/bin/phpunit --coverage-text
	
## Tests loop
test-loop:
	while true; \
		do vendor/bin/phpunit; \
		read continue; \
	done;

##########
# Deploy #
##########

## Deploy application
deploy: export SYMFONY_ENV=prod
deploy: deploy-deps deploy-assets deploy-warmup

deploy-deps:
	composer install -o --no-dev

deploy-assets:
	php bin/console assetic:dump --env=prod
	php bin/console assets:install --env=prod

deploy-warmup:
	php bin/console cache:warmup --env=prod
