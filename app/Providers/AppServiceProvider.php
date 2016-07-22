<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Entity\Product;
use Eshop\Services\ThriftService;
use Eshop\Repositories\ProductRepository;
use App\Http\Controllers\View\TestController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('TestController', function()
        {
            return new TestController(new ThriftService(new \App\Soa\SoaClient()), new ProductRepository(new Product()));
        });
    }
}
