<?php

namespace Advertisement\Calculator;

use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/views', 'advertise');
    }
}
