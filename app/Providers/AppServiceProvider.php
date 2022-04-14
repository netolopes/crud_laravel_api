<?php
namespace App\Providers;


use App\Services\Contracts\IUserService;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\user\UserRepository;
use App\Services\user\UserService;

use App\Services\Contracts\IMerchantService;
use App\Repositories\Contracts\IMerchantRepository;
use App\Repositories\merchant\MerchantRepository;
use App\Services\merchant\MerchantService;

use App\Services\Contracts\IProductService;
use App\Repositories\Contracts\IProductRepository;
use App\Repositories\product\ProductRepository;
use App\Services\product\ProductService;

use App\Services\Contracts\IOrderService;
use App\Repositories\Contracts\IOrderRepository;
use App\Repositories\order\OrderRepository;
use App\Services\order\OrderService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //services
        $this->app->bind(IUserService::class,UserService::class);
        $this->app->bind(IMerchantService::class,MerchantService::class);
        $this->app->bind(IProductService::class,ProductService::class);
        $this->app->bind(IOrderService::class,OrderService::class);


        //repositories
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IMerchantRepository::class, MerchantRepository::class);
        $this->app->bind(IProductRepository::class, ProductRepository::class);
        $this->app->bind(IOrderRepository::class, OrderRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
