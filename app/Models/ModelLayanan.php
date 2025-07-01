<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLayanan extends Model
{
    use HasFactory;
    protected $table = 'tb_layanan';
    protected $fillable = [
        'nama_layanan',
        'harga',
        'deskripsi',
    ];
}
