<?php

namespace Artanis\LivePrice\Providers;

use Illuminate\Support\ServiceProvider;


class LivePriceServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
       include __DIR__ . '/../Http/routes.php';
       $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'liveprice');
    }

    /**
    * Register services.
    *
    * @return void
    */
    public function register()
    {

    }
}
