<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\CutiController;

Route::apiResource('karyawans', KaryawanController::class);
Route::apiResource('jabatans', JabatanController::class);
Route::apiResource('gajis', GajiController::class);
Route::apiResource('kehadirans', KehadiranController::class);
Route::apiResource('cutis', CutiController::class);