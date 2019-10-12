<?php

namespace App\Exports;

use App\DataSiswaModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSiswaRestore implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataSiswaModel::all();
    }
    public function headings(): array
    {
        return [
            'id_siswa', 
            'id_periode', 
            'id_kelas', 
            'nis', 
            'noujian', 
            'namadepan', 
            'namabelakang', 
            'tmp_lahir', 
            'tgl_lahir'
        ];
    }
}
