<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengeluaranExport implements FromCollection
{

    public function collection()
    {
        return Pengeluaran::all();
    }
}
