<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index()
{
    $data = Jabatan::all();

    return view('jabatan', compact('data'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'gaji_pokok' => 'required',
        ]);

        $jabatan = Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $jabatan
        ]);
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
            'tunjangan' => $request->tunjangan,
            'deskripsi' => $request->deskripsi,
        ]);

        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $jabatan
        ]);
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
        ]);
    }
}