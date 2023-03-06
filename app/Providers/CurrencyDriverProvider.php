<?php

namespace App\Providers;

use App\Currency\CurrencyDriverInterface;
use App\Currency\InternalCurrencyDriver;
use Illuminate\Support\ServiceProvider;

class CurrencyDriverProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // resolving driver based on the configuration
        $provider = match(env('CURRENCY_RATES_DRIVER')){
            'local'=>ExternalCurrencyDriver::class,
            'external'=>InternalCurrencyDriver::class,
            default => InternalCurrencyDriver::class,
        };

        //binding concrete classes based on resolving
        $this->app->bind(CurrencyDriverInterface::class, $provider);
    }
}
