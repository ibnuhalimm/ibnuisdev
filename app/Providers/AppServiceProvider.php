<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Fixing error
         * SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long;
         */
        Schema::defaultStringLength(191);

        /**
         * Force URL/Link to https
         */
        if (env('APP_SECURE', false) === true) {
            URL::forceScheme('https');
        }
    }
}
