<?php

namespace App\Http\Controllers;

use App\Models\ModelTransaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporanHarian(Request $request)
    {
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        $transaksis = ModelTransaksi::whereDate('tanggal_masuk', $tanggal)
            ->with(['pelanggan', 'layanan'])
            ->get();

        return view('admin.laporan.harian', compact('transaksis', 'tanggal'));
    }

    public function laporanBulanan(Request $request)
    {
        $bulanInput = $request->input('bulan', now()->format('Y-m'));

        try {
            $tanggal = Carbon::createFromFormat('Y-m', $bulanInput);
        } catch (\Exception $e) {
            return back()->withErrors('Format bulan tidak valid.');
        }

        $transaksis = ModelTransaksi::whereMonth('tanggal_masuk', $tanggal->month)
            ->whereYear('tanggal_masuk', $tanggal->year)
            ->where('status_pembayaran', 'Lunas')
            ->with(['pelanggan', 'layanan'])
            ->get();

        return view('admin.laporan.bulanan', [
            'transaksis' => $transaksis,
            'bulan' => $tanggal->format('Y-m') // aman dipakai di <input type="month">
        ]);
    }
    public function exportHarianPdf(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? date('Y-m-d');

        $transaksis = ModelTransaksi::with(['pelanggan', 'layanan'])
            ->where('tanggal_masuk', $tanggal)
            ->where('status_pembayaran', 'Lunas')
            ->get();

        $pdf = Pdf::loadView('admin.laporan.harianpdf', [
            'transaksis' => $transaksis,
            'tanggal' => $tanggal
        ]);

        return $pdf->download('laporan-harian-' . $tanggal . '.pdf');
    }
    public function exportBulananPdf(Request $request)
    {
        $bulanInput = $request->input('bulan', now()->format('Y-m'));

        try {
            $tanggal = Carbon::createFromFormat('Y-m', $bulanInput);
        } catch (\Exception $e) {
            return back()->withErrors('Format bulan tidak valid untuk PDF.');
        }

        $bulan = $tanggal->month;
        $tahun = $tanggal->year;

        $transaksis = ModelTransaksi::whereMonth('tanggal_masuk', $bulan)
            ->whereYear('tanggal_masuk', $tahun)
            ->where('status_pembayaran', 'Lunas')
            ->with(['pelanggan', 'layanan'])
            ->get();

        $pdf = Pdf::loadView('admin.laporan.bulananpdf', compact('transaksis', 'bulan', 'tahun'));
        return $pdf->download("laporan-bulanan-{$bulan}-{$tahun}.pdf");
    }
}
