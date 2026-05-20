<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('jabatan');
});

Route::get('/jabatan', [JabatanController::class, 'index']);