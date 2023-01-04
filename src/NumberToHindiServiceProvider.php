<?php

namespace MrThito\Hindinumber;

use Illuminate\Support\ServiceProvider;
use MrThito\Hindinumber\NumberToHindi;

class NumberToHindiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(NumberToHindi::class);

        $this->app->alias(NumberToHindi::class, 'hindi-number');
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
