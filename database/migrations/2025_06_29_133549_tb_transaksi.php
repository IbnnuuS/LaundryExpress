<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('tb_pelanggan')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('tb_layanan')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('total_harga');
            $table->date('tanggal_masuk');
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['Menunggu', 'Proses', 'Selesai']);
            $table->enum('status_pembayaran', ['Belum Lunas', 'Lunas'])->default('Belum Lunas');
            $table->timestamps();
        });
    }
};
