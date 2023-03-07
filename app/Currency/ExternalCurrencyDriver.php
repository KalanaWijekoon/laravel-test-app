<?php

namespace App\Currency;

use Exception;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

//concrete class for external driver
class ExternalCurrencyDriver implements CurrencyDriverInterface
{
    public function getCurrencyRates($baseCurrency, $defaultCurrencies)
    {
        $currenciesParameters = implode(',', $defaultCurrencies);
        $url = config('currency.api_layer_url')."?base={$baseCurrency}&symbols={$currenciesParameters}";

        try{

            $response = Http::withHeaders([
                'apikey' => env('API_LAYER_KEY')
            ])->get($url);

            if (!$response->json('rates')) {
                throw new Exception('Invalid response data');
            }
            
            return $response->json('rates');

        }catch(Exception $e){
            
            $internaldriver = new InternalCurrencyDriver();
            $response = $internaldriver->getCurrencyRates($baseCurrency, $defaultCurrencies);
            return $response;
        } 
        
    }
}