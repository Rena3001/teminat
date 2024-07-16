<?php

namespace App\Providers;

use App\View\Composers\SettingsComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer('client.*', SettingsComposer::class);
    }
}
