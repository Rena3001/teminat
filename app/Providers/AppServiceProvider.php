<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\DataService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(DataService::class, function ($app) {
            return new DataService();
        });
    }
}
