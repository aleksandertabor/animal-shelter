SAIL=./vendor/bin/sail

help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(firstword $(MAKEFILE_LIST)) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

install: ## Install application
	cp .env.example .env
	${SAIL} composer install
	${SAIL} php artisan key:generate
	${SAIL} php artisan migrate:fresh
	${SAIL} php artisan db:seed
	${SAIL} php artisan storage:link
	${SAIL} php artisan cache:clear
	${SAIL} php artisan config:clear
	${SAIL} php artisan route:clear
	${SAIL} php artisan view:clear
	${SAIL} npm install
	${SAIL} npm run development

fixer: ## Run PHP CS Fixer
	vendor/bin/php-cs-fixer fix --config=.php_cs.dist.php --allow-risky=yes

phpstan: ## Run static analysis
	vendor/bin/phpstan analyse --memory-limit=2G

scribe: ## Generate API documentation
	${SAIL} artisan scribe:generate

up: ## Start application
	${SAIL} up -d --force-recreate --build

down: ## Stop application
	${SAIL} down

test: ## Run tests
	${SAIL} artisan test

ide-helper: ## Generate IdeHelper files
	${SAIL} php artisan ide-helper:eloquent
	${SAIL} php artisan ide-helper:generate --no-interaction
	${SAIL} php artisan ide-helper:meta
	${SAIL} php artisan ide-helper:models --write-mixin --no-interaction

reset-db: ## Reset database
	${SAIL} php artisan migrate:fresh --seed
