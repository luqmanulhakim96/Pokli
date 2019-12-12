<?php

namespace Artanis\GapSap\Providers;

use Illuminate\Support\ServiceProvider;


class GapSapServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
       include __DIR__ . '/../Http/routes.php';

       $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'gapsap');

       $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'gapsap');

       $this->loadMigrationsFrom(__DIR__ .'/../Database/Migrations');
       
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
