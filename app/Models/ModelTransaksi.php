<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTransaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $fillable = [
        'pelanggan_id',
        'layanan_id',
        'jumlah',
        'total_harga',
        'status',
        'tanggal_masuk',
        'tanggal_selesai',
    ];
    public function pelanggan()
    {
        return $this->belongsTo(ModelPelanggan::class, 'pelanggan_id');
    }
    public function layanan()
    {
        return $this->belongsTo(ModelLayanan::class, 'layanan_id');
    }
}
