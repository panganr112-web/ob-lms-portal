<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS on production (important for Railway)
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Optional: If using cookies, make sure cookie domain is correct
        if (env('SESSION_DOMAIN')) {
            config(['session.domain' => env('SESSION_DOMAIN')]);
        }
    }
}