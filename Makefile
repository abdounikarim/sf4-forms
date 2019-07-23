DOCKER_COMPOSE = docker-compose

start:				## Start all containers
					$(DOCKER_COMPOSE) up -d --remove-orphans --no-recreate

kill:				## Kill all containers
					$(DOCKER_COMPOSE) kill
					$(DOCKER_COMPOSE) down --volumes --remove-orphans
