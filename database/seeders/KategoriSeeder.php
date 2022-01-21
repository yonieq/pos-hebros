<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kategories = array(
            [
                'id_kategori' => '1',
                'nama_kategori' => 'CCTV',
            ],
            [
                'id_kategori' => '2',
                'nama_kategori' => 'JASA',
            ],
            [
                'id_kategori' => '3',
                'nama_kategori' => 'JARINGAN IKAN',
            ]
        );

        array_map(function (array $kategori) {
            Kategori::query()->updateOrCreate(
                ['id_kategori' => $kategori['id_kategori']],
                $kategori
            );
        }, $kategories);
    }
}
