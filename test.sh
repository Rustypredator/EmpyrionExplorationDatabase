#!/bin/bash

echo "================================================"
echo "          Removing old stuff"
sudo docker compose down
sudo docker container rm explorationdatabase-queueworker-1
sudo docker container rm explorationdatabase-app-1
sudo docker container rm explorationdatabase-redis-1
sudo docker container rm explorationdatabase-db-1
sudo docker container rm explorationdatabase-search-1
sudo docker volume rm explorationdatabase_db_data
sudo docker volume rm explorationdatabase_persistent_data
sudo docker volume rm explorationdatabase_search_data
sudo docker image prune -f
sudo docker volume prune -f
sudo docker container prune -f
sudo docker builder prune -f
echo "==============================================="
echo "          Starting containers"
sudo docker compose up