<?php

namespace App\Exports;

use App\MataPelajaranModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataUjianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$data = MataPelajaranModel::select('id_mata_pelajaran', 'mt_pelajaran', 'jurusan')->get();
        return $data;
    }
    public function headings(): array
    {
        return [
           'id_mata_pelajaran',
           'mt_pelajaran',
           'jurusan'
        ];
    }
}
