<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;

Route::apiResource('jabatans', JabatanController::class);