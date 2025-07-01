<?php

namespace App\Http\Controllers;

use App\Models\ModelPelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = ModelPelanggan::all();
        return view('admin.pelanggan.pelanggan', compact('pelanggans'));
    }

    public function create()
    {
        return view('admin.pelanggan.tambahPelanggan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'nullable',
        ]);

        ModelPelanggan::create($request->all());

        return redirect()->route('admin.pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pelanggan = ModelPelanggan::findOrFail($id);
        return view('admin.pelanggan.editPelanggan', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'nullable',
        ]);

        $pelanggan = ModelPelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('admin.pelanggan')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pelanggan = ModelPelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('admin.pelanggan')->with('success', 'Data pelanggan berhasil dihapus.');
    }
}
