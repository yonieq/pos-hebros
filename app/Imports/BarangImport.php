<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Barang([
            //
            'id_kategori'       => $row[0],
            'id_kategori'       => $row[1],
            'kode_barang'       => $row[2],
            'id_supplier'       => $row[3],
            'nama_barang'       => $row[4],
            'merk'              => $row[5],
            'nomor_serial'      => $row[6],
            'satuan'            => $row[7],
            'harga_beli'        => $row[8],
            'diskon'            => $row[9],
            'harga_jual'        => $row[10],
            'stok'              => $row[11],
            'garansi'           => $row[12],
            'keterangan'        => $row[13],
        ]);
    }
}
