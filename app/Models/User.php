<?php

namespace App\Models;

use App\Services\CurrencyConvertService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    //defining fields to be considered when creating users
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'rate',
        'currency_unit'
    ];

    //Manipulate currency by converting
    public function getConvertedHourlyRate($requiredCurrency,$driver)
    {
        $converter = new CurrencyConvertService($this->rate, $this->currency_unit, $requiredCurrency,$driver);
        // initialize model's rate with new value from Currency Converter class
        $this->rate = $converter->getConvertedHourlyRate();
        $this->currency_unit = $requiredCurrency;
    }
}
