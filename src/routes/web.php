<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::controller(WeatherController::class)->name('weather.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::post('/', 'search')->name('search');

})->name('weather');

