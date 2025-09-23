php artisan scout:flush "App\Models\Location"
php artisan scout:flush "App\Models\Entry"
php artisan scout:flush "App\Models\Distance"

php artisan scout:index "App\Models\Location"
php artisan scout:index "App\Models\Entry"
php artisan scout:index "App\Models\Distance"

php artisan scout:import "App\Models\Location"
php artisan scout:import "App\Models\Entry"
php artisan scout:import "App\Models\Distance"