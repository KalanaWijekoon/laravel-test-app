<?php

namespace App\Currency;

// Interface for internal and external drivers
interface CurrencyDriverInterface
{
    public function getCurrencyRates($baseCurrency, $defaultCurrencies);
}