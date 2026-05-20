<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return response()->json(Karyawan::all(), 200);
    }

    public function store(Request $request)
    {
        $karyawan = Karyawan::create($request->all());

        return response()->json($karyawan, 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json($karyawan, 200);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $karyawan->update($request->all());

        return response()->json($karyawan, 200);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $karyawan->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}