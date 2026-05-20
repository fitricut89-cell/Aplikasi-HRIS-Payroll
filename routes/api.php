<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('karyawans', KaryawanController::class);
Route::apiResource('gajis', GajiController::class);
use App\Http\Controllers\JabatanController;

Route::apiResource('jabatans', JabatanController::class);
