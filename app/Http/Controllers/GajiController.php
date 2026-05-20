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
        $totalGaji = ($request->gaji_pokok + $request->tunjangan) - $request->potongan;

        $gaji = Gaji::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
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

        $totalGaji = ($request->gaji_pokok + $request->tunjangan) - $request->potongan;

        $gaji->update([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
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