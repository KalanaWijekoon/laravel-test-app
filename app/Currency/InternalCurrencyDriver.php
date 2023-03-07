<?php

namespace App\Currency;

//concrete class for internal driver
class InternalCurrencyDriver implements CurrencyDriverInterface
{
    public function getCurrencyRates($baseCurrency, $defaultCurrencies)
    {

        $baseCurrency = strtoupper($baseCurrency);
        
        if (in_array($baseCurrency, $defaultCurrencies)) {
            switch ($baseCurrency) {
                case 'GBP':
                    return [
                        'GBP' => 1.0,
                        'USD' => 1.3,
                        'EUR' => 1.1,
                    ];
                case 'USD':
                    return [
                        'USD' => 1.0,
                        'GBP' => 0.7,
                        'EUR' => 0.8,
                    ];
                case 'EUR':
                    return [
                        'EUR' => 1.0,
                        'GBP' => 0.9,
                        'USD' => 1.2,
                    ];
            }
        } else {
            return null;
        }


    }
}