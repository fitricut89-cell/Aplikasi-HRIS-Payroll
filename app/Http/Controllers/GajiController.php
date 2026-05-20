<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Data gaji berhasil diambil',
            'data' => Gaji::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $gajiPokok = (int) $request->gaji_pokok;
        $tunjangan = (int) $request->tunjangan;
        $potongan = (int) $request->potongan;

        $totalGaji = ($gajiPokok + $tunjangan) - $potongan;

        $gaji = Gaji::create([
            'karyawan_id' => (int) $request->karyawan_id,
            'bulan' => $request->bulan,
            'tahun' => (int) $request->tahun,
            'gaji_pokok' => $gajiPokok,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,
            'total_gaji' => $totalGaji
        ]);

        return response()->json([
            'message' => 'Data gaji berhasil ditambahkan',
            'data' => $gaji
        ], 201);
    }

    public function show($id)
    {
        $gaji = Gaji::find($id);

        if (!$gaji) {
            return response()->json([
                'message' => 'Data gaji tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Detail data gaji',
            'data' => $gaji
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $gaji = Gaji::find($id);

        if (!$gaji) {
            return response()->json([
                'message' => 'Data gaji tidak ditemukan'
            ], 404);
        }

        $gajiPokok = (int) $request->gaji_pokok;
        $tunjangan = (int) $request->tunjangan;
        $potongan = (int) $request->potongan;

        $totalGaji = ($gajiPokok + $tunjangan) - $potongan;

        $gaji->update([
            'karyawan_id' => (int) $request->karyawan_id,
            'bulan' => $request->bulan,
            'tahun' => (int) $request->tahun,
            'gaji_pokok' => $gajiPokok,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,
            'total_gaji' => $totalGaji
        ]);

        return response()->json([
            'message' => 'Data gaji berhasil diupdate',
            'data' => $gaji
        ], 200);
    }

    public function destroy($id)
    {
        $gaji = Gaji::find($id);

        if (!$gaji) {
            return response()->json([
                'message' => 'Data gaji tidak ditemukan'
            ], 404);
        }

        $gaji->delete();

        return response()->json([
            'message' => 'Data gaji berhasil dihapus'
        ], 200);
    }
}