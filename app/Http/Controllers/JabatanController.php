<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Data jabatan berhasil diambil',
            'data' => Jabatan::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $jabatan = Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $jabatan
        ], 201);
    }

    public function show($id)
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json($jabatan);
    }

    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $jabatan->update([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $jabatan
        ], 200);
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);

        if (!$jabatan) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $jabatan->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}