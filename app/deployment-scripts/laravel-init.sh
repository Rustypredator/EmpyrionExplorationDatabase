#!/bin/bash

cd /app

echo "================================================"

echo "          Creating .env file"
rm .env
cp .env.example .env
echo "==============================================="

if [ -f artisan ]; then
    echo "        Running Laravel Setup Commands"
    php artisan down
    php artisan key:generate
    php artisan migrate --force
    php artisan scout:flush "App\Models\Location"
    php artisan scout:flush "App\Models\Entry"
    php artisan scout:flush "App\Models\Distance"

    php artisan scout:index "App\Models\Location"
    php artisan scout:index "App\Models\Entry"
    php artisan scout:index "App\Models\Distance"

    php artisan scout:import "App\Models\Location"
    php artisan scout:import "App\Models\Entry"
    php artisan scout:import "App\Models\Distance"
    
    echo "==============================================="

    php artisan up
    echo "        Laravel Setup Complete"
    echo "==============================================="
fi