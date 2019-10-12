<?php

namespace App\Exports;

use App\UjianModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExportPaket implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UjianModel::all();
    }
    public function headings(): array
    {
        return [
            'id_ujian', 
            'id_mata_pelajaran', 
            'tgl_ujian', 
            'waktu_ujian', 
            'paket_ujian', 
            'alokasi_waktu', 
            'created_at', 
            'updated_at'
        ];
    }
}
