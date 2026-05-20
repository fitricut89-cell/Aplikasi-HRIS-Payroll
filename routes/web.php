<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', function () {
    return view('karyawan');
});
Route::get('/gaji', function () {
    return view('gaji');
Route::get('/jabatan', function () {
    return view('jabatan');
});
