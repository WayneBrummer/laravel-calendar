<?php

namespace Pace\Calendar;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;
use Pace\Calendar\Console\CalendarCollect;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        $this->registerCommands();
    }

    public function boot()
    {
        $this->configure();
    }

    public function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([CalendarCollect::class]);
        }
    }

    /**
     * Setup the configuration for Horizon.
     */
    protected function configure()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-calendar.php' => config_path('laravel-calendar.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/laravel-calendar.php',
            'laravel-calender'
        );
    }
}
