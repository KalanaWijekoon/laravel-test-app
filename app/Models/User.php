<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
}
