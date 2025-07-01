<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTransaksi;
use App\Models\ModelPelanggan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan = ModelPelanggan::count();
        $totalTransaksi = ModelTransaksi::count();

        $totalHariIni = ModelTransaksi::whereDate('tanggal_masuk', Carbon::today())
            ->where('status_pembayaran', 'Lunas')
            ->sum('total_harga');

        $totalBulanIni = ModelTransaksi::whereMonth('tanggal_masuk', Carbon::now()->month)
            ->whereYear('tanggal_masuk', Carbon::now()->year)
            ->where('status_pembayaran', 'Lunas')
            ->sum('total_harga');

        return view('admin.dashboard.dashboard', compact(
            'totalPelanggan',
            'totalTransaksi',
            'totalHariIni',
            'totalBulanIni'
        ));
    }
}
