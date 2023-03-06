<?php

namespace App\Services;
use App\Currency\ExternalCurrencyDriver;
use App\Currency\InternalCurrencyDriver;
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
    public function __construct(private $hourlyRate,private $currencyUnit, private $newCurrency)
    {
        $this->getExchangeRates();
        $this->newCurrency = strtoupper($this->newCurrency);
    }

    //get currency rates
    public function getExchangeRates()
    {
        
        $env = config('currency.exchange_rates_driver');
        if($env ==='external')
        {
            try{
                $externaldriver = new ExternalCurrencyDriver();
                $this->rates = $externaldriver->getCurrencyRates($this->currencyUnit, $this->defaultCurrencies);
            }catch(Exception $e){
                $internaldriver = new InternalCurrencyDriver();
                $this->rates = $internaldriver->getCurrencyRates($this->currencyUnit, $this->defaultCurrencies);
            }
        }
        
        if($env ==='local'){
            $internaldriver = new InternalCurrencyDriver();
            $this->rates = $internaldriver->getCurrencyRates($this->currencyUnit, $this->defaultCurrencies);
        }
    }

    //calculate new rate and return calculated rate
    public function getConvertedHourlyRate()
    {
        return round($this->rates[$this->newCurrency] * $this->hourlyRate, 2);
    }
}