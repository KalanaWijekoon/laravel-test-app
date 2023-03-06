<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Currency\CurrencyDriverInterface;
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
    public function getConvertedHourlyRate($requiredCurrency)
    {
        $converter = new CurrencyConvertService($this->rate, $this->currency_unit, $requiredCurrency);
        $this->rate = $converter->getConvertedHourlyRate();
        $this->currency = $requiredCurrency;
    }
}
