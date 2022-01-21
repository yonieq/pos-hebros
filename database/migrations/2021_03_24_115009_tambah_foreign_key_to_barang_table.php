<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyToBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->foreign('id_kategori')
                  ->references('id_kategori')
                  ->on('kategori')
                  ->onUpdate('restrict')
                  ->onDelete('restrict');
        });

        // Schema::table('barang', function (Blueprint $table) {
        //     $table->foreign('id_supplier')
        //           ->references('id_supplier')
        //           ->on('supplier')
        //           ->onUpdate('restrict')
        //           ->onDelete('restrict');
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
            $table->dropForeign('barang_id_kategori_foreign');
        });

        // Schema::table('barang', function (Blueprint $table) {
        //     $table->dropForeign('barang_id_supplier_foreign');
        // });
    }
}
