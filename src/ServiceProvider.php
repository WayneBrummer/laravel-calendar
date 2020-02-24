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
        $stub = __DIR__ . '/../database/migrations/create_calendar_tables.php.stub';
        if ($this->app->runningInConsole()) {
            if (!\class_exists('CreateCalendarTable')) {
                $this->publishes([
                    $stub => database_path('migrations/' .
                    \date('Y_m_d_His', \time()) . '_create_calendar_tables.php'),
                ], 'migrations');
            }

            $this->configure();
        }
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
