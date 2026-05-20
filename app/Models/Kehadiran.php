<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $fillable = [
    'karyawan_id',
    'tanggal',
    'jam_masuk',
    'jam_keluar',
    'status_kehadiran',
    'keterangan'
];
}
