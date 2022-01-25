<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'ALPHABET1 STORE',
            'alamat' => 'Jl. Raden Inten II No 7 Duren Sawit, Jakarta Timur 13440 Indonesia',
            'telepon' => '(021) 2298 2571',
            'tipe_nota' => 2, // besar
            'diskon' => 0,
            'path_logo' => '/img/logo.png',
            'path_kartu_pelanggan' => '/img/user.png',
        ]);
    }
}
