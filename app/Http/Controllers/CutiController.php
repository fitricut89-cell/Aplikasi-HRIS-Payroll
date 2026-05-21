<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Cuti::all()
        ]);
    }

    public function store(Request $request)
    {
        $cuti = Cuti::create($request->all());

        return response()->json([
            'message' => 'Data cuti berhasil ditambahkan',
            'data' => $cuti
        ]);
    }

    public function show(string $id)
    {
        return response()->json([
            'data' => Cuti::findOrFail($id)
        ]);
    }

    public function update(Request $request, string $id)
    {
        $cuti = Cuti::findOrFail($id);

        $cuti->update($request->all());

        return response()->json([
            'message' => 'Data cuti berhasil diupdate'
        ]);
    }

    public function destroy(string $id)
    {
        Cuti::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Data cuti berhasil dihapus'
        ]);
    }
}