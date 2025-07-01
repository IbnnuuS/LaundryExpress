<?php

namespace App\Http\Controllers;

use App\Models\ModelLayanan;
use App\Models\ModelPelanggan;
use App\Models\ModelTransaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = ModelTransaksi::with(['pelanggan', 'layanan'])->get();
        return view('admin.transaksi.transaksi', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = ModelPelanggan::all();
        $layanans = ModelLayanan::all();
        return view('admin.transaksi.tambahTransaksi', compact('pelanggans', 'layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'layanan_id' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        $layanan = ModelLayanan::find($request->layanan_id);
        $total_harga = $layanan->harga * $request->jumlah;

        ModelTransaksi::create([
            'pelanggan_id' => $request->pelanggan_id,
            'layanan_id' => $request->layanan_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal_masuk' => $request->tanggal_masuk,
            'status' => 'Menunggu',
        ]);

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $transaksi = ModelTransaksi::findOrFail($id);
        $pelanggans = ModelPelanggan::all();
        $layanans = ModelLayanan::all();
        return view('admin.transaksi.editTransaksi', compact('transaksi', 'pelanggans', 'layanans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'layanan_id' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        $layanan = ModelLayanan::find($request->layanan_id);
        $total_harga = $layanan->harga * $request->jumlah;

        $transaksi = ModelTransaksi::findOrFail($id);
        $transaksi->update([
            'pelanggan_id' => $request->pelanggan_id,
            'layanan_id' => $request->layanan_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = ModelTransaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }

    public function orderMasuk()
    {
        $transaksis = ModelTransaksi::where('status', 'Proses')->with(['pelanggan', 'layanan'])->get();
        return view('admin.transaksi.order', compact('transaksis'));
    }

    public function riwayatOrder()
    {
        $transaksis = ModelTransaksi::where('status', 'Selesai')->with(['pelanggan', 'layanan'])->get();

        return view('admin.transaksi.riwayat', compact('transaksis'));
    }
    public function markLunas($id)
    {
        $transaksi = ModelTransaksi::findOrFail($id);
        $transaksi->status_pembayaran = 'Lunas';
        $transaksi->save();

        return redirect()->route('admin.transaksi')->with('success', 'Transaksi berhasil ditandai sebagai LUNAS.');
    }
    public function belumLunas()
    {
        $transaksis = ModelTransaksi::where('status_pembayaran', 'Belum Lunas')->with(['pelanggan', 'layanan'])->get();
        return view('admin.transaksi.belumlunas', compact('transaksis'));
    }

    public function lunas()
    {
        $transaksis = ModelTransaksi::where('status_pembayaran', 'Lunas')->with(['pelanggan', 'layanan'])->get();
        return view('admin.transaksi.sudahlunas', compact('transaksis'));
    }
}
