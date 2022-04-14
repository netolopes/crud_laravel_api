
## Commands Laravel
php artisan make:controller TestController --resource
php artisan make:model Test -mcr
php artisan migrate:freshh --seed
php artisan make:factory BlogFactory --model=Blog
php artisan make:seed TesteSeeder
php artisan db:seed --class=UserTableSeeder (executar seed individual)
php artisan db:seed (todas seeds)
php artisan make:resource TestResource
php artisan make:request TestResource
# config jwt 
composer require tymon/jwt-auth dev-develop 
add PROVIDER: Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
public config: php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
model User:  implements JWTSubject
config/auth
php artisan make:middleware apiProtectedRoute
http/kernel.php
 'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'jwt.auth' => 'Tymon\JWTAuth\Middleware\GetUserFromToken',
        'jwt.refresh' => 'Tymon\JWTAuth\Middleware\RefreshToken',
        'apiJwt' => \App\Http\Middleware\ApiProtectedRoute::class,

app/providers/appserviceprovider => config repository/services
