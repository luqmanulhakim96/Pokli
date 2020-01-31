<?php

namespace Artanis\AdminCustom2\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;


class AdminCustom2ServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
       //    include __DIR__ . '/../Http/routes.php';
       $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

       $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'admincustom2');

       $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'admincustom2');

       Event::listen('bagisto.admin.layout.head', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('admincustom2::layouts.style');
        });

       $this->loadMigrationsFrom(__DIR__ .'/../Database/Migrations');

    }

    /**
    * Register services.
    *
    * @return void
    */
    public function register()
    {
        $this->mergeConfigFrom(
            dirname(__DIR__) . '/Config/menu.php', 'menu.admin'
        );
    }
}
