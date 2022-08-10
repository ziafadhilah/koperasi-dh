<?php

namespace App\Exports;

use App\Models\CentralSale;
use Maatwebsite\Excel\Concerns\FromCollection;

class CentralSaleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CentralSale::all();
    }
}
