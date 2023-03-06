<?php

namespace App\Currency;

interface CurrencyDriverInterface
{
    public function getCurrencyRates($baseCurrency, $defaultCurrencies);
}