<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('karyawans', KaryawanController::class);
use App\Http\Controllers\JabatanController;

Route::apiResource('jabatans', JabatanController::class);
