<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Middleware to sanitise request
Route::group(['middleware' => ['RequestSanitization']], function () {
    // route for custome search form
    Route::controller(UserController::class)->group(function() {
        Route::get('/users/{user}/{currencyUnit}', 'searchUserDetails');
    });
    // route for user
    Route::resource('user',UserController::class);
});