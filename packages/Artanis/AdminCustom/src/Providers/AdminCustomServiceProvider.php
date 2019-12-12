<?php

namespace Artanis\AdminCustom\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;


class AdminCustomServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
       include __DIR__ . '/../Http/routes.php';

       $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'admincustom');

       $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'admincustom');

       Event::listen('bagisto.admin.layout.head', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('admincustom::layouts.style');
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
