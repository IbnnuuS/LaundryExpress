<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPelanggan extends Model
{
    protected $table = 'tb_pelanggan';
    protected $fillable = ['nama', 'no_hp', 'alamat'];
}
