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
        // Paksa HTTPS di lingkungan Production (Render / Online)
        if ($this->app->environment('production') || env('APP_ENV') === 'production' || str_contains(request()->header('x-forwarded-proto', ''), 'https')) {
            URL::forceScheme('https');
        }
    }
}
