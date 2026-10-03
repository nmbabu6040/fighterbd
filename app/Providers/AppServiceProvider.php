<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        view()->share('settings', Setting::first());

        view()->composer('frontend.partials.header', function ($view) {
            $view->with('settings', Setting::first());
        });

        view()->composer('frontend.partials.footer', function ($view) {
            $view->with('settings', Setting::first());
        });
    }
}
