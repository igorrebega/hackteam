<?php

namespace App\Foundation;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        // Register the service providers of your Services here.
        $this->app->register('App\Services\Dashboard\Providers\DashboardServiceProvider');
        $this->app->register('App\Services\Website\Providers\WebsiteServiceProvider');
    }
}
