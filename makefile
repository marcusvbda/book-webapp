YELLOW=\033[33m
RESET=\033[0m

set-node-version:
	@echo "$(YELLOW)Setting up node version...$(RESET)"
	@NVM_DIR="$${HOME}/.nvm" && . "$${NVM_DIR}/nvm.sh" && nvm use

start-dev:
	@$(MAKE) set-node-version
	@yarn run dev

start-prod:
	@$(MAKE) set-node-version
	@yarn run build
	@yarn run start

build:
	@echo "$(YELLOW)Building containers...$(RESET)"
	@docker compose up -d --build --force-recreate
	@echo "$(YELLOW)Installing backend dependencies...$(RESET)"
	@docker compose exec app composer install
	@echo "$(YELLOW)Copying env files...$(RESET)"
	@docker compose exec app cp .env.example .env
	@echo "$(YELLOW)Generating app key...$(RESET)"
	@docker compose exec app php artisan key:generate --ansi
	@echo "$(YELLOW)Setting up permissions...$(RESET)"
	@docker compose exec app chmod -R 777 storage bootstrap/cache
	@$(MAKE) migrate-seed

migrate-seed:
	@echo "$(YELLOW)Setting up database...$(RESET)"
	@docker compose exec app php artisan migrate --seed

migrate-fresh-seed:
	@echo "$(YELLOW)Setting up database...$(RESET)"
	@docker compose exec app php artisan migrate:fresh --seed
