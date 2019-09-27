<?php

namespace Front\Article;

use Illuminate\Support\ServiceProvider;

class FrontendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
            //$this->app->make('Advertisement\Calculator\CalculatorController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
          //include __DIR__.'/web.php';
        include __DIR__.'/route.php';
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'view');
    }
}
