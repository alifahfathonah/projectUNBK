<?php

namespace App\Exports;

use App\DataSiswaModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSiswaExportPerKelas implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataSiswaModel::select( 'nis', 'noujian', 'namadepan', 'namabelakang', 'tmp_lahir', 'tgl_lahir')->get();
    }
}
