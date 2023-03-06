<?php

namespace App\Services;
use App\Currency\ExternalCurrencyDriver;
use App\Currency\InternalCurrencyDriver;
use Exception;


class CurrencyConvertService{

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
        if(env('CURRENCY_RATES_DRIVER')==='external'){
            try{
                $externaldriver = new ExternalCurrencyDriver();
                $this->rates = $externaldriver->getCurrencyRates($this->currencyUnit, $this->defaultCurrencies);
            }catch(Exception $e){
                $internaldriver = new InternalCurrencyDriver();
                $this->rates = $internaldriver->getCurrencyRates($this->currencyUnit, $this->defaultCurrencies);
            }
        }
        
        if(env('CURRENCY_RATES_DRIVER')==='local'){
            $internaldriver = new InternalCurrencyDriver();
            $this->rates = $internaldriver->getCurrencyRates($this->currencyUnit, $this->defaultCurrencies);
        }
    }


    //calculate new rate and return calculated rate
    public function getConvertedHourlyRate()
    {
        return round($this->hourlyRate * $this->rates[$this->newCurrency], 2);
    }


}