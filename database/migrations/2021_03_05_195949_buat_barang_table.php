<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id_barang');
            $table->unsignedInteger('id_kategori');
            $table->unsignedInteger('id_supplier')->nullable();
            $table->string('nama_barang')->unique();
            $table->string('merk')->nullable();
            $table->string('nomor_serial')->nullable();
            $table->string('satuan')->nullable();
            $table->integer('harga_beli');
            $table->tinyInteger('diskon')->default(0);
            $table->integer('harga_jual');
            $table->integer('stok');
            $table->date('garansi')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
