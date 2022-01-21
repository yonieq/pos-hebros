<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKodeBarangToBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->string('kode_barang')
                  ->unique()
                  ->after('id_kategori');
        });
        
        // Schema::table('barang', function(Blueprint $table) {
        //     $table->string('nama_barang')->unique()
        //           ->unique()
        //           ->after('id_supplier');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropColumn('kode_barang');
        });

        // Schema::table('barang', function (Blueprint $table) {
        //     $table->dropColumn('nama_barang');
        // });
    }
}
