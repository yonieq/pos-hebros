<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $guarded = [];
    protected $fillable = [
        'id_pengeluaran', 'deskripsi', 'nominal', 'create_at'
    ];

    // public static function getPengeluaran()
    // {
    //     $records = DB::table('pengeluaran')->select('id_pengeluaran', 'deskripsi', 'nominal', 'create_at')->get()->toArray();

    //     return $records;
    // }
}
