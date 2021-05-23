<?php
/*
 * Group 1 Milestone 6
 * LoggingServiceProvider.php Version 1
 * CST-256
 * 5/22/2021
 * This is a provider class that creates a singleton logger and injects it into the project.
 */
namespace App\Providers;

use App\Services\Utility\ProjectLogger;
use Illuminate\Support\ServiceProvider;

class LoggingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Create a singleton of ProjectLogger
        $this->app->bind('App\Services\Utility\ILogger', function ($app) {
            return new ProjectLogger();
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
