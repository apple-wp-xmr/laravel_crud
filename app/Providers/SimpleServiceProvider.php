<?php

namespace App\Providers;

use App\Services\SimpleService;
use Illuminate\Support\ServiceProvider;

class SimpleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      
        $this->app->bind(SimpleService::class, function($app){
            return new SimpleService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
