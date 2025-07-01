<?php

namespace App\Http\Controllers;

use App\Models\ModelLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = ModelLayanan::all();
        return view('admin.layanan.layanan', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanan.tambahLayanan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        ModelLayanan::create($request->all());

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $layanan = ModelLayanan::findOrFail($id);
        return view('admin.layanan.editLayanan', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
        ]);

        $layanan = ModelLayanan::findOrFail($id);
        $layanan->update($request->all());

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $layanan = ModelLayanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil dihapus.');
    }
}
