<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PharmacyController;


Route::apiResource('products', ProductController::class);
Route::apiResource('pharmacies', PharmacyController::class);
