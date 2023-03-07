<?php

namespace App\Services;
use App\Currency\CurrencyDriverInterface;
use Exception;


class CurrencyConvertService
{

    private $rates;
    
    private $defaultCurrencies = [
        'GBP',
        'EUR',
        'USD'
    ];
    //using constructor promoting
    public function __construct(private $hourlyRate,private $currencyUnit, private $newCurrency, $driver)
    {
        $this->getExchangeRates($driver);
        $this->newCurrency = strtoupper($this->newCurrency);
    }

    //get currency rates
    public function getExchangeRates($driver)
    {
        //
        $this->rates = $driver->getCurrencyRates($this->currencyUnit, $this->defaultCurrencies);
    }

    //calculate new rate and return calculated rate
    public function getConvertedHourlyRate()
    {
        return round($this->rates[$this->newCurrency] * $this->hourlyRate, 2);
    }
}