<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;

    protected $table = 'penjualan_detail';
    protected $primaryKey = 'id_penjualan_detail';
    protected $guarded = [];
    protected $fillable  = ['snap_token'];

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id_barang', 'id_barang');
    }
}
