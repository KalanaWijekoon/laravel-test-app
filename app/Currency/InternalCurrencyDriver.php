<?php

namespace App\Currency;

class InternalCurrencyDriver implements CurrencyDriverInterface
{
    public function getCurrencyRates($baseCurrency, $defaultCurrencies)
    {
        switch (strtoupper($baseCurrency)) {
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
    }
}