<?php

use App\Http\Controllers\WeightController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('weights.index');
});

Route::resource('weights', WeightController::class);