<?php

namespace tyraelll\laravelmailjet;

use Illuminate\Support\ServiceProvider;

class laravelmailjetServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelmailjet.php', 'laravelmailjet');

        // Register the service the package provides.
        $this->app->singleton('laravelmailjet', function ($app) {
            return new laravelmailjet;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelmailjet'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelmailjet.php' => config_path('laravelmailjet.php'),
        ], 'laravelmailjet.config');

    }
}
