<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    // MENAMPILKAN SEMUA DATA
    public function index()
    {
        $kehadirans = Kehadiran::all();

        return response()->json([
            'message' => 'Data kehadiran berhasil diambil',
            'data' => $kehadirans
        ], 200);
    }

    // MENAMBAHKAN DATA BARU
    public function store(Request $request)
    {
        $kehadiran = Kehadiran::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'status_kehadiran' => $request->status_kehadiran,
            'keterangan' => $request->keterangan
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $kehadiran
        ], 201);
    }

    // MENAMPILKAN 1 DATA BERDASARKAN ID
    public function show($id)
    {
        $kehadiran = Kehadiran::find($id);

        if (!$kehadiran) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail data kehadiran',
            'data' => $kehadiran
        ], 200);
    }

    // MENGUBAH DATA
    public function update(Request $request, $id)
    {
        $kehadiran = Kehadiran::find($id);

        if (!$kehadiran) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $kehadiran->update([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'status_kehadiran' => $request->status_kehadiran,
            'keterangan' => $request->keterangan
        ]);

        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $kehadiran
        ], 200);
    }

    // MENGHAPUS DATA
    public function destroy($id)
    {
        $kehadiran = Kehadiran::find($id);

        if (!$kehadiran) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $kehadiran->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}