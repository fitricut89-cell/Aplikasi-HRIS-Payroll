<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;

Route::apiResource('jabatan', JabatanController::class);