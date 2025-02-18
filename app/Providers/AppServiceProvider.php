<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    public function boot()
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //      if(config('app.env')=== 'local'){
    //         URL::forceScheme('https');
    //     }
    // }

    
}
