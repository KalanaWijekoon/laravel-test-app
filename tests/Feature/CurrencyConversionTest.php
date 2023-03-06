<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Currency\InternalCurrencyDriver;
use App\Currency\ExternalCurrencyDriver;
use App\Services\CurrencyConvertService;

class CurrencyConversionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_exchange_rate_using_local_driver()
    {
        $internalDriver = new InternalCurrencyDriver();
        $exchangeRates = $internalDriver->getCurrencyRates('GBP',['GBP','USD','EUR']);
        
        $this->assertIsArray($exchangeRates);
        $this->assertArrayHasKey('GBP',$exchangeRates);

    }

    public function test_invalid_exchange_rate_using_local_driver()
    {
        $internalDriver = new InternalCurrencyDriver();
        $exchangeRates = $internalDriver->getCurrencyRates('not a valid unit',['GBP','USD','EUR']);
        
        $this->assertNull($exchangeRates);

    }

    public function test_get_exchange_rate_using_external_driver()
    {
        $internalDriver = new ExternalCurrencyDriver();
        $exchangeRates = $internalDriver->getCurrencyRates('GBP',['GBP','USD','EUR']);
        
        $this->assertIsArray($exchangeRates);
        $this->assertArrayHasKey('GBP',$exchangeRates);

    }

    public function test_currency_coverter_service()
    {
        $converter = new CurrencyConvertService(250.23, 'GBP', 'EUR');
        $rate = $converter->getConvertedHourlyRate();

        $this->assertTrue($rate>0);
    }

    public function test_failed_external_driver()
    {
        config(['currecy.api_layer_url' => 'https://invalid_url']);
        $converter = new CurrencyConvertService(250.23, 'GBP', 'EUR');
        $rate = $converter->getConvertedHourlyRate();

        $this->assertTrue($rate>0);
    }
}
