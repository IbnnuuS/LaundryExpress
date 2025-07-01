<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan');
    Route::get('/admin/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/admin/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/admin/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/admin/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/admin/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    //layanan
    Route::get('/admin/layanan', [LayananController::class, 'index'])->name('admin.layanan');
    Route::get('/admin/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('/admin/layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('/admin/layanan/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('/admin/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/admin/layanan/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    //transaksi
    Route::get('/admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/admin/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/admin/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/admin/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/admin/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('/admin/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    //order masuk
    Route::get('/admin/order-masuk', [TransaksiController::class, 'orderMasuk'])->name('admin.order-masuk');
    //riwayat order
    Route::get('/admin/riwayat-order', [TransaksiController::class, 'riwayatOrder'])->name('admin.riwayat-order');
    Route::put('/admin/transaksi/{id}/mark-lunas', [TransaksiController::class, 'markLunas'])->name('transaksi.markLunas');
    // Transaksi Belum Lunas
    Route::get('/admin/belum-lunas', [TransaksiController::class, 'belumLunas'])->name('admin.belum-lunas');
    // Transaksi Lunas
    Route::get('/admin/lunas', [TransaksiController::class, 'lunas'])->name('admin.lunas');

    // Laporan
    Route::get('/admin/laporan/harian', [LaporanController::class, 'laporanHarian'])->name('admin.laporan.harian');
    Route::get('/admin/laporan/bulanan', [LaporanController::class, 'laporanBulanan'])->name('admin.laporan.bulanan');

    //pdf
    Route::get('/admin/laporan/harian/pdf', [LaporanController::class, 'exportHarianPdf'])->name('laporan.harian.pdf');
    Route::get('/admin/laporan/bulanan/pdf', [LaporanController::class, 'exportBulananPdf'])->name('laporan.bulanan.pdf');
});


Route::fallback(function () {
    return view('admin.notfound');
});


require __DIR__ . '/auth.php';
