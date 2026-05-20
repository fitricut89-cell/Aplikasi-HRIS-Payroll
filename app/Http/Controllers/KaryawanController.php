<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Data karyawan berhasil diambil',
            'data' => Karyawan::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::create([
            'jabatan_id' => $request->jabatan_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_masuk' => $request->tanggal_masuk,
            'status_karyawan' => $request->status_karyawan
        ]);

        return response()->json([
            'message' => 'Data karyawan berhasil ditambahkan',
            'data' => $karyawan
        ], 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Data karyawan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail data karyawan',
            'data' => $karyawan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Data karyawan tidak ditemukan'
            ], 404);
        }

        $karyawan->update([
            'jabatan_id' => $request->jabatan_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_masuk' => $request->tanggal_masuk,
            'status_karyawan' => $request->status_karyawan
        ]);

        return response()->json([
            'message' => 'Data karyawan berhasil diupdate',
            'data' => $karyawan
        ], 200);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Data karyawan tidak ditemukan'
            ], 404);
        }

        $karyawan->delete();

        return response()->json([
            'message' => 'Data karyawan berhasil dihapus'
        ], 200);
    }
}