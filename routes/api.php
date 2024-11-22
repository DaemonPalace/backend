<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return ['status' => 'ok'];
});

Route::apiResource('/products',ProductController::class);
Route::apiResource('/orders',OrderController::class);