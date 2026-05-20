<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;

Route::get('/jabatan', function () {
    return view('jabatan');
});