<?php

namespace App\Providers;

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
        $this->app->bind('App\Interfaces\ProductInterface', 'App\Repositories\ProductRepository');
        $this->app->bind('App\Interfaces\ProductLineInterface', 'App\Repositories\ProductLineRepository');
        $this->app->bind('App\Interfaces\OrderInterface', 'App\Repositories\OrderRepository');
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
