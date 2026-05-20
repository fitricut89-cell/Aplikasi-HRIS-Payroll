<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'jabatan_id',
        'nama',
        'email',
        'no_hp',
        'alamat',
        'tanggal_masuk',
        'status_karyawan'
    ];
}