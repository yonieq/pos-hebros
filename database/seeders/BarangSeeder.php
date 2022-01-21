<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $barangs = array(
            [
                'id_barang' => '1',
                'id_kategori' => '1',
                'kode_barang' => 'HVS00001',
                'id_supplier' => '1',
                'nama_barang' => 'CCTV HIKVision',
                'merk' => 'HIKVision',
                'nomor_serial' => rand(),
                'satuan' => 'UNIT',
                'harga_beli' => '100000',
                'harga_jual' => '120000',
                'diskon' => '0',
                'stok' => '10000',
                'garansi' => '2026-01-07',
                'keterangan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
            ],
            [
                'id_barang' => '2',
                'id_kategori' => '1',
                'kode_barang' => 'HVS00002',
                'id_supplier' => '2',
                'nama_barang' => 'CCTV Indihome',
                'merk' => 'Indihome',
                'nomor_serial' => rand(),
                'satuan' => 'UNIT',
                'harga_beli' => '90000',
                'harga_jual' => '120000',
                'diskon' => '0',
                'stok' => '10000',
                'garansi' => '2026-01-07',
                'keterangan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
            ],
            [
                'id_barang' => '3',
                'id_kategori' => '2',
                'kode_barang' => 'HVS00003',
                'id_supplier' => '2',
                'nama_barang' => 'Jasa Instalasi',
                'merk' => '',
                'nomor_serial' => rand(),
                'satuan' => '',
                'harga_beli' => '900000',
                'harga_jual' => '1200000',
                'diskon' => '0',
                'stok' => '10000',
                'garansi' => '2023-01-07',
                'keterangan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.'
            ]
        );

        array_map(function (array $barang) {
            Barang::query()->updateOrCreate(
                ['id_barang' => $barang['id_barang']],
                $barang
            );
        }, $barangs);
    }
}
