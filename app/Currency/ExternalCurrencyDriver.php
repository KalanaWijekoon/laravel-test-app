<?php

namespace App\Currency;

use GuzzleHttp\Client;

class ExternalCurrencyDriver implements CurrencyDriverInterface
{
    public function getCurrencyRates($baseCurrency, $defaultCurrencies)
    {
        $client = new Client();
        $currenciesParameters = implode(',', $defaultCurrencies);
        $param = '?base='.strtoupper($baseCurrency).'&symbols='.$currenciesParameters;
        $res = json_decode($client->request('GET', env('API_LAYER_URL').$param ,['headers' => ['apikey'=>env('API_LAYER_KEY')]])->getBody());
        $res = json_decode(json_encode($res->rates), true);
        return $res;
    }
}