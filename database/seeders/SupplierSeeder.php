<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $suppliers = array(
            [
                'id_supplier' => 1,
                'nama_supplier' => 'BANK Bukopin, Tbk',
                'alamat' => 'jauh banget',
                'telepon' => '08552224121',
            ],
            [
                'id_supplier' => 2,
                'nama_supplier' => 'Mr. Ada deh',
                'alamat' => 'alamat palsu',
                'telepon' => '08552224122',
            ],
            [
                'id_supplier' => 3,
                'nama_supplier' => 'Mr. Ada Ada Aja',
                'alamat' => 'gatau dimana',
                'telepon' => '08552224123',
            ],
        );

        array_map(function (array $supplier) {
            Supplier::query()->updateOrCreate(
                ['id_supplier' => $supplier['id_supplier']],
                $supplier
            );
        }, $suppliers);
    }
}
